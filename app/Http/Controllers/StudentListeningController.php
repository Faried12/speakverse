<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\ListeningMaterial;
use App\Models\UserLessonProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentListeningController extends Controller
{
    public function listening(Lesson $lesson)
    {
        $material = ListeningMaterial::with('questions')
            ->where('lesson_id', $lesson->id)
            ->firstOrFail();

        return view(
            'missions.listening.index',
            [
                'lesson' => $lesson,
                'material' => $material
            ]
        );
    }

    public function quiz(Lesson $lesson)
    {
        $material = ListeningMaterial::with('questions')
            ->where('lesson_id', $lesson->id)
            ->firstOrFail();

        return view(
            'missions.listening.quiz',
            [
                'lesson' => $lesson,
                'material' => $material,
                'questions' => $material->questions
            ]
        );
    }

    public function complete(Request $request, Lesson $lesson)
    {
        UserLessonProgress::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'lesson_id' => $lesson->id,
                'skill_type' => 'listening',
            ],
            [
                'unit_id' => $lesson->unit_id,
                'status' => 'completed',
                'score' => $request->score ?? null,
                'completed_at' => now(),
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Listening progress saved.'
        ]);
    }
}