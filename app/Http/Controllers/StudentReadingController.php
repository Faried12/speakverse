<?php

namespace App\Http\Controllers;

use App\Models\ReadingMaterial;

class StudentReadingController extends Controller
{
    public function reading()
    {
        $material = ReadingMaterial::with('questions')
            ->first();

        return view(
            'missions.unit1.reading',
            compact('material')
        );
    }

    public function quiz()
    {
        $material = ReadingMaterial::with('questions')
            ->firstOrFail();

        return view(
            'missions.unit1.reading-quiz',
            [
                'material' => $material,
                'questions' => $material->questions
            ]
        );
    }
}