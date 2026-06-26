@extends('layouts.admin')

@section('content')

<div class="max-w-5xl mx-auto space-y-6">

    <div>

        <h1 class="text-3xl font-black text-slate-900 dark:text-white">
            Add Listening Question
        </h1>

        <p class="mt-1 text-slate-500 dark:text-slate-400">
            Create a new question for this listening material
        </p>

    </div>

    <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl shadow-sm p-6">

        <h2 class="font-bold text-lg text-slate-900 dark:text-white">
            {{ $material->title }}
        </h2>

        <p class="text-slate-500 dark:text-slate-400">
            Material ID : {{ $material->id }}
        </p>

        @if($material->audio_file)

            <div class="mt-4">

                <audio controls class="w-full">

                    <source
                        src="{{ asset('storage/'.$material->audio_file) }}"
                        type="audio/mpeg">

                </audio>

            </div>

        @endif

    </div>

    <form
        action="{{ route('admin.listening-questions.store', $material->id) }}"
        method="POST"
        class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl shadow-sm p-6 space-y-6">

        @csrf

        <div>

            <label class="block mb-2 font-semibold text-slate-900 dark:text-white">
                Question
            </label>

            <textarea
                name="question"
                rows="4"
                class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white"
                required>{{ old('question') }}</textarea>

        </div>

        <div>

            <label class="block mb-2 font-semibold text-slate-900 dark:text-white">
                Option A
            </label>

            <input
                type="text"
                name="option_a"
                value="{{ old('option_a') }}"
                class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white"
                required>

        </div>

        <div>

            <label class="block mb-2 font-semibold text-slate-900 dark:text-white">
                Option B
            </label>

            <input
                type="text"
                name="option_b"
                value="{{ old('option_b') }}"
                class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white"
                required>

        </div>

        <div>

            <label class="block mb-2 font-semibold text-slate-900 dark:text-white">
                Option C
            </label>

            <input
                type="text"
                name="option_c"
                value="{{ old('option_c') }}"
                class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white"
                required>

        </div>

        <div>

            <label class="block mb-2 font-semibold text-slate-900 dark:text-white">
                Option D
            </label>

            <input
                type="text"
                name="option_d"
                value="{{ old('option_d') }}"
                class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white"
                required>

        </div>

        <div>

            <label class="block mb-2 font-semibold text-slate-900 dark:text-white">
                Option E (Optional)
            </label>

            <input
                type="text"
                name="option_e"
                value="{{ old('option_e') }}"
                class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white">

        </div>

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <label class="block mb-2 font-semibold text-slate-900 dark:text-white">
                    Correct Answer
                </label>

                <select
                    name="correct_answer"
                    class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white">

                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>

                </select>

            </div>

            <div>

                <label class="block mb-2 font-semibold text-slate-900 dark:text-white">
                    Score
                </label>

                <input
                    type="number"
                    name="score"
                    value="10"
                    min="1"
                    class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white">

            </div>

        </div>

        <div class="flex gap-3">

            <button
                type="submit"
                class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold">

                Save Question

            </button>

            <a
                href="{{ route('admin.listening-questions.index', $material->id) }}"
                class="px-6 py-3 rounded-xl bg-slate-200 dark:bg-slate-700 text-slate-900 dark:text-white">

                Back

            </a>

        </div>

    </form>

</div>


@endsection
