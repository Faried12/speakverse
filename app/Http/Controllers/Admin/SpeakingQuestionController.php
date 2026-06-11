<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpeakingMaterial;
use App\Models\SpeakingQuestion;

class SpeakingQuestionController extends Controller
{
    public function index(
        SpeakingMaterial $material
    )
    {
        $questions = SpeakingQuestion::where(
            'speaking_material_id',
            $material->id
        )
        ->latest()
        ->get();

        return view(
            'admin.speaking-questions.index',
            compact(
                'material',
                'questions'
            )
        );
    }

    public function create(
        SpeakingMaterial $material
    )
    {
        return view(
            'admin.speaking-questions.create',
            compact('material')
        );
    }

    public function store(
        Request $request,
        SpeakingMaterial $material
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
                    'speaking-questions',
                    'public'
                );
        }

        SpeakingQuestion::create([
            'speaking_material_id' => $material->id,
            'question' => $validated['question'],
            'image' => $imagePath,
        ]);

        return redirect()
            ->route(
                'admin.speaking-questions.index',
                $material->id
            )
            ->with(
                'success',
                'Speaking Question created successfully.'
            );
    }

    public function edit(
        SpeakingQuestion $question
    )
    {
        return view(
            'admin.speaking-questions.edit',
            compact('question')
        );
    }

    public function update(
        Request $request,
        SpeakingQuestion $question
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
                    'speaking-questions',
                    'public'
                );
        }

        $question->update([
            'question' => $validated['question'],
            'image' => $imagePath,
        ]);

        return redirect()
            ->route(
                'admin.speaking-questions.index',
                $question->speaking_material_id
            )
            ->with(
                'success',
                'Speaking Question updated successfully.'
            );
    }

    public function destroy(
        SpeakingQuestion $question
    )
    {
        $materialId =
            $question->speaking_material_id;

        $question->delete();

        return redirect()
            ->route(
                'admin.speaking-questions.index',
                $materialId
            )
            ->with(
                'success',
                'Speaking Question deleted successfully.'
            );
    }
}