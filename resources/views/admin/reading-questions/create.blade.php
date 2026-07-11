@extends('layouts.admin')

@section('content')
    @php
        $isLessonMode = isset($lesson);

        $contextTitle = $isLessonMode ? $lesson->unit->title . ' - ' . ucfirst($lesson->skill_type) : $material->title;

        $formAction = $isLessonMode
            ? route('admin.reading-lesson-questions.store', $lesson->id)
            : route('admin.reading-questions.store', $material->id);

        $backRoute = $isLessonMode
            ? route('admin.reading-lesson-questions.index', $lesson->id)
            : route('admin.reading-questions.index', $material->id);
    @endphp

    <div class="max-w-5xl mx-auto space-y-6">

        {{-- HEADER --}}
        <div>
            <h1 class="text-3xl font-black text-slate-900 dark:text-white">
                Add Reading Question
            </h1>

            <p class="mt-1 text-slate-500 dark:text-slate-400">
                {{ $isLessonMode
                    ? 'Create a new reading question for pre-test or post-test.'
                    : 'Create a new question for this reading material.' }}
            </p>
        </div>

        {{-- CONTEXT INFORMATION --}}
        <div
            class="bg-white dark:bg-slate-800
            border border-slate-200 dark:border-slate-700
            rounded-2xl shadow-sm p-6">

            <h2 class="font-bold text-lg text-slate-900 dark:text-white">
                {{ $contextTitle }}
            </h2>

            <p class="mt-1 text-slate-500 dark:text-slate-400">
                {{ $isLessonMode ? 'Lesson ID' : 'Material ID' }}:
                {{ $isLessonMode ? $lesson->id : $material->id }}
            </p>
        </div>

        {{-- VALIDATION ERROR SUMMARY --}}
        @if ($errors->any())
            <div
                class="rounded-2xl border border-red-300
                bg-red-50 dark:bg-red-500/10
                p-5 text-red-700 dark:text-red-300">

                <p class="font-bold mb-2">
                    Please correct the following errors:
                </p>

                <ul class="list-disc list-inside space-y-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM --}}
        <form action="{{ $formAction }}" method="POST"
            class="bg-white dark:bg-slate-800
            border border-slate-200 dark:border-slate-700
            rounded-2xl shadow-sm p-6 space-y-6">

            @csrf
            {{-- QUESTION --}}
            <div>
                <label for="question" class="block mb-2 font-semibold text-slate-900 dark:text-white">

                    Question
                    <span class="text-red-500">*</span>
                </label>

                <textarea id="question" name="question" rows="5" required placeholder="Enter the reading question..."
                    class="w-full rounded-xl
                    border-slate-300 dark:border-slate-600
                    dark:bg-slate-900 dark:text-white
                    focus:border-blue-500 focus:ring-blue-500
                    @error('question') border-red-500 @enderror">{{ old('question') }}</textarea>

                @error('question')
                    <p class="mt-2 text-sm font-semibold text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- OPTION A --}}
            <div>
                <label for="option_a" class="block mb-2 font-semibold text-slate-900 dark:text-white">

                    Option A
                    <span class="text-red-500">*</span>
                </label>

                <input id="option_a" type="text" name="option_a" value="{{ old('option_a') }}" required
                    placeholder="Enter option A"
                    class="w-full rounded-xl
                    border-slate-300 dark:border-slate-600
                    dark:bg-slate-900 dark:text-white
                    focus:border-blue-500 focus:ring-blue-500
                    @error('option_a') border-red-500 @enderror">

                @error('option_a')
                    <p class="mt-2 text-sm font-semibold text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- OPTION B --}}
            <div>
                <label for="option_b" class="block mb-2 font-semibold text-slate-900 dark:text-white">

                    Option B
                    <span class="text-red-500">*</span>
                </label>

                <input id="option_b" type="text" name="option_b" value="{{ old('option_b') }}" required
                    placeholder="Enter option B"
                    class="w-full rounded-xl
                    border-slate-300 dark:border-slate-600
                    dark:bg-slate-900 dark:text-white
                    focus:border-blue-500 focus:ring-blue-500
                    @error('option_b') border-red-500 @enderror">

                @error('option_b')
                    <p class="mt-2 text-sm font-semibold text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- OPTION C --}}
            <div>
                <label for="option_c" class="block mb-2 font-semibold text-slate-900 dark:text-white">

                    Option C
                    <span class="text-red-500">*</span>
                </label>

                <input id="option_c" type="text" name="option_c" value="{{ old('option_c') }}" required
                    placeholder="Enter option C"
                    class="w-full rounded-xl
                    border-slate-300 dark:border-slate-600
                    dark:bg-slate-900 dark:text-white
                    focus:border-blue-500 focus:ring-blue-500
                    @error('option_c') border-red-500 @enderror">

                @error('option_c')
                    <p class="mt-2 text-sm font-semibold text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- OPTION D --}}
            <div>
                <label for="option_d" class="block mb-2 font-semibold text-slate-900 dark:text-white">

                    Option D
                    <span class="text-red-500">*</span>
                </label>

                <input id="option_d" type="text" name="option_d" value="{{ old('option_d') }}" required
                    placeholder="Enter option D"
                    class="w-full rounded-xl
                    border-slate-300 dark:border-slate-600
                    dark:bg-slate-900 dark:text-white
                    focus:border-blue-500 focus:ring-blue-500
                    @error('option_d') border-red-500 @enderror">

                @error('option_d')
                    <p class="mt-2 text-sm font-semibold text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- OPTION E --}}
            <div>
                <label for="option_e" class="block mb-2 font-semibold text-slate-900 dark:text-white">

                    Option E
                    <span class="text-sm font-normal text-slate-500">
                        (Optional)
                    </span>
                </label>

                <input id="option_e" type="text" name="option_e" value="{{ old('option_e') }}"
                    placeholder="Enter option E if needed"
                    class="w-full rounded-xl
                    border-slate-300 dark:border-slate-600
                    dark:bg-slate-900 dark:text-white
                    focus:border-blue-500 focus:ring-blue-500
                    @error('option_e') border-red-500 @enderror">

                @error('option_e')
                    <p class="mt-2 text-sm font-semibold text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- ANSWER AND SCORE --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label for="correct_answer" class="block mb-2 font-semibold text-slate-900 dark:text-white">

                        Correct Answer
                        <span class="text-red-500">*</span>
                    </label>

                    <select id="correct_answer" name="correct_answer" required
                        class="w-full rounded-xl
                        border-slate-300 dark:border-slate-600
                        dark:bg-slate-900 dark:text-white
                        focus:border-blue-500 focus:ring-blue-500
                        @error('correct_answer') border-red-500 @enderror">

                        <option value="">
                            Select correct answer
                        </option>

                        @foreach (['A', 'B', 'C', 'D', 'E'] as $option)
                            <option value="{{ $option }}" {{ old('correct_answer') === $option ? 'selected' : '' }}>

                                {{ $option }}
                            </option>
                        @endforeach
                    </select>

                    @error('correct_answer')
                        <p class="mt-2 text-sm font-semibold text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="score" class="block mb-2 font-semibold text-slate-900 dark:text-white">

                        Score
                        <span class="text-red-500">*</span>
                    </label>

                    <input id="score" type="number" name="score" value="{{ old('score', 10) }}" min="1"
                        max="100" required
                        class="w-full rounded-xl
                        border-slate-300 dark:border-slate-600
                        dark:bg-slate-900 dark:text-white
                        focus:border-blue-500 focus:ring-blue-500
                        @error('score') border-red-500 @enderror">

                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                        Enter a score between 1 and 100.
                    </p>

                    @error('score')
                        <p class="mt-2 text-sm font-semibold text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

            </div>

            {{-- ACTION --}}
            <div
                class="flex flex-col-reverse sm:flex-row gap-3
                pt-6 border-t border-slate-200 dark:border-slate-700">

                <a href="{{ $backRoute }}"
                    class="px-6 py-3 rounded-xl
                    bg-slate-200 hover:bg-slate-300
                    dark:bg-slate-700 dark:hover:bg-slate-600
                    text-slate-900 dark:text-white
                    font-semibold text-center transition">

                    Back
                </a>

                <button type="submit"
                    class="px-6 py-3 rounded-xl
                    bg-blue-600 hover:bg-blue-700
                    text-white font-semibold
                    transition">

                    Save Question
                </button>
            </div>

        </form>

    </div>
@endsection
