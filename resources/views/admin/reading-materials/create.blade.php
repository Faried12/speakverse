@extends('layouts.admin')

@section('content')
    <div class="max-w-5xl mx-auto space-y-6">

        <div>

            <h1 class="text-3xl font-black text-slate-900 dark:text-white">
                Add Reading Material
            </h1>

            <p class="text-slate-500 dark:text-slate-400 mt-1">
                Create a new reading material for this lesson.
            </p>

        </div>

        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow p-6">

            <div class="mb-6">

                <h2 class="font-bold text-xl text-slate-900 dark:text-white">
                    {{ $lesson->title }}
                </h2>

                <p class="text-slate-500 dark:text-slate-400">
                    Lesson ID : {{ $lesson->id }}
                </p>

            </div>

            <form action="{{ route('admin.reading-materials.store', $lesson->id) }}" method="POST" class="space-y-6">

                @csrf

                <div>

                    <label class="block font-semibold mb-2">
                        Title
                    </label>

                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full rounded-xl border border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white">

                    @error('title')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div>

                    <label class="block font-semibold mb-2">
                        Instruction
                    </label>

                    <textarea name="instruction" rows="3"
                        class="w-full rounded-xl border border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white">{{ old('instruction') }}</textarea>

                </div>

                <div>

                    <label class="block font-semibold mb-2">
                        Passage
                    </label>

                    <textarea name="passage" rows="12"
                        class="w-full rounded-xl border border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white">{{ old('passage') }}</textarea>

                    @error('passage')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="flex gap-3">

                    <button type="submit"
                        class="px-6 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700">

                        Save Material

                    </button>

                    <a href="{{ route('admin.reading-materials.index', $lesson->id) }}"
                        class="px-6 py-3 rounded-xl bg-slate-200 dark:bg-slate-700">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection
