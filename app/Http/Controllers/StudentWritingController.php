<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\UserLessonProgress;
use App\Models\WritingMaterial;
use App\Models\WritingSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentWritingController extends Controller
{
    public function index(Lesson $lesson)
    {
        $material = WritingMaterial::with('questions')
            ->where('lesson_id', $lesson->id)
            ->firstOrFail();

        return view(
            'missions.writing.index',
            compact('lesson', 'material')
        );
    }

    public function quiz(Lesson $lesson)
    {
        $material = WritingMaterial::with('questions')
            ->where('lesson_id', $lesson->id)
            ->firstOrFail();

        return view(
            'missions.writing.quiz',
            compact('lesson', 'material')
        );
    }

    public function submit(
        Request $request,
        Lesson $lesson,
        WritingMaterial $material
    ) {
        $request->validate([
            'answer' => [
                'required',
                'string',
                'min:20'
            ]
        ]);

        $submission = WritingSubmission::create([
            'user_id' => Auth::id(),
            'writing_material_id' => $material->id,
            'answer' => $request->answer,
        ]);

        $result = [
            'orientation_score' => 1,
            'complication_score' => 1,
            'resolution_score' => 1,
            'organization_score' => 1,
            'mechanics_score' => 1,
            'feedback' =>
                'The writing demonstrates a good understanding of narrative structure. Continue practicing to improve grammar, vocabulary, and coherence.'
        ];

        $totalScore = 10;

        $submission->update([
            'orientation_score' => $result['orientation_score'],
            'complication_score' => $result['complication_score'],
            'resolution_score' => $result['resolution_score'],
            'organization_score' => $result['organization_score'],
            'mechanics_score' => $result['mechanics_score'],
            'final_score' => $totalScore,
            'feedback' => $result['feedback'],
        ]);

        $submission->refresh();

        UserLessonProgress::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'lesson_id' => $lesson->id,
                'skill_type' => 'writing',
            ],
            [
                'unit_id' => $lesson->unit_id,
                'status' => 'completed',
                'score' => $submission->final_score,
                'completed_at' => now(),
            ]
        );

        return response()->json([
            'orientation_score' => $submission->orientation_score,
            'complication_score' => $submission->complication_score,
            'resolution_score' => $submission->resolution_score,
            'organization_score' => $submission->organization_score,
            'mechanics_score' => $submission->mechanics_score,
            'total_score' => $submission->final_score,
            'feedback' => $submission->feedback,
        ]);
    }
}