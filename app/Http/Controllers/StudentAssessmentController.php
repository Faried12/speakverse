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

        $questions = $this->getQuestions($skill, $lesson->id);

        return view('missions.assessment.show', compact(
            'type',
            'skill',
            'unit',
            'lesson',
            'questions'
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
            'missions.assessment.result',
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
                    $studentAnswer
                );

                $score = (int) ($aiResult['score'] ?? 0);
                $feedback = $aiResult['feedback'] ?? 'Tidak ada feedback.';

                $totalScore += $score;
                $totalMaxScore += 100;

                $combinedFeedback[] = 'Question ' . $question->id . ': ' . $feedback;

                AssessmentAnswer::create([
                    'assessment_submission_id' => $submission->id,
                    'question_type' => $skill,
                    'question_id' => $question->id,
                    'answer' => $studentAnswer,
                    'selected_option' => null,
                    'is_correct' => null,
                    'score' => $score,
                    'max_score' => 100,
                    'feedback' => $feedback,
                ]);
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
        string $answer
    ): array {
        $prompt = $this->buildAiPrompt($skill, $question, $answer);

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
            return [
                'score' => 0,
                'feedback' => 'Penilaian AI gagal diproses. Silakan coba lagi.',
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
            return [
                'score' => 0,
                'feedback' => 'Format hasil AI tidak valid.',
            ];
        }

        return [
            'score' => max(0, min(100, (int) ($result['score'] ?? 0))),
            'feedback' => $result['feedback'] ?? 'Tidak ada feedback.',
        ];
    }

    private function buildAiPrompt(
        string $skill,
        string $question,
        string $answer
    ): string {
        if ($skill === 'writing') {
            return "
You are an English writing examiner.

Evaluate the student's writing answer based on:
1. Content relevance
2. Organization
3. Grammar
4. Vocabulary
5. Mechanics

Give a score from 0 to 100.

Question:
{$question}

Student Answer:
{$answer}

Return ONLY valid JSON:
{
  \"score\": 80,
  \"feedback\": \"Brief feedback for the student.\"
}
";
        }

        return "
You are an English speaking examiner.

The student's speaking response is provided as text transcript.
Evaluate it based on:
1. Relevance
2. Fluency impression
3. Vocabulary
4. Grammar
5. Clarity of response

Give a score from 0 to 100.

Speaking Question:
{$question}

Student Response:
{$answer}

Return ONLY valid JSON:
{
  \"score\": 80,
  \"feedback\": \"Brief feedback for the student.\"
}
";
    }
}