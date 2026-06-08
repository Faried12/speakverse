<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\ReadingMaterial;
use Illuminate\Http\Request;

class ReadingMaterialController extends Controller
{
    public function index(Lesson $lesson)
    {
        $materials = ReadingMaterial::with('questions')
        ->where('lesson_id', $lesson->id)
        ->latest()
        ->get();

        return view(
            'admin.reading-materials.index',
            compact(
                'lesson',
                'materials'
            )
        );
    }

    public function create(Lesson $lesson)
    {
        return view(
            'admin.reading-materials.create',
            compact('lesson')
        );
    }

    public function store(
        Request $request,
        Lesson $lesson
    )
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'instruction' => 'nullable',
            'passage' => 'required',
        ]);

        ReadingMaterial::create([
            'lesson_id' => $lesson->id,
            'title' => $validated['title'],
            'instruction' => $validated['instruction'] ?? null,
            'passage' => $validated['passage'],
        ]);

        return redirect()
            ->route(
                'admin.reading-materials.index',
                $lesson->id
            )
            ->with(
                'success',
                'Reading Material berhasil ditambahkan.'
            );
    }

    public function edit(
        ReadingMaterial $material
    )
    {
        return view(
            'admin.reading-materials.edit',
            compact('material')
        );
    }

    public function update(
    Request $request,
    ReadingMaterial $material
    )
    {
        $validated = $request->validate([

            'title' => 'required|max:255',

            'instruction' => 'nullable',

            'passage' => 'required'

        ]);

        $material->update([

            'title' => $validated['title'],

            'instruction' =>
                $validated['instruction'] ?? null,

            'passage' =>
                $validated['passage']

        ]);

        return redirect()
            ->route(
                'admin.reading-materials.index',
                $material->lesson_id
            )
            ->with(
                'success',
                'Reading Material berhasil diperbarui.'
            );
    }

    public function destroy(
        ReadingMaterial $material
    )
    {
        $lessonId = $material->lesson_id;

        $material->delete();

        return redirect()
            ->route(
                'admin.reading-materials.index',
                $lessonId
            )
            ->with(
                'success',
                'Reading Material berhasil dihapus.'
            );
    }
}