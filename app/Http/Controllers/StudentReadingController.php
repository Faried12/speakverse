<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\ReadingMaterial;
use App\Models\UserLessonProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentReadingController extends Controller
{
    public function reading(Lesson $lesson)
    {
        $material = ReadingMaterial::with('questions')
            ->where('lesson_id', $lesson->id)
            ->firstOrFail();

        return view(
            'missions.reading.index',
            compact('lesson', 'material')
        );
    }

    public function quiz(Lesson $lesson)
    {
        $material = ReadingMaterial::with('questions')
            ->where('lesson_id', $lesson->id)
            ->firstOrFail();

        return view(
            'missions.reading.quiz',
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
                'skill_type' => 'reading',
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
            'message' => 'Reading progress saved.'
        ]);
    }
}