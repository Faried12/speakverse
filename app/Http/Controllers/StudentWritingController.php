<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WritingMaterial;
use App\Models\WritingQuestion;
use App\Models\WritingSubmission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;


class StudentWritingController extends Controller
{
    public function index()
    {
        $material = WritingMaterial::with('questions')
            ->first();

        return view(
            'missions.unit1.writing',
            compact('material')
        );
    }

    public function quiz()
    {
        $material = WritingMaterial::with('questions')
            ->firstOrFail();

        return view(
            'missions.unit1.writing-quiz',
            compact('material')
        );
    }

    public function submit(
        Request $request,
        WritingMaterial $material
    )
    {
        $request->validate([
            'answer' => [
                'required',
                'string',
                'min:20'
            ]
        ]);
        // dd($question);

        $submission = WritingSubmission::create([

            'user_id' => Auth::id(),

            'writing_material_id' => $material->id,

            'answer' => $request->answer,

        ]);

        /*
        |--------------------------------------------------------------------------
        | DUMMY RESULT
        |--------------------------------------------------------------------------
        */

        $result = [

            'orientation_score' => 1,

            'complication_score' => 1,

            'resolution_score' => 1,

            'organization_score' => 1,

            'mechanics_score' => 1,

            'feedback' =>
                'The writing demonstrates a good understanding of narrative structure. The orientation, complication, and resolution are present. Organization is generally clear and mechanics are mostly accurate. Continue practicing to improve grammar, vocabulary, and coherence.'
        ];
        $totalScore = 10;

        // $totalScore = round(
        //     (
        //         $result['orientation_score'] +
        //         $result['complication_score'] +
        //         $result['resolution_score'] +
        //         $result['organization_score'] +
        //         $result['mechanics_score']
        //     ) / 20 * 100
        // );

        $submission->update([

            'orientation_score' =>
                $result['orientation_score'],

            'complication_score' =>
                $result['complication_score'],

            'resolution_score' =>
                $result['resolution_score'],

            'organization_score' =>
                $result['organization_score'],

            'mechanics_score' =>
                $result['mechanics_score'],

            'final_score' =>
                $totalScore,

            'feedback' =>
                $result['feedback'],
        ]);

        $submission->refresh();

        return response()->json([

            'orientation_score' =>
                $submission->orientation_score,

            'complication_score' =>
                $submission->complication_score,

            'resolution_score' =>
                $submission->resolution_score,

            'organization_score' =>
                $submission->organization_score,

            'mechanics_score' =>
                $submission->mechanics_score,

            'total_score' =>
                $submission->final_score,

            'feedback' =>
                $submission->feedback,
        ]);
    }
}