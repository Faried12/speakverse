@extends('layouts.admin')

@section('content')

    <div class="max-w-5xl mx-auto space-y-6">

        <div>

            <h1 class="text-3xl font-black text-slate-900 dark:text-white">
                Edit Speaking Question
            </h1>

            <p class="mt-1 text-slate-500 dark:text-slate-400">
                Update speaking question information
            </p>

        </div>

        <form
            action="{{ route('admin.speaking-questions.update', $question->id) }}"
            method="POST"
            enctype="multipart/form-data"
            class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl shadow-sm p-6 space-y-6">

            @csrf
            @method('PUT')

            <!-- QUESTION -->

            <div>

                <label class="block mb-2 font-semibold text-slate-900 dark:text-white">
                    Question
                </label>

                <textarea
                    name="question"
                    rows="5"
                    class="w-full rounded-xl border border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white">{{ old('question', $question->question) }}</textarea>

                @error('question')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <!-- CURRENT IMAGE -->

            <div>

                <label class="block mb-2 font-semibold text-slate-900 dark:text-white">
                    Current Image
                </label>

                @if($question->image)

                    <img
                        src="{{ asset('storage/' . $question->image) }}"
                        class="w-48 rounded-xl border border-slate-200 dark:border-slate-700">

                @else

                    <div class="text-slate-400">
                        No image uploaded
                    </div>

                @endif

            </div>

            <!-- REPLACE IMAGE -->

            <div>

                <label class="block mb-2 font-semibold text-slate-900 dark:text-white">
                    Replace Image
                </label>

                <input
                    type="file"
                    name="image"
                    accept="image/*"
                    class="w-full rounded-xl border border-slate-300 dark:border-slate-600 dark:bg-slate-900 dark:text-white p-3">

                <p class="mt-2 text-sm text-slate-500">
                    Leave empty if you don't want to change the image.
                </p>

                @error('image')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <div class="flex gap-3">

                <button
                    type="submit"
                    class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold">

                    Save Changes

                </button>

                <a
                    href="{{ route('admin.speaking-questions.index', $question->speaking_material_id) }}"
                    class="px-6 py-3 rounded-xl bg-slate-200 dark:bg-slate-700 text-slate-900 dark:text-white">

                    Cancel

                </a>

            </div>

        </form>

    </div>

@endsection