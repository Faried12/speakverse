@extends('layouts.admin')

@section('content')
    @php
        $isLessonMode = isset($lesson);

        $contextTitle = $isLessonMode ? $lesson->unit->title . ' - ' . ucfirst($lesson->skill_type) : $material->title;

        $formAction = $isLessonMode
            ? route('admin.listening-lesson-questions.store', $lesson->id)
            : route('admin.listening-questions.store', $material->id);

        $backRoute = $isLessonMode
            ? route('admin.listening-lesson-questions.index', $lesson->id)
            : route('admin.listening-questions.index', $material->id);
    @endphp

    <div class="max-w-5xl mx-auto space-y-6">

        {{-- HEADER --}}
        <div>
            <h1 class="text-3xl font-black text-slate-900 dark:text-white">
                Add Listening Question
            </h1>

            <p class="mt-1 text-slate-500 dark:text-slate-400">
                {{ $isLessonMode
                    ? 'Create a new listening question for pre-test or post-test.'
                    : 'Create a new question for this listening material.' }}
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

            @if (!$isLessonMode && $material->audio_file)
                <div class="mt-5">
                    <p class="mb-2 text-sm font-semibold text-slate-700 dark:text-slate-300">
                        Listening Audio
                    </p>

                    <audio controls class="w-full">
                        <source src="{{ asset('storage/' . $material->audio_file) }}" type="audio/mpeg">

                        Your browser does not support audio playback.
                    </audio>
                </div>
            @endif
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

            {{-- CATEGORY --}}
            <div>
                <label for="category" class="block mb-2 font-semibold text-slate-900 dark:text-white">

                    Question Category
                    <span class="text-red-500">*</span>
                </label>

                <select id="category" name="category" required
                    class="w-full rounded-xl
                    border-slate-300 dark:border-slate-600
                    dark:bg-slate-900 dark:text-white
                    focus:border-blue-500 focus:ring-blue-500
                    @error('category') border-red-500 @enderror">

                    <option value="">
                        Select question category
                    </option>

                    <option value="main_idea" {{ old('category') === 'main_idea' ? 'selected' : '' }}>
                        Main Idea
                    </option>

                    <option value="detail" {{ old('category') === 'detail' ? 'selected' : '' }}>
                        Specific Detail
                    </option>

                    <option value="interpretation" {{ old('category') === 'interpretation' ? 'selected' : '' }}>
                        Interpretation
                    </option>

                    <option value="vocabulary" {{ old('category') === 'vocabulary' ? 'selected' : '' }}>
                        Vocabulary
                    </option>
                </select>

                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                    Choose the listening skill measured by this question.
                </p>

                @error('category')
                    <p class="mt-2 text-sm font-semibold text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- INSTRUCTION --}}
            <div>
                <label for="instruction" class="block mb-2 font-semibold text-slate-900 dark:text-white">

                    Instruction
                    <span class="text-sm font-normal text-slate-500">
                        (Optional)
                    </span>
                </label>

                <textarea id="instruction" name="instruction" rows="3" placeholder="Enter an instruction for this question..."
                    class="w-full rounded-xl
                    border-slate-300 dark:border-slate-600
                    dark:bg-slate-900 dark:text-white
                    focus:border-blue-500 focus:ring-blue-500
                    @error('instruction') border-red-500 @enderror">{{ old('instruction') }}</textarea>

                @error('instruction')
                    <p class="mt-2 text-sm font-semibold text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- QUESTION --}}
            <div>
                <label for="question" class="block mb-2 font-semibold text-slate-900 dark:text-white">

                    Question
                    <span class="text-red-500">*</span>
                </label>

                <textarea id="question" name="question" rows="5" required placeholder="Enter the listening question..."
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

            {{-- OPTIONS --}}
            @foreach (['a', 'b', 'c', 'd', 'e'] as $option)
                @php
                    $field = 'option_' . $option;
                    $label = strtoupper($option);
                    $isOptional = $option === 'e';
                @endphp

                <div>
                    <label for="{{ $field }}" class="block mb-2 font-semibold text-slate-900 dark:text-white">

                        Option {{ $label }}

                        @if ($isOptional)
                            <span class="text-sm font-normal text-slate-500">
                                (Optional)
                            </span>
                        @else
                            <span class="text-red-500">*</span>
                        @endif
                    </label>

                    <input id="{{ $field }}" type="text" name="{{ $field }}" value="{{ old($field) }}"
                        {{ $isOptional ? '' : 'required' }} placeholder="Enter option {{ $label }}"
                        class="w-full rounded-xl
                        border-slate-300 dark:border-slate-600
                        dark:bg-slate-900 dark:text-white
                        focus:border-blue-500 focus:ring-blue-500
                        @error($field) border-red-500 @enderror">

                    @error($field)
                        <p class="mt-2 text-sm font-semibold text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            @endforeach

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
                    text-white font-semibold transition">

                    Save Question
                </button>
            </div>

        </form>

    </div>
@endsection
