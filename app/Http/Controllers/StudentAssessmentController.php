<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Lesson;
use App\Models\ReadingQuestion;
use App\Models\ListeningQuestion;
use App\Models\WritingQuestion;
use App\Models\SpeakingQuestion;
use App\Models\AssessmentSubmission;
use App\Models\AssessmentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class StudentAssessmentController extends Controller
{
    public function show($type, $skill)
    {
        $this->validateTypeAndSkill($type, $skill);

        $unit = Unit::where('type', $type)
            ->where('status', 'active')
            ->firstOrFail();

        $lesson = Lesson::where('unit_id', $unit->id)
            ->where('skill_type', $skill)
            ->where('status', 'active')
            ->firstOrFail();
        
        $submission = AssessmentSubmission::where('user_id', Auth::id())
            ->where('lesson_id', $lesson->id)
            ->where('type', $type)
            ->where('skill', $skill)
            ->latest()
            ->first();

        if ($submission) {
            return redirect()->route(
                'student.assessment.result',
                $submission->id
            );
        }

        $questions = $this->getQuestions($skill, $lesson->id);

        if ($skill === 'listening') {
            return view('missions.assessment.listening', compact(
                'lesson',
                'questions',
                'type',
                'skill'
            ));
        }

        if ($skill === 'reading') {
            return view('missions.assessment.reading', compact(
                'lesson',
                'questions',
                'type',
                'skill'
            ));
        }

        if ($skill === 'writing') {
            return view('missions.assessment.writing', compact(
                'lesson',
                'questions',
                'type',
                'skill'
            ));
        }

        return view('missions.assessment.speaking', compact(
            'lesson',
            'questions',
            'type',
            'skill'
        ));

    }

    public function submit(Request $request, $type, $skill)
    {
        $this->validateTypeAndSkill($type, $skill);

        $unit = Unit::where('type', $type)
            ->where('status', 'active')
            ->firstOrFail();

        $lesson = Lesson::where('unit_id', $unit->id)
            ->where('skill_type', $skill)
            ->where('status', 'active')
            ->firstOrFail();
        
        $existing = AssessmentSubmission::where('user_id', Auth::id())
            ->where('lesson_id', $lesson->id)
            ->where('type', $type)
            ->where('skill', $skill)
            ->whereIn('status', ['pending', 'completed'])
            ->first();

        if ($existing) {
            return redirect()->route(
                'student.assessment.result',
                $existing->id
            );
        }

        $answers = $request->input('answers', []);

        if (empty($answers)) {
            return back()->with('error', 'Silakan jawab soal terlebih dahulu.');
        }

        if ($skill === 'reading' || $skill === 'listening') {
            return $this->submitObjectiveAssessment(
                $type,
                $skill,
                $unit,
                $lesson,
                $answers
            );
        }

        return $this->submitAiAssessment(
            $type,
            $skill,
            $unit,
            $lesson,
            $answers
        );
    }

    public function result(AssessmentSubmission $submission)
    {
        if ($submission->user_id !== Auth::id()) {
            abort(403);
        }

        $submission->load([
            'unit',
            'lesson',
            'answers',
        ]);

        return view(
            'missions.assessment.' . $submission->skill,
            compact('submission')
        );
    }

    private function validateTypeAndSkill(string $type, string $skill): void
    {
        if (!in_array($type, ['pretest', 'posttest'])) {
            abort(404);
        }

        if (!in_array($skill, ['listening', 'reading', 'writing', 'speaking'])) {
            abort(404);
        }
    }

    private function getQuestions(string $skill, int $lessonId)
    {
        if ($skill === 'reading') {
            return ReadingQuestion::where('lesson_id', $lessonId)
                ->whereNull('reading_material_id')
                ->get();
        }

        if ($skill === 'listening') {
            return ListeningQuestion::where('lesson_id', $lessonId)
                ->whereNull('listening_material_id')
                ->get();
        }

        if ($skill === 'writing') {
            return WritingQuestion::where('lesson_id', $lessonId)
                ->whereNull('writing_material_id')
                ->get();
        }

        return SpeakingQuestion::where('lesson_id', $lessonId)
            ->whereNull('speaking_material_id')
            ->get();
    }

    private function submitObjectiveAssessment(
        string $type,
        string $skill,
        Unit $unit,
        Lesson $lesson,
        array $answers
    ) {
        $questionIds = array_keys($answers);

        $questions = $skill === 'reading'
            ? ReadingQuestion::where('lesson_id', $lesson->id)
                ->whereNull('reading_material_id')
                ->whereIn('id', $questionIds)
                ->get()
            : ListeningQuestion::where('lesson_id', $lesson->id)
                ->whereNull('listening_material_id')
                ->whereIn('id', $questionIds)
                ->get();

        return DB::transaction(function () use (
            $type,
            $skill,
            $unit,
            $lesson,
            $answers,
            $questions
        ) {
            $submission = AssessmentSubmission::create([
                'user_id' => Auth::id(),
                'unit_id' => $unit->id,
                'lesson_id' => $lesson->id,
                'type' => $type,
                'skill' => $skill,
                'final_score' => 0,
                'status' => 'completed',
                'feedback' => null,
                'submitted_at' => now(),
            ]);

            $totalScore = 0;
            $maxScore = 0;

            foreach ($questions as $question) {
                $selectedOption = $answers[$question->id] ?? null;
                $isCorrect = $selectedOption === $question->correct_answer;
                $questionScore = (int) $question->score;
                $score = $isCorrect ? $questionScore : 0;

                $totalScore += $score;
                $maxScore += $questionScore;

                AssessmentAnswer::create([
                    'assessment_submission_id' => $submission->id,
                    'question_type' => $skill,
                    'question_id' => $question->id,
                    'answer' => null,
                    'selected_option' => $selectedOption,
                    'is_correct' => $isCorrect,
                    'score' => $score,
                    'max_score' => $questionScore,
                    'feedback' => null,
                ]);
            }

            $finalScore = $maxScore > 0
                ? round(($totalScore / $maxScore) * 100)
                : 0;

            $submission->update([
                'final_score' => $finalScore,
                'feedback' => 'Jawaban berhasil dinilai otomatis oleh sistem.',
            ]);

            return redirect()
                ->route('student.assessment.result', $submission->id)
                ->with('success', 'Jawaban berhasil dikirim.');
        });
    }

    private function submitAiAssessment(
        string $type,
        string $skill,
        Unit $unit,
        Lesson $lesson,
        array $answers
    ) {
        $questionIds = array_keys($answers);

        $questions = $skill === 'writing'
            ? WritingQuestion::where('lesson_id', $lesson->id)
                ->whereNull('writing_material_id')
                ->whereIn('id', $questionIds)
                ->get()
            : SpeakingQuestion::where('lesson_id', $lesson->id)
                ->whereNull('speaking_material_id')
                ->whereIn('id', $questionIds)
                ->get();

        return DB::transaction(function () use (
            $type,
            $skill,
            $unit,
            $lesson,
            $answers,
            $questions
        ) {
            $submission = AssessmentSubmission::create([
                'user_id' => Auth::id(),
                'unit_id' => $unit->id,
                'lesson_id' => $lesson->id,
                'type' => $type,
                'skill' => $skill,
                'final_score' => null,
                'status' => 'pending',
                'feedback' => 'Jawaban berhasil disimpan. Penilaian AI sedang diproses.',
                'submitted_at' => now(),
            ]);

            $totalScore = 0;
            $totalMaxScore = 0;
            $combinedFeedback = [];

            foreach ($questions as $question) {
                $studentAnswer = $answers[$question->id] ?? '';

                $aiResult = $this->scoreWithAi(
                    $skill,
                    $question->question,
                    $question->image,
                    $studentAnswer
        
                );

                if ($skill === 'writing') {

                    $orientation = $aiResult['orientation'];
                    $complication = $aiResult['complication'];
                    $resolution = $aiResult['resolution'];
                    $organization = $aiResult['organization'];
                    $mechanics = $aiResult['mechanics'];

                    $totalRubric =
                        $orientation +
                        $complication +
                        $resolution +
                        $organization +
                        $mechanics;

                } else {

                    $details = $aiResult['details'];
                    $fluency = $aiResult['fluency'];
                    $pronunciation = $aiResult['pronunciation'];
                    $vocabulary = $aiResult['vocabulary'];
                    $grammar = $aiResult['grammar'];

                    $totalRubric =
                        $details +
                        $fluency +
                        $pronunciation +
                        $vocabulary +
                        $grammar;

                }

                $feedback = $aiResult['feedback'] ?? 'Tidak ada feedback.';

                $score = round(($totalRubric / 20) * 100);
                $totalScore += $score;
                $totalMaxScore += 100;

                $combinedFeedback[] = 'Question ' . $question->id . ': ' . $feedback;

                if ($skill === 'writing') {

                    AssessmentAnswer::create([
                        'assessment_submission_id' => $submission->id,
                        'question_type' => $skill,
                        'question_id' => $question->id,
                        'answer' => $studentAnswer,
                        'orientation_score' => $orientation,
                        'complication_score' => $complication,
                        'resolution_score' => $resolution,
                        'organization_score' => $organization,
                        'mechanics_score' => $mechanics,
                        'score' => $score,
                        'max_score' => 100,
                        'feedback' => $feedback,
                    ]);

                } else {

                    AssessmentAnswer::create([
                        'assessment_submission_id' => $submission->id,
                        'question_type' => $skill,
                        'question_id' => $question->id,
                        'answer' => $studentAnswer,
                        'details_score' => $details,
                        'fluency_score' => $fluency,
                        'pronunciation_score' => $pronunciation,
                        'vocabulary_score' => $vocabulary,
                        'grammar_score' => $grammar,
                        'score' => $score,
                        'max_score' => 100,
                        'feedback' => $feedback,
                    ]);

                }
            }

            $finalScore = $totalMaxScore > 0
                ? round(($totalScore / $totalMaxScore) * 100)
                : 0;

            $submission->update([
                'final_score' => $finalScore,
                'status' => 'completed',
                'feedback' => implode("\n", $combinedFeedback),
            ]);

            return redirect()
                ->route('student.assessment.result', $submission->id)
                ->with('success', 'Jawaban berhasil dikirim.');
        });
    }

    private function scoreWithAi(
        string $skill,
        string $question,
        ?string $image = null,
        string $answer
    ): array {
        $prompt = $this->buildAiPrompt($skill, $question, $image, $answer);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('DINOIKI_API_KEY'),
            'Content-Type' => 'application/json',
        ])
            ->timeout(60)
            ->post('https://ai.dinoiki.com/v1/chat/completions', [
                'model' => 'gpt-4o',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],
                'temperature' => 0.2,
                'max_tokens' => 500,
            ]);

        if (!$response->successful()) {
            if ($skill === 'writing') {
                return [
                    'orientation' => 1,
                    'complication' => 1,
                    'resolution' => 1,
                    'organization' => 1,
                    'mechanics' => 1,
                    'feedback' => 'Penilaian AI gagal diproses.',
                ];

                }

                return [
                    'details' => 1,
                    'fluency' => 1,
                    'pronunciation' => 1,
                    'vocabulary' => 1,
                    'grammar' => 1,
                    'feedback' => 'Penilaian AI gagal diproses.',
                ];
        }

        $content = $response['choices'][0]['message']['content'] ?? '';

        $content = str_replace(
            ['```json', '```'],
            '',
            $content
        );

        $result = json_decode(trim($content), true);

        if (!is_array($result)) {
            if ($skill === 'writing') {
                return [
                    'orientation' => 1,
                    'complication' => 1,
                    'resolution' => 1,
                    'organization' => 1,
                    'mechanics' => 1,
                    'feedback' => 'Format hasil AI tidak valid.',
                ];

            }
            return [
                'details' => 1,
                'fluency' => 1,
                'pronunciation' => 1,
                'vocabulary' => 1,
                'grammar' => 1,
                'feedback' => 'Format hasil AI tidak valid.',
            ];
        }

        if ($skill === 'writing') {
            return [
                'orientation' => (int) ($result['orientation'] ?? 1),
                'complication' => (int) ($result['complication'] ?? 1),
                'resolution' => (int) ($result['resolution'] ?? 1),
                'organization' => (int) ($result['organization'] ?? 1),
                'mechanics' => (int) ($result['mechanics'] ?? 1),
                'feedback' => $result['feedback'] ?? 'Tidak ada feedback.',
            ];
        }

        return [
            'details' => (int) ($result['details'] ?? 1),
            'fluency' => (int) ($result['fluency'] ?? 1),
            'pronunciation' => (int) ($result['pronunciation'] ?? 1),
            'vocabulary' => (int) ($result['vocabulary'] ?? 1),
            'grammar' => (int) ($result['grammar'] ?? 1),
            'feedback' => $result['feedback'] ?? 'Tidak ada feedback.',
        ];

    }

    private function buildAiPrompt(
        string $skill,
        string $question,
        ?string $image = null,
        string $answer
    ): string {
        if ($skill === 'writing') {
            return "
                You are an English writing examiner.

                Evaluate the student's writing using ONLY this rubric.

                Orientation
                1 = The readers have trouble figuring out who the main characters are, when and where the story took place.
                2 = The main characters are named but the readers know very little about the characters. The readers can figure out the setting of time and place, but the writer did not supply much detail.
                3 = The main characters are named and described so that most of the readers would have some ideas of what the characters looked like. The writer uses some vivid, descriptive words to describe the setting of time and place.
                4 = The main characters are named and clearly described so that most of the readers could describe the characters accurately. The writer uses many vivid, descriptive words to describe the setting of time and place.

                Complication
                1 = It is not clear what problem the characters face or have.
                2 = It is fairly easy for the readers to understand the problem but it is not clear why it is a problem.
                3 = The readers can fairly easily understand the problem and why it is a problem.
                4 = The readers can very easily understand the problem and why it is a problem.

                Resolution
                1 = There is no solution which was attempted. It is impossible to understand the solution.
                2 = It is little hard to understand the solution to the character's problem.
                3 = The solution to the character's problem is easy to understand and is somewhat logical.
                4 = The solution to the character's problem is easy to understand, and is logical. There is no loose ending.

                Organization
                1 = The ideas and scenes seem to be randomly arranged.
                2 = The story is a little hard to follow and the transitions are sometimes not clear.
                3 = The story is pretty well organized. One idea or scene may seem out of place. Clear transitions are used.
                4 = The story is very well organized. One idea or scene follows another in a logical sequence with clear transitions.

                Mechanics
                1 = The story contains so many errors in grammar, usage, and mechanics. Those errors also block reading.
                2 = The story contains many or serious errors in grammar, usage, or mechanics. Those errors may interfere with reading.
                3 = The story contains few minor errors in grammar, usage, or mechanics.
                4 = The story contains no error in grammar, usage or mechanics.

                Question:
                {$question}

                Student Answer:
                {$answer}

                Return ONLY valid JSON.

                {

                \"orientation\":4,
                \"complication\":3,
                \"resolution\":4,
                \"organization\":3,
                \"mechanics\":4,

                \"feedback\":\"Provide constructive feedback in 3–6 sentences. Explain the student's strengths, weaknesses, and give specific recommendations for improvement based on the rubric. Do not simply say 'Good job'\"

                }

            ";

        }

        return "
                You are an English speaking examiner.

                The student's speaking response is provided as text transcript.
                Evaluate the student's speaking using ONLY the following rubric.

                Details
                1 = The story's characters, setting, problem/conflict, and resolution are all poorly described by the speaker, making it difficult for the listener to follow along.
                2 = The speakers only briefly describe the characters, setting, problem/conflict, and resolution. Some additional details need to be provided.
                3 = The story's characters, setting, problem/conflict, and resolution are presented using the good level of description with all required information.
                4 = The story's characters, setting, problem/conflict, and resolution are presented using the excellent level of description with many additional details beyond the required.

                Fluency
                1 = The speech is slow with hesitant and strained except for short memorized phrases so that it is difficult to perceive the continuity in speech.
                2 = The speech is frequently hesitant with some sentences left uncompleted and the volume is very soft.
                3 = The speech is relatively smooth, with some hesitation, a slight search for words and inaudible word or two.
                4 = The speaker shows smooth and fluid speech with few to no hesitation, and no attempts to search for words.

                Pronunciation
                1 = The pronunciation is lacking and hard to understand. There is no effort toward a native accent.
                2 = The pronunciation is okay. There is no effort toward a native accent.
                3 = The pronunciation is good. There are some effort at accent but is definitely non-native.
                4 = The pronunciation is excellent and there is good effort at accent.

                Vocabulary
                1 = There is weak language control and the vocabulary which is used does not match the context of the story.
                2 = There are weak language control and basic vocabulary choice.
                3 = There are adequate language control and the vocabulary range is lacking.
                4 = There are good language control and a wide range of well-chosen vocabulary.

                Grammar
                1= There are frequent grammatical errors even in simple structure. Meaning is obscured.
                2 = There are frequent grammatical errors that at times obscure meaning.
                3 = There are some errors in grammatical structures but do not obscure meaning. There is also attempt to include variety of grammatical structures.
                4 = There are accuracy and variety of grammatical structures.


                Speaking Question:
                {$question}

                Student Response:
                {$answer}

                Return ONLY valid JSON.

                {

                \"details\":4,
                \"fluency\":3,
                \"pronunciation\":4,
                \"vocabulary\":3,
                \"grammar\":4,

                \"feedback\":\"Provide constructive feedback in 3–6 sentences. Explain the student's strengths, weaknesses, and give specific recommendations for improving the student's speaking skills based on the rubric. Comment on the details, fluency, pronunciation, vocabulary, and grammar. Do not simply say 'Good job'\"

            }

        ";
    }
}