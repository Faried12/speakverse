<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReadingMaterial;
use App\Models\ReadingQuestion;
use Illuminate\Http\Request;

class ReadingQuestionController extends Controller
{
    public function index(
        ReadingMaterial $material
    )
    {
        $questions = $material
            ->questions()
            ->latest()
            ->get();

        return view(
            'admin.reading-questions.index',
            compact(
                'material',
                'questions'
            )
        );
    }

    public function create(
        ReadingMaterial $material
    )
    {
        return view(
            'admin.reading-questions.create',
            compact('material')
        );
    }

    public function store(
        Request $request,
        ReadingMaterial $material
    )
    {
        $validated = $request->validate([

            'question' => 'required',

            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',

            'option_e' => 'nullable',

            'correct_answer' =>
                'required|in:A,B,C,D,E',

            'score' =>
                'required|integer|min:1'

        ]);

        ReadingQuestion::create([

            'reading_material_id' => $material->id,

            'question' => $validated['question'],

            'option_a' => $validated['option_a'],
            'option_b' => $validated['option_b'],
            'option_c' => $validated['option_c'],
            'option_d' => $validated['option_d'],

            'option_e' =>
                $validated['option_e'] ?? null,

            'correct_answer' =>
                $validated['correct_answer'],

            'score' =>
                $validated['score']

        ]);

        return redirect()
            ->route(
                'admin.reading-questions.index',
                $material->id
            )
            ->with(
                'success',
                'Question berhasil ditambahkan.'
            );
    }

    public function edit(
    ReadingQuestion $question
    )
    {
        return view(
            'admin.reading-questions.edit',
            compact('question')
        );
    }

    public function update(
        Request $request,
        ReadingQuestion $question
    )
    {
        $validated = $request->validate([

            'question' => 'required',

            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',

            'option_e' => 'nullable',

            'correct_answer' =>
                'required|in:A,B,C,D,E',

            'score' =>
                'required|integer|min:1'

        ]);

        $question->update([

            'question' => $validated['question'],

            'option_a' => $validated['option_a'],
            'option_b' => $validated['option_b'],
            'option_c' => $validated['option_c'],
            'option_d' => $validated['option_d'],

            'option_e' =>
                $validated['option_e'] ?? null,

            'correct_answer' =>
                $validated['correct_answer'],

            'score' =>
                $validated['score']

        ]);

        return redirect()
            ->route(
                'admin.reading-questions.index',
                $question->reading_material_id
            )
            ->with(
                'success',
                'Question berhasil diperbarui.'
            );
    }

    public function destroy(
        ReadingQuestion $question
    )
    {
        $materialId = $question->reading_material_id;

        $question->delete();

        return redirect()
            ->route(
                'admin.reading-questions.index',
                $materialId
            )
            ->with(
                'success',
                'Question berhasil dihapus.'
            );
    }
}