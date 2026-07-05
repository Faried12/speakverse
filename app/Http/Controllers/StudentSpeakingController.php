<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use App\Models\Lesson;
use App\Models\SpeakingMaterial;
use App\Models\SpeakingSubmission;

class StudentSpeakingController extends Controller
{
    public function index(Lesson $lesson)
    {
        $material = SpeakingMaterial::with('questions')
            ->where('lesson_id', $lesson->id)
            ->firstOrFail();

        return view(
            'missions.speaking.index',
            compact('lesson', 'material')
        );
    }

    public function quiz(Lesson $lesson)
    {
        $material = SpeakingMaterial::with('questions')
            ->where('lesson_id', $lesson->id)
            ->firstOrFail();

        return view(
            'missions.speaking.quiz',
            compact('lesson', 'material')
        );
    }

    public function submit(
        Request $request,
        Lesson $lesson,
        SpeakingMaterial $material
    )
    {
        $audioPath = $request
            ->file('audio_file')
            ->store('speaking', 'public');

        $submission = SpeakingSubmission::create([

            'user_id' => Auth::id(),
            'speaking_material_id' => $material->id,
            'audio_file' => $audioPath,
            'status' => 'processing',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Dummy Transcript
        |--------------------------------------------------------------------------
        */

        $transcript = 'This is a test transcript.';

        /*
        |--------------------------------------------------------------------------
        | Request AI (tetap dipanggil seperti sebelumnya)
        |--------------------------------------------------------------------------
        */

        Http::withHeaders([
            'Authorization' => 'Bearer '.env('DINOIKI_API_KEY'),
        ])->post(
            'https://ai.dinoiki.com/v1/chat/completions',
            [
                'model' => 'gpt-4o',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => "Evaluate this transcript:\n\n{$transcript}"
                    ]
                ]
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Dummy Result
        |--------------------------------------------------------------------------
        */

        $result = [

            'details_score' => 1,
            'fluency_score' => 2,
            'pronunciation_score' => 1,
            'vocabulary_score' => 1,
            'grammar_score' => 1,
            'feedback' =>
                'The speaker showed some effort in answering the question, but there were difficulties with pronunciation, grammar, and vocabulary.'

        ];

        $totalScore = 30;

        $submission->update([

            'transcript' => $transcript,

            'details_score' => $result['details_score'],
            'fluency_score' => $result['fluency_score'],
            'pronunciation_score' => $result['pronunciation_score'],
            'vocabulary_score' => $result['vocabulary_score'],
            'grammar_score' => $result['grammar_score'],
            'total_score' => $totalScore,
            'feedback' => $result['feedback'],
            'status' => 'completed',

        ]);

        $submission->refresh();

        return response()->json([

            'details_score' => $submission->details_score,
            'fluency_score' => $submission->fluency_score,
            'pronunciation_score' => $submission->pronunciation_score,
            'vocabulary_score' => $submission->vocabulary_score,
            'grammar_score' => $submission->grammar_score,
            'total_score' => $submission->total_score,
            'feedback' => $submission->feedback,

        ]);
    }
}