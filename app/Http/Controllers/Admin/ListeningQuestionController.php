<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\ListeningMaterial;
use App\Models\ListeningQuestion;
use Illuminate\Http\Request;

class ListeningQuestionController extends Controller
{
    public function index(ListeningMaterial $material)
    {
        $questions = $material
            ->questions()
            ->latest()
            ->get();

        return view(
            'admin.listening-questions.index',
            compact('material', 'questions')
        );
    }

    public function create(ListeningMaterial $material)
    {
        return view(
            'admin.listening-questions.create',
            compact('material')
        );
    }

    public function store(Request $request, ListeningMaterial $material)
    {
        $validated = $this->validateQuestion($request);

        ListeningQuestion::create([
            'lesson_id' => $material->lesson_id,
            'listening_material_id' => $material->id,
            'question' => $validated['question'],
            'option_a' => $validated['option_a'],
            'option_b' => $validated['option_b'],
            'option_c' => $validated['option_c'],
            'option_d' => $validated['option_d'],
            'option_e' => $validated['option_e'] ?? null,
            'correct_answer' => $validated['correct_answer'],
            'score' => $validated['score'],
        ]);

        return redirect()
            ->route('admin.listening-questions.index', $material->id)
            ->with('success', 'Question berhasil ditambahkan.');
    }

    public function lessonIndex(Lesson $lesson)
    {
        $questions = ListeningQuestion::where('lesson_id', $lesson->id)
            ->whereNull('listening_material_id')
            ->latest()
            ->get();

        return view(
            'admin.listening-questions.index',
            compact('lesson', 'questions')
        );
    }

    public function lessonCreate(Lesson $lesson)
    {
        return view(
            'admin.listening-questions.create',
            compact('lesson')
        );
    }

    public function lessonStore(Request $request, Lesson $lesson)
    {
        $validated = $this->validateQuestion($request);

        ListeningQuestion::create([
            'lesson_id' => $lesson->id,
            'listening_material_id' => null,
            'question' => $validated['question'],
            'option_a' => $validated['option_a'],
            'option_b' => $validated['option_b'],
            'option_c' => $validated['option_c'],
            'option_d' => $validated['option_d'],
            'option_e' => $validated['option_e'] ?? null,
            'correct_answer' => $validated['correct_answer'],
            'score' => $validated['score'],
        ]);

        return redirect()
            ->route('admin.listening-lesson-questions.index', $lesson->id)
            ->with('success', 'Pre/Post-test listening question berhasil ditambahkan.');
    }

    public function edit(ListeningQuestion $question)
    {
        return view(
            'admin.listening-questions.edit',
            compact('question')
        );
    }

    public function update(Request $request, ListeningQuestion $question)
    {
        $validated = $this->validateQuestion($request);

        $question->update([
            'question' => $validated['question'],
            'option_a' => $validated['option_a'],
            'option_b' => $validated['option_b'],
            'option_c' => $validated['option_c'],
            'option_d' => $validated['option_d'],
            'option_e' => $validated['option_e'] ?? null,
            'correct_answer' => $validated['correct_answer'],
            'score' => $validated['score'],
        ]);

        return $this->redirectAfterAction($question)
            ->with('success', 'Question berhasil diperbarui.');
    }

    public function destroy(ListeningQuestion $question)
    {
        $redirect = $this->redirectAfterAction($question);

        $question->delete();

        return $redirect->with('success', 'Question berhasil dihapus.');
    }

    private function validateQuestion(Request $request): array
    {
        return $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'option_e' => 'nullable',
            'correct_answer' => 'required|in:A,B,C,D,E',
            'score' => 'required|integer|min:1',
        ]);
    }

    private function redirectAfterAction(ListeningQuestion $question)
    {
        if ($question->listening_material_id) {
            return redirect()->route(
                'admin.listening-questions.index',
                $question->listening_material_id
            );
        }

        return redirect()->route(
            'admin.listening-lesson-questions.index',
            $question->lesson_id
        );
    }
}