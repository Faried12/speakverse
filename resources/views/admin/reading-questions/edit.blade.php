@extends('layouts.admin')

@section('content')
    <div class="max-w-5xl mx-auto space-y-6">

        <div>

            <h1 class="text-3xl font-black text-slate-900 dark:text-white">
                Edit Reading Question
            </h1>

            <p class="mt-1 text-slate-500 dark:text-slate-400">
                Update question information
            </p>

        </div>

        <form action="{{ route('admin.reading-questions.update', $question->id) }}" method="POST"
            class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl shadow-sm p-6 space-y-6">

            @csrf
            @method('PUT')

            <div>

                <label class="block mb-2 font-semibold text-slate-900 dark:text-white">
                    Question
                </label>

                <textarea name="question" rows="4"
                    class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white">{{ $question->question }}</textarea>

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    Option A
                </label>

                <input type="text" name="option_a" value="{{ $question->option_a }}"
                    class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white">

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    Option B
                </label>

                <input type="text" name="option_b" value="{{ $question->option_b }}"
                    class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white">

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    Option C
                </label>

                <input type="text" name="option_c" value="{{ $question->option_c }}"
                    class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white">

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    Option D
                </label>

                <input type="text" name="option_d" value="{{ $question->option_d }}"
                    class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white">

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    Option E
                </label>

                <input type="text" name="option_e" value="{{ $question->option_e }}"
                    class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white">

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    Correct Answer
                </label>

                <input type="text" name="correct_answer" value="{{ $question->correct_answer }}"
                    class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white">

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    Score
                </label>

                <input type="number" name="score" value="{{ $question->score }}"
                    class="w-full rounded-xl border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white">

            </div>

            <div class="flex gap-3">

                <button type="submit" class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold">

                    Save Changes

                </button>

                <a href="{{ route('admin.reading-questions.index', $question->reading_material_id) }}"
                    class="px-6 py-3 rounded-xl bg-slate-200 dark:bg-slate-700 text-slate-900 dark:text-white">

                    Cancel

                </a>

            </div>

        </form>

    </div>
@endsection
