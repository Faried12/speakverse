<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpeakingMaterial;
use App\Models\SpeakingSubmission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class StudentSpeakingController extends Controller
{
    public function index()
    {
        $material = SpeakingMaterial::with('questions')
            ->first();

        return view(
            'missions.unit1.speaking',
            compact('material')
        );
    }

    public function quiz()
    {
        $material = SpeakingMaterial::with('questions')
            ->findOrFail(3);

        return view(
            'missions.unit1.speaking-quiz',
            compact('material')
        );
    }

    public function submit(
        Request $request,
        SpeakingMaterial $material
    )
    {
        $audioPath = $request
            ->file('audio_file')
            ->store(
                'speaking',
                'public'
            );

        $submission =
            SpeakingSubmission::create([
                'user_id' => Auth::id(),
                'speaking_material_id' => $material->id,
                'audio_file' => $audioPath,
                'status' => 'processing',
            ]);

        // sementara masih dummy
        $transcript =
            'This is a test transcript.';

        $response =
            Http::withHeaders([
                'Authorization' =>
                    'Bearer ' .
                    env('DINOIKI_API_KEY'),
            ])
            ->post(
                'https://ai.dinoiki.com/v1/chat/completions',
                [
                    'model' => 'gpt-4o',

                    'messages' => [
                        [
                            'role' => 'user',

                            'content' => "
                                You are an English speaking examiner.

                                Evaluate the transcript according to the following rubric.

                                DETAILS
                                Score 1:
                                Student shows little understanding of the story.
                                Listener cannot understand orientation, complication, and resolution.

                                Score 2:
                                Student shows adequate understanding.
                                Some descriptions and additional details are missing.

                                Score 3:
                                Student shows good understanding.
                                Orientation, complication, and resolution are complete.

                                Score 4:
                                Student shows excellent understanding.
                                Provides additional details beyond what is required.

                                FLUENCY
                                Score 1:
                                Speech is slow, hesitant, and difficult to follow.

                                Score 2:
                                Speech is frequently hesitant and sometimes incomplete.

                                Score 3:
                                Speech is relatively smooth with minor hesitation.

                                Score 4:
                                Speech is smooth and fluent with little or no hesitation.

                                PRONUNCIATION
                                Score 1:
                                Pronunciation is difficult to understand.

                                Score 2:
                                Pronunciation is understandable but basic.

                                Score 3:
                                Pronunciation is generally good with some effort toward accent.

                                Score 4:
                                Pronunciation is excellent and clear.

                                VOCABULARY
                                Score 1:
                                Weak language control and vocabulary does not fit context.

                                Score 2:
                                Basic vocabulary with limited language control.

                                Score 3:
                                Adequate vocabulary but limited range.

                                Score 4:
                                Wide range of vocabulary and good language control.

                                GRAMMAR
                                Score 1:
                                Frequent grammar errors that obscure meaning.

                                Score 2:
                                Frequent grammar errors that sometimes obscure meaning.

                                Score 3:
                                Some grammar errors but meaning remains clear.

                                Score 4:
                                Accurate and varied grammatical structures.

                                Calculate:

                                total_score =
                                ((details_score +
                                fluency_score +
                                pronunciation_score +
                                vocabulary_score +
                                grammar_score) / 20) * 100

                                Transcript:

                                {$transcript}

                                Return ONLY valid JSON:

                                {
                                    \"details_score\": 1,
                                    \"fluency_score\": 1,
                                    \"pronunciation_score\": 1,
                                    \"vocabulary_score\": 1,
                                    \"grammar_score\": 1,
                                    \"feedback\": \"...\"
                                }
                                "
                        ]
                    ],

                    'temperature' => 0.3,
                    'max_tokens' => 300
                ]
            );

        if (!$response->successful()) {

            return response()->json([
                'error' => 'AI request failed',
                'response' => $response->body()
            ], 500);

        }

        $content =
            $response['choices'][0]['message']['content'] ?? '';

        $content = str_replace(
            ['```json', '```'],
            '',
            $content
        );

        $result = [
            'details_score' => 1,
            'fluency_score' => 2,
            'pronunciation_score' => 1,
            'vocabulary_score' => 1,
            'grammar_score' => 1,
            'feedback' => 'The speaker showed some effort in answering the question, but there were difficulties with pronunciation, grammar, and vocabulary. Fluency was limited and the response lacked sufficient detail. Continued practice will help improve speaking confidence and communication skills.'
        ];
        $totalScore = 30;
        //     if (!$result) {

        //     return response()->json([
        //         'error' => 'Failed to parse AI response',
        //         'content' => $content
        //     ], 500);

        // }

        // $details = (int) ($result['details_score'] ?? 0);
        // $fluency = (int) ($result['fluency_score'] ?? 0);
        // $pronunciation = (int) ($result['pronunciation_score'] ?? 0);
        // $vocabulary = (int) ($result['vocabulary_score'] ?? 0);
        // $grammar = (int) ($result['grammar_score'] ?? 0);

        // $totalScore = round(
        //     (
        //         $details +
        //         $fluency +
        //         $pronunciation +
        //         $vocabulary +
        //         $grammar
        //     ) / 20 * 100
        // );

        $result['total_score'] = $totalScore;

        $submission->update([

            'transcript' => $transcript,

            'details_score' =>
                $result['details_score'] ?? 0,

            'fluency_score' =>
                $result['fluency_score'] ?? 0,

            'pronunciation_score' =>
                $result['pronunciation_score'] ?? 0,

            'vocabulary_score' =>
                $result['vocabulary_score'] ?? 0,

            'grammar_score' =>
                $result['grammar_score'] ?? 0,

            'total_score' => $totalScore,

            'feedback' =>
                $result['feedback'] ?? '',

            'status' => 'completed'
        ]);

        $submission->refresh();

        // return response()->json([
        //     'saved_data' => $submission
        // ]);
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