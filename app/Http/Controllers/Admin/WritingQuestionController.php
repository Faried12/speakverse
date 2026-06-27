<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\WritingMaterial;
use App\Models\WritingQuestion;
use Illuminate\Http\Request;

class WritingQuestionController extends Controller
{
    public function index(WritingMaterial $material)
    {
        $questions = WritingQuestion::where('writing_material_id', $material->id)
            ->latest()
            ->get();

        return view('admin.writing-questions.index', compact('material', 'questions'));
    }

    public function create(WritingMaterial $material)
    {
        return view('admin.writing-questions.create', compact('material'));
    }

    public function store(Request $request, WritingMaterial $material)
    {
        $validated = $this->validateQuestion($request);

        $imagePath = $this->uploadImage($request);

        WritingQuestion::create([
            'lesson_id' => $material->lesson_id,
            'writing_material_id' => $material->id,
            'question' => $validated['question'],
            'sample_answer' => $validated['sample_answer'] ?? null,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.writing-questions.index', $material->id)
            ->with('success', 'Writing Question created successfully.');
    }

    public function lessonIndex(Lesson $lesson)
    {
        $questions = WritingQuestion::where('lesson_id', $lesson->id)
            ->whereNull('writing_material_id')
            ->latest()
            ->get();

        return view('admin.writing-questions.index', compact('lesson', 'questions'));
    }

    public function lessonCreate(Lesson $lesson)
    {
        return view('admin.writing-questions.create', compact('lesson'));
    }

    public function lessonStore(Request $request, Lesson $lesson)
    {
        $validated = $this->validateQuestion($request);

        $imagePath = $this->uploadImage($request);

        WritingQuestion::create([
            'lesson_id' => $lesson->id,
            'writing_material_id' => null,
            'question' => $validated['question'],
            'sample_answer' => $validated['sample_answer'] ?? null,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.writing-lesson-questions.index', $lesson->id)
            ->with('success', 'Pre/Post-test writing question berhasil ditambahkan.');
    }

    public function edit(WritingQuestion $question)
    {
        return view('admin.writing-questions.edit', compact('question'));
    }

    public function update(Request $request, WritingQuestion $question)
    {
        $validated = $this->validateQuestion($request);

        $imagePath = $question->image;

        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request);
        }

        $question->update([
            'question' => $validated['question'],
            'sample_answer' => $validated['sample_answer'] ?? null,
            'image' => $imagePath,
        ]);

        return $this->redirectAfterAction($question)
            ->with('success', 'Writing Question updated successfully.');
    }

    public function destroy(WritingQuestion $question)
    {
        $redirect = $this->redirectAfterAction($question);

        $question->delete();

        return $redirect->with('success', 'Writing Question deleted successfully.');
    }

    private function validateQuestion(Request $request): array
    {
        return $request->validate([
            'question' => 'required',
            'sample_answer' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);
    }

    private function uploadImage(Request $request): ?string
    {
        if (!$request->hasFile('image')) {
            return null;
        }

        return $request
            ->file('image')
            ->store('writing-questions', 'public');
    }

    private function redirectAfterAction(WritingQuestion $question)
    {
        if ($question->writing_material_id) {
            return redirect()->route(
                'admin.writing-questions.index',
                $question->writing_material_id
            );
        }

        return redirect()->route(
            'admin.writing-lesson-questions.index',
            $question->lesson_id
        );
    }
}