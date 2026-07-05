<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\ReadingMaterial;

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
}