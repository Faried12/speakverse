<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\ReadingMaterial;
use App\Models\UserLessonProgress;
use App\Models\AssessmentSubmission;
use App\Models\AssessmentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentReadingController extends Controller
{
    public function reading(Lesson $lesson)
    {
        $material = ReadingMaterial::with('questions')
            ->where('lesson_id', $lesson->id)
            ->firstOrFail();

        return view('missions.reading.index', compact('lesson', 'material'));
    }

    public function quiz(Lesson $lesson)
    {
        $material = ReadingMaterial::with('questions')
            ->where('lesson_id', $lesson->id)
            ->firstOrFail();

        return view('missions.reading.quiz', [
            'lesson' => $lesson,
            'material' => $material,
            'questions' => $material->questions
        ]);
    }

    public function complete(Request $request, Lesson $lesson)
    {
        $request->validate([
            'answers' => ['required', 'array'],
            'score' => ['nullable', 'integer'],
        ]);

        $material = ReadingMaterial::with('questions')
            ->where('lesson_id', $lesson->id)
            ->firstOrFail();

        $submission = DB::transaction(function () use ($request, $lesson, $material) {
            $answers = $request->answers;
            $totalScore = 0;

            $submission = AssessmentSubmission::create([
                'user_id' => Auth::id(),
                'unit_id' => $lesson->unit_id,
                'lesson_id' => $lesson->id,
                'type' => 'unit',
                'skill' => 'reading',
                'final_score' => 0,
                'status' => 'completed',
                'feedback' => 'Reading quiz completed.',
                'submitted_at' => now(),
            ]);

            foreach ($material->questions as $question) {
                $selected = $answers[$question->id] ?? null;

                $isCorrect = $selected &&
                    strtoupper($selected) === strtoupper($question->correct_answer);

                $score = $isCorrect ? (int) $question->score : 0;

                $totalScore += $score;

                AssessmentAnswer::create([
                    'assessment_submission_id' => $submission->id,
                    'question_type' => 'reading',
                    'question_id' => $question->id,
                    'selected_option' => $selected,
                    'is_correct' => $isCorrect,
                    'score' => $score,
                    'max_score' => (int) $question->score,
                    'feedback' => $isCorrect ? 'Correct answer.' : 'Incorrect answer.',
                ]);
            }

            $submission->update([
                'final_score' => $totalScore,
            ]);

            UserLessonProgress::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'lesson_id' => $lesson->id,
                    'skill_type' => 'reading',
                ],
                [
                    'unit_id' => $lesson->unit_id,
                    'status' => 'completed',
                    'score' => $totalScore,
                    'completed_at' => now(),
                ]
            );

            return $submission;
        });

        return response()->json([
            'success' => true,
            'score' => $submission->final_score,
            'submission_id' => $submission->id,
            'message' => 'Reading result saved.'
        ]);
    }
}