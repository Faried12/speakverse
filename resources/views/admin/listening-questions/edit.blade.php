@extends('layouts.admin')

@section('content')
    @php
        $isLessonMode = is_null($question->listening_material_id);

        $backRoute = $isLessonMode
            ? route('admin.listening-lesson-questions.index', $question->lesson_id)
            : route('admin.listening-questions.index', $question->listening_material_id);
    @endphp

    <div class="max-w-5xl mx-auto space-y-6">

        {{-- HEADER --}}
        <div>
            <h1 class="text-3xl font-black text-slate-900 dark:text-white">
                Edit Listening Question
            </h1>

            <p class="mt-1 text-slate-500 dark:text-slate-400">
                {{ $isLessonMode
                    ? 'Update a listening question for pre-test or post-test.'
                    : 'Update the listening question information.' }}
            </p>
        </div>

        {{-- MODE INFORMATION --}}
        @if ($isLessonMode)
            <div
                class="rounded-2xl
                border border-cyan-200 dark:border-cyan-500/20
                bg-cyan-50 dark:bg-cyan-500/10
                p-5">

                <p class="font-bold text-cyan-700 dark:text-cyan-300">
                    Pretest/Posttest Listening Question
                </p>

                <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">
                    Anda dapat mengunggah audio untuk setiap soal.
                    Option A dan B wajib diisi, sedangkan Option C, D,
                    dan E bersifat opsional.
                </p>

                <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">
                    Untuk soal True/False, isi Option A dengan
                    <strong>True</strong> dan Option B dengan
                    <strong>False</strong>.
                </p>
            </div>
        @endif

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
        <form action="{{ route('admin.listening-questions.update', $question->id) }}" method="POST"
            enctype="multipart/form-data"
            class="bg-white dark:bg-slate-800
            border border-slate-200 dark:border-slate-700
            rounded-2xl shadow-sm p-6 space-y-6">

            @csrf
            @method('PUT')

            {{-- AUDIO KHUSUS PRETEST/POSTTEST --}}
            @if ($isLessonMode)
                <div>
                    <label for="audio_file"
                        class="block mb-2 font-semibold
                        text-slate-900 dark:text-white">

                        Audio File

                        <span class="text-sm font-normal text-slate-500">
                            (Optional)
                        </span>
                    </label>

                    @if ($question->audio_file)
                        <div
                            class="mb-4 rounded-xl
                            border border-slate-200 dark:border-slate-700
                            bg-slate-50 dark:bg-slate-900
                            p-4">

                            <p class="mb-2 text-sm font-semibold text-slate-700 dark:text-slate-300">
                                Current Audio
                            </p>

                            <audio controls preload="metadata" class="w-full">
                                <source src="{{ asset('storage/' . $question->audio_file) }}">

                                Your browser does not support audio playback.
                            </audio>

                            <label
                                class="mt-4 flex items-center gap-3
                                text-sm text-red-600 dark:text-red-400
                                font-semibold cursor-pointer">

                                <input id="remove_audio" type="checkbox" name="remove_audio" value="1"
                                    {{ old('remove_audio') ? 'checked' : '' }}
                                    class="rounded border-slate-300
                                    text-red-600 focus:ring-red-500">

                                Remove current audio
                            </label>
                        </div>
                    @endif

                    <input id="audio_file" type="file" name="audio_file" accept=".mp3,.wav,.m4a,.ogg,audio/*"
                        class="block w-full rounded-xl
                        border border-slate-300 dark:border-slate-600
                        bg-white dark:bg-slate-900
                        text-slate-700 dark:text-slate-300
                        file:mr-4 file:border-0
                        file:px-4 file:py-3
                        file:bg-cyan-500/10
                        file:text-cyan-600
                        dark:file:text-cyan-300
                        file:font-semibold
                        @error('audio_file') border-red-500 @enderror">

                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                        Upload file baru untuk mengganti audio saat ini.
                        Format MP3, WAV, M4A, atau OGG. Maksimal 10 MB.
                    </p>

                    @error('audio_file')
                        <p class="mt-2 text-sm font-semibold text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                    <div id="audioPreviewContainer"
                        class="hidden mt-4 rounded-xl
                        bg-slate-50 dark:bg-slate-900
                        border border-slate-200 dark:border-slate-700
                        p-4">

                        <p class="mb-2 text-sm font-semibold text-slate-700 dark:text-slate-300">
                            New Audio Preview
                        </p>

                        <audio id="audioPreview" controls preload="metadata" class="w-full">
                        </audio>
                    </div>
                </div>
            @endif

            {{-- INSTRUCTION --}}
            <div>
                <label for="instruction"
                    class="block mb-2 font-semibold
                    text-slate-900 dark:text-white">

                    Instruction

                    <span class="text-sm font-normal text-slate-500">
                        (Optional)
                    </span>
                </label>

                <textarea id="instruction" name="instruction" rows="3"
                    placeholder="Example: Listen to the audio and choose the correct answer."
                    class="w-full rounded-xl
                    border-slate-300 dark:border-slate-600
                    dark:bg-slate-900 dark:text-white
                    focus:border-blue-500 focus:ring-blue-500
                    @error('instruction') border-red-500 @enderror">{{ old('instruction', $question->instruction) }}</textarea>

                @error('instruction')
                    <p class="mt-2 text-sm font-semibold text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- QUESTION --}}
            <div>
                <label for="question" class="block mb-2 font-semibold
                    text-slate-900 dark:text-white">

                    Question
                    <span class="text-red-500">*</span>
                </label>

                <textarea id="question" name="question" rows="5" required placeholder="Enter the listening question..."
                    class="w-full rounded-xl
                    border-slate-300 dark:border-slate-600
                    dark:bg-slate-900 dark:text-white
                    focus:border-blue-500 focus:ring-blue-500
                    @error('question') border-red-500 @enderror">{{ old('question', $question->question) }}</textarea>

                @error('question')
                    <p class="mt-2 text-sm font-semibold text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- ANSWER OPTIONS --}}
            <div>
                <div class="mb-4">
                    <h3 class="font-semibold text-slate-900 dark:text-white">
                        Answer Options
                    </h3>

                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                        Option A dan B wajib diisi. Option C, D, dan E opsional.
                    </p>
                </div>

                <div class="space-y-5">
                    @foreach (['a', 'b', 'c', 'd', 'e'] as $option)
                        @php
                            $field = 'option_' . $option;
                            $label = strtoupper($option);
                            $isRequired = in_array($option, ['a', 'b']);
                        @endphp

                        <div>
                            <label for="{{ $field }}"
                                class="block mb-2 font-semibold
                                text-slate-900 dark:text-white">

                                Option {{ $label }}

                                @if ($isRequired)
                                    <span class="text-red-500">*</span>
                                @else
                                    <span class="text-sm font-normal text-slate-500">
                                        (Optional)
                                    </span>
                                @endif
                            </label>

                            <input id="{{ $field }}" type="text" name="{{ $field }}"
                                value="{{ old($field, $question->$field) }}" {{ $isRequired ? 'required' : '' }}
                                placeholder="{{ $option === 'a'
                                    ? 'Example: True or first answer'
                                    : ($option === 'b'
                                        ? 'Example: False or second answer'
                                        : 'Enter option ' . $label . ' if needed') }}"
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
                </div>
            </div>

            {{-- ANSWER AND SCORE --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label for="correct_answer"
                        class="block mb-2 font-semibold
                        text-slate-900 dark:text-white">

                        Correct Answer
                        <span class="text-red-500">*</span>
                    </label>

                    <select id="correct_answer" name="correct_answer" required
                        class="w-full rounded-xl
                        border-slate-300 dark:border-slate-600
                        dark:bg-slate-900 dark:text-white
                        focus:border-blue-500 focus:ring-blue-500
                        @error('correct_answer') border-red-500 @enderror">

                        @foreach (['A', 'B', 'C', 'D', 'E'] as $option)
                            <option value="{{ $option }}"
                                {{ old('correct_answer', $question->correct_answer) === $option ? 'selected' : '' }}>

                                Option {{ $option }}
                            </option>
                        @endforeach
                    </select>

                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                        Pilih hanya option yang sudah diisi.
                    </p>

                    @error('correct_answer')
                        <p class="mt-2 text-sm font-semibold text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="score"
                        class="block mb-2 font-semibold
                        text-slate-900 dark:text-white">

                        Score
                        <span class="text-red-500">*</span>
                    </label>

                    <input id="score" type="number" name="score" value="{{ old('score', $question->score) }}"
                        min="1" max="100" required
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

                    Cancel
                </a>

                <button type="submit"
                    class="px-6 py-3 rounded-xl
                    bg-blue-600 hover:bg-blue-700
                    text-white font-semibold transition">

                    Save Changes
                </button>
            </div>

        </form>

    </div>

    @if ($isLessonMode)
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const input = document.getElementById('audio_file');
                const preview = document.getElementById('audioPreview');
                const container = document.getElementById('audioPreviewContainer');
                const removeAudio = document.getElementById('remove_audio');

                if (!input || !preview || !container) {
                    return;
                }

                let previewUrl = null;

                input.addEventListener('change', function() {
                    const file = this.files[0];

                    if (previewUrl) {
                        URL.revokeObjectURL(previewUrl);
                        previewUrl = null;
                    }

                    if (!file) {
                        preview.pause();
                        preview.removeAttribute('src');
                        preview.load();
                        container.classList.add('hidden');
                        return;
                    }

                    previewUrl = URL.createObjectURL(file);

                    preview.src = previewUrl;
                    preview.load();
                    container.classList.remove('hidden');

                    if (removeAudio) {
                        removeAudio.checked = false;
                    }
                });

                if (removeAudio) {
                    removeAudio.addEventListener('change', function() {
                        if (this.checked) {
                            input.value = '';

                            if (previewUrl) {
                                URL.revokeObjectURL(previewUrl);
                                previewUrl = null;
                            }

                            preview.pause();
                            preview.removeAttribute('src');
                            preview.load();
                            container.classList.add('hidden');
                        }
                    });
                }

                window.addEventListener('beforeunload', function() {
                    if (previewUrl) {
                        URL.revokeObjectURL(previewUrl);
                    }
                });
            });
        </script>
    @endif
@endsection
