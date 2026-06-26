<?php

namespace App\Http\Controllers;

use App\Models\ListeningMaterial;

class StudentListeningController extends Controller
{
    public function listening()
    {
        $material = ListeningMaterial::with('questions')
            ->first();

        return view(
            'missions.unit1.listening',
            compact('material')
        );
    }

    public function quiz()
    {
        $material = ListeningMaterial::with('questions')
            ->firstOrFail();

        return view(
            'missions.unit1.listening-quiz',
            [
                'material' => $material,
                'questions' => $material->questions
            ]
        );
    }
}