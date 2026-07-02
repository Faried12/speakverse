<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\ListeningMaterial;

class StudentListeningController extends Controller
{
    public function listening(Lesson $lesson)
    {
        $material = ListeningMaterial::where(
                'lesson_id',
                $lesson->id
            )
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
        $material = ListeningMaterial::where(
            'lesson_id',
            $lesson->id
        )
        ->with('questions')
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
}