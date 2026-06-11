@extends('layouts.admin')

@section('content')

<div class="max-w-5xl mx-auto space-y-6">

    <div>

        <h1 class="text-3xl font-black text-slate-900 dark:text-white">
            Add Speaking Question
        </h1>

        <p class="mt-1 text-slate-500 dark:text-slate-400">
            Create a new question for this speaking material
        </p>

    </div>

    <!-- MATERIAL INFO -->

    <div
        class="bg-white dark:bg-slate-800
        border border-slate-200 dark:border-slate-700
        rounded-2xl shadow-sm p-6">

        <h2 class="font-bold text-lg text-slate-900 dark:text-white">
            {{ $material->title }}
        </h2>

        <p class="text-slate-500 dark:text-slate-400">
            Material ID : {{ $material->id }}
        </p>

    </div>

    <!-- FORM -->

    <form
        action="{{ route('admin.speaking-questions.store', $material->id) }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white dark:bg-slate-800
               border border-slate-200 dark:border-slate-700
               rounded-2xl shadow-sm p-6 space-y-6">

        @csrf

        <!-- QUESTION -->

        <div>

            <label class="block mb-2 font-semibold text-slate-900 dark:text-white">
                Question
            </label>

            <textarea
                name="question"
                rows="5"
                required
                class="w-full rounded-xl border border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white">{{ old('question') }}</textarea>

            @error('question')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- IMAGE -->

        <div>

            <label class="block mb-2 font-semibold text-slate-900 dark:text-white">
                Upload Image (Optional)
            </label>

            <input
                type="file"
                name="image"
                accept="image/*"
                class="w-full rounded-xl border border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white p-3">

            @error('image')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- BUTTON -->

        <div class="flex gap-3">

            <button
                type="submit"
                class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold">

                Save Question

            </button>

            <a
                href="{{ route('admin.speaking-questions.index', $material->id) }}"
                class="px-6 py-3 rounded-xl bg-slate-200 dark:bg-slate-700 text-slate-900 dark:text-white">

                Back

            </a>

        </div>

    </form>

</div>

@endsection