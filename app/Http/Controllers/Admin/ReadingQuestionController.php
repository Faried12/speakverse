<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\ReadingMaterial;
use App\Models\ReadingQuestion;
use Illuminate\Http\Request;

class ReadingQuestionController extends Controller
{
    public function index(ReadingMaterial $material)
    {
        $questions = $material
            ->questions()
            ->latest()
            ->get();

        return view(
            'admin.reading-questions.index',
            compact('material', 'questions')
        );
    }

    public function create(ReadingMaterial $material)
    {
        return view(
            'admin.reading-questions.create',
            compact('material')
        );
    }

    public function store(Request $request, ReadingMaterial $material)
    {
        $validated = $this->validateQuestion($request);

        ReadingQuestion::create([
            'lesson_id' => $material->lesson_id,
            'reading_material_id' => $material->id,
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
            ->route(
                'admin.reading-questions.index',
                $material->id
            )
            ->with(
                'success',
                'Question berhasil ditambahkan.'
            );
    }

    public function lessonIndex(Lesson $lesson)
    {
        $questions = ReadingQuestion::where(
                'lesson_id',
                $lesson->id
            )
            ->whereNull('reading_material_id')
            ->latest()
            ->get();

        return view(
            'admin.reading-questions.index',
            compact('lesson', 'questions')
        );
    }

    public function lessonCreate(Lesson $lesson)
    {
        return view(
            'admin.reading-questions.create',
            compact('lesson')
        );
    }

    public function lessonStore(
        Request $request,
        Lesson $lesson
    ) {
        $validated = $this->validateQuestion($request);

        ReadingQuestion::create([
            'lesson_id' => $lesson->id,
            'reading_material_id' => null,
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
            ->route(
                'admin.reading-lesson-questions.index',
                $lesson->id
            )
            ->with(
                'success',
                'Pre/Post-test reading question berhasil ditambahkan.'
            );
    }

    public function edit(ReadingQuestion $question)
    {
        return view(
            'admin.reading-questions.edit',
            compact('question')
        );
    }

    public function update(
        Request $request,
        ReadingQuestion $question
    ) {
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

        return $this
            ->redirectAfterAction($question)
            ->with(
                'success',
                'Question berhasil diperbarui.'
            );
    }

    public function destroy(ReadingQuestion $question)
    {
        $redirect = $this->redirectAfterAction($question);

        $question->delete();

        return $redirect->with(
            'success',
            'Question berhasil dihapus.'
        );
    }

    private function validateQuestion(
        Request $request
    ): array {
        return $request->validate([
            'question' => [
                'required',
                'string',
            ],
            'option_a' => [
                'required',
                'string',
            ],
            'option_b' => [
                'required',
                'string',
            ],
            'option_c' => [
                'required',
                'string',
            ],
            'option_d' => [
                'required',
                'string',
            ],
            'option_e' => [
                'nullable',
                'string',
            ],
            'correct_answer' => [
                'required',
                'in:A,B,C,D,E',
            ],
            'score' => [
                'required',
                'integer',
                'min:1',
                'max:100',
            ],
        ]);
    }

    private function redirectAfterAction(
        ReadingQuestion $question
    ) {
        if ($question->reading_material_id) {
            return redirect()->route(
                'admin.reading-questions.index',
                $question->reading_material_id
            );
        }

        return redirect()->route(
            'admin.reading-lesson-questions.index',
            $question->lesson_id
        );
    }
}