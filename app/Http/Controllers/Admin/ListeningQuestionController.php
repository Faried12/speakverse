<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\ListeningMaterial;
use App\Models\ListeningQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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

    public function store(
        Request $request,
        ListeningMaterial $material
    ) {
        $validated = $this->validateQuestion($request);

        ListeningQuestion::create([
            'lesson_id' => $material->lesson_id,
            'listening_material_id' => $material->id,
            'instruction' => $validated['instruction'] ?? null,
            'question' => $validated['question'],
            'audio_file' => null,

            'option_a' => $validated['option_a'],
            'option_b' => $validated['option_b'],
            'option_c' => $validated['option_c'] ?? null,
            'option_d' => $validated['option_d'] ?? null,
            'option_e' => $validated['option_e'] ?? null,

            'correct_answer' => $validated['correct_answer'],
            'score' => $validated['score'],
        ]);

        return redirect()
            ->route(
                'admin.listening-questions.index',
                $material->id
            )
            ->with(
                'success',
                'Question berhasil ditambahkan.'
            );
    }

    public function lessonIndex(Lesson $lesson)
    {
        $questions = ListeningQuestion::query()
            ->where('lesson_id', $lesson->id)
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

    public function lessonStore(
        Request $request,
        Lesson $lesson
    ) {
        $validated = $this->validateQuestion($request);

        $audioPath = null;

        if ($request->hasFile('audio_file')) {
            $audioPath = $request
                ->file('audio_file')
                ->store(
                    'listening-question-audios',
                    'public'
                );
        }

        ListeningQuestion::create([
            'lesson_id' => $lesson->id,
            'listening_material_id' => null,
            'instruction' => $validated['instruction'] ?? null,
            'question' => $validated['question'],
            'audio_file' => $audioPath,

            'option_a' => $validated['option_a'],
            'option_b' => $validated['option_b'],
            'option_c' => $validated['option_c'] ?? null,
            'option_d' => $validated['option_d'] ?? null,
            'option_e' => $validated['option_e'] ?? null,

            'correct_answer' => $validated['correct_answer'],
            'score' => $validated['score'],
        ]);

        return redirect()
            ->route(
                'admin.listening-lesson-questions.index',
                $lesson->id
            )
            ->with(
                'success',
                'Pre/Post-test listening question berhasil ditambahkan.'
            );
    }

    public function edit(ListeningQuestion $question)
    {
        return view(
            'admin.listening-questions.edit',
            compact('question')
        );
    }

    public function update(
        Request $request,
        ListeningQuestion $question
    ) {
        $validated = $this->validateQuestion($request);

        $isLessonMode = is_null(
            $question->listening_material_id
        );

        $audioPath = $question->audio_file;

        if (
            $isLessonMode &&
            $request->boolean('remove_audio') &&
            $audioPath
        ) {
            Storage::disk('public')->delete($audioPath);
            $audioPath = null;
        }

        if (
            $isLessonMode &&
            $request->hasFile('audio_file')
        ) {
            if ($audioPath) {
                Storage::disk('public')->delete($audioPath);
            }

            $audioPath = $request
                ->file('audio_file')
                ->store(
                    'listening-question-audios',
                    'public'
                );
        }

        $question->update([
            'instruction' => $validated['instruction'] ?? null,
            'question' => $validated['question'],

            'audio_file' => $isLessonMode
                ? $audioPath
                : $question->audio_file,

            'option_a' => $validated['option_a'],
            'option_b' => $validated['option_b'],
            'option_c' => $validated['option_c'] ?? null,
            'option_d' => $validated['option_d'] ?? null,
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

    public function destroy(ListeningQuestion $question)
    {
        $redirect = $this->redirectAfterAction($question);

        if ($question->audio_file) {
            Storage::disk('public')->delete(
                $question->audio_file
            );
        }

        $question->delete();

        return $redirect->with(
            'success',
            'Question berhasil dihapus.'
        );
    }

    private function validateQuestion(Request $request): array
    {
        $validated = $request->validate([
            'instruction' => [
                'nullable',
                'string',
            ],

            'question' => [
                'required',
                'string',
            ],

            'audio_file' => [
                'nullable',
                'file',
                'mimes:mp3,wav,m4a,ogg',
                'max:10240',
            ],

            'remove_audio' => [
                'nullable',
                'boolean',
            ],

            'option_a' => [
                'required',
                'string',
                'max:255',
            ],

            'option_b' => [
                'required',
                'string',
                'max:255',
            ],

            'option_c' => [
                'nullable',
                'string',
                'max:255',
            ],

            'option_d' => [
                'nullable',
                'string',
                'max:255',
            ],

            'option_e' => [
                'nullable',
                'string',
                'max:255',
            ],

            'correct_answer' => [
                'required',
                Rule::in(['A', 'B', 'C', 'D', 'E']),
            ],

            'score' => [
                'required',
                'integer',
                'min:1',
                'max:100',
            ],
        ]);

        $answerField = 'option_' . strtolower(
            $validated['correct_answer']
        );

        if (empty($validated[$answerField] ?? null)) {
            return back()
                ->withErrors([
                    'correct_answer' =>
                        'Correct answer harus memiliki option yang terisi.',
                ])
                ->withInput()
                ->throwResponse();
        }

        return $validated;
    }

    private function redirectAfterAction(
        ListeningQuestion $question
    ) {
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