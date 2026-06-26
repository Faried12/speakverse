<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpeakingMaterial;
use App\Models\Lesson;

class SpeakingMaterialController extends Controller
{

    public function index(Lesson $lesson)
    {
        $materials = SpeakingMaterial::where(
            'lesson_id',
            $lesson->id
        )
        ->latest()
        ->get();

        return view(
            'admin.speaking-materials.index',
            compact(
                'lesson',
                'materials'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Lesson $lesson)
    {
        return view(
            'admin.speaking-materials.create',
            compact('lesson')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        Request $request,
        Lesson $lesson
    )
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'instruction' => 'nullable',
            'passage' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);
        

        $imagePath = null;

        if ($request->hasFile('image')) {

            $imagePath = $request
                ->file('image')
                ->store(
                    'speaking',
                    'public'
                );
        }

        SpeakingMaterial::create([
            'lesson_id' => $lesson->id,
            'title' => $validated['title'],
            'instruction' => $validated['instruction'] ?? null,
            'passage' => $validated['passage'] ?? null,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route(
                'admin.speaking-materials.index',
                $lesson->id
            )
            ->with(
                'success',
                'Speaking material created successfully.'
            );
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        SpeakingMaterial $material
    )
    {
        return view(
            'admin.speaking-materials.edit',
            compact('material')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        SpeakingMaterial $material
    )
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'instruction' => 'nullable',
            'passage' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $material->image;

        if ($request->hasFile('image')) {

            $imagePath = $request
                ->file('image')
                ->store(
                    'speaking',
                    'public'
                );
        }

        $material->update([
            'title' => $validated['title'],
            'instruction' => $validated['instruction'] ?? null,
            'passage' => $validated['passage'] ?? null,
            'image' => $imagePath,
        ]);
                return redirect()
            ->route(
                'admin.speaking-materials.index',
                $material->lesson_id
            )
            ->with(
                'success',
                'Speaking material updated successfully.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        SpeakingMaterial $material
    )
    {
        $lessonId = $material->lesson_id;

        $material->delete();

        return redirect()
            ->route(
                'admin.speaking-materials.index',
                $lessonId
            );
    }
}
