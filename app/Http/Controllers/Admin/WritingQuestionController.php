<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WritingMaterial;
use App\Models\WritingQuestion;

class WritingQuestionController extends Controller
{
    public function index(
        WritingMaterial $material
    )
    {
        $questions = WritingQuestion::where(
            'writing_material_id',
            $material->id
        )
        ->latest()
        ->get();

        return view(
            'admin.writing-questions.index',
            compact(
                'material',
                'questions'
            )
        );
    }

    public function create(
        WritingMaterial $material
    )
    {
        return view(
            'admin.writing-questions.create',
            compact('material')
        );
    }

    public function store(
        Request $request,
        WritingMaterial $material
    )
    {
        $validated = $request->validate([
            'question' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {

            $imagePath = $request
                ->file('image')
                ->store(
                    'writing-questions',
                    'public'
                );
        }

        WritingQuestion::create([
            'writing_material_id' => $material->id,
            'question' => $validated['question'],
            'image' => $imagePath,
        ]);

        return redirect()
            ->route(
                'admin.writing-questions.index',
                $material->id
            )
            ->with(
                'success',
                'Writing Question created successfully.'
            );
    }

    public function edit(
        WritingQuestion $question
    )
    {
        return view(
            'admin.writing-questions.edit',
            compact('question')
        );
    }

    public function update(
        Request $request,
        WritingQuestion $question
    )
    {
        $validated = $request->validate([
            'question' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $question->image;

        if ($request->hasFile('image')) {

            $imagePath = $request
                ->file('image')
                ->store(
                    'writing-questions',
                    'public'
                );
        }

        $question->update([
            'question' => $validated['question'],
            'image' => $imagePath,
        ]);

        return redirect()
            ->route(
                'admin.writing-questions.index',
                $question->writing_material_id
            )
            ->with(
                'success',
                'Writing Question updated successfully.'
            );
    }

    public function destroy(
        WritingQuestion $question
    )
    {
        $materialId =
            $question->writing_material_id;

        $question->delete();

        return redirect()
            ->route(
                'admin.writing-questions.index',
                $materialId
            )
            ->with(
                'success',
                'Writing Question deleted successfully.'
            );
    }
}