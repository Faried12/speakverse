@extends('layouts.admin')

@section('content')
    @php
        $isLessonMode = isset($lesson);

        $contextTitle = $isLessonMode ? $lesson->unit->title . ' - ' . ucfirst($lesson->skill_type) : $material->title;

        $createRoute = $isLessonMode
            ? route('admin.listening-lesson-questions.create', $lesson->id)
            : route('admin.listening-questions.create', $material->id);
    @endphp

    <div class="space-y-6">

        {{-- HEADER --}}
        <div class="flex flex-col sm:flex-row
            sm:items-center sm:justify-between
            gap-4">

            <div>
                <h1 class="text-3xl font-black text-slate-900 dark:text-white">
                    Listening Questions
                </h1>

                <p class="mt-1 text-slate-500 dark:text-slate-400">
                    {{ $isLessonMode
                        ? 'Manage listening questions for pre-test or post-test.'
                        : 'Manage questions for this listening material.' }}
                </p>
            </div>

            <a href="{{ $createRoute }}"
                class="px-5 py-3 rounded-xl
                bg-blue-600 hover:bg-blue-700
                text-white font-semibold
                text-center transition">

                + Add Question
            </a>
        </div>

        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
            <div
                class="rounded-2xl
                border border-green-200 dark:border-green-500/20
                bg-green-50 dark:bg-green-500/10
                p-4 text-green-700 dark:text-green-300
                font-semibold">

                {{ session('success') }}
            </div>
        @endif

        {{-- INFO --}}
        <div
            class="bg-white dark:bg-slate-800
            border border-slate-200 dark:border-slate-700
            rounded-2xl shadow-sm p-6">

            <h2 class="text-xl font-bold text-slate-900 dark:text-white">
                {{ $contextTitle }}
            </h2>

            <p class="mt-2 text-slate-500 dark:text-slate-400">
                {{ $isLessonMode ? 'Lesson ID' : 'Material ID' }}:
                {{ $isLessonMode ? $lesson->id : $material->id }}
            </p>

            <p class="mt-1 text-slate-500 dark:text-slate-400">
                Total Questions:
                {{ $questions->count() }}
            </p>

            @if ($isLessonMode)
                <div
                    class="mt-5 rounded-xl
                    border border-cyan-200 dark:border-cyan-500/20
                    bg-cyan-50 dark:bg-cyan-500/10
                    p-4">

                    <p class="font-semibold text-cyan-700 dark:text-cyan-300">
                        Pretest/Posttest Listening Assessment
                    </p>

                    <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">
                        Setiap soal dapat menggunakan 2 sampai 5 pilihan jawaban.
                        Option A dan B wajib, sedangkan C, D, dan E bersifat opsional.
                        Audio dapat diunggah untuk setiap soal.
                    </p>
                </div>
            @elseif ($material->audio_file)
                <div class="mt-4">
                    <p class="mb-2 text-sm font-semibold text-slate-700 dark:text-slate-300">
                        Material Audio
                    </p>

                    <audio controls class="w-full">
                        <source src="{{ asset('storage/' . $material->audio_file) }}">

                        Your browser does not support audio playback.
                    </audio>
                </div>
            @endif
        </div>

        {{-- QUESTION LIST --}}
        <div
            class="bg-white dark:bg-slate-800
            border border-slate-200 dark:border-slate-700
            rounded-2xl shadow-sm overflow-hidden">

            <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white">
                    Question List
                </h3>
            </div>

            @if ($questions->count())
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[1000px]">

                        <thead>
                            <tr class="bg-slate-100 dark:bg-slate-900">

                                <th class="text-left px-6 py-4">
                                    Audio
                                </th>

                                <th class="text-left px-6 py-4">
                                    Instruction
                                </th>

                                <th class="text-left px-6 py-4">
                                    Question
                                </th>

                                <th class="text-left px-6 py-4">
                                    Correct
                                </th>

                                <th class="text-left px-6 py-4">
                                    Score
                                </th>

                                <th class="text-left px-6 py-4">
                                    Action
                                </th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($questions as $question)
                                @php
                                    $correctAnswerField = 'option_' . strtolower($question->correct_answer);

                                    $correctAnswerValue = $question->$correctAnswerField ?? null;

                                    $correctAnswerText =
                                        $question->correct_answer . '. ' . ($correctAnswerValue ?: '-');
                                @endphp

                                <tr
                                    class="border-t
                                    border-slate-200 dark:border-slate-700
                                    align-top">

                                    {{-- AUDIO --}}
                                    <td class="px-6 py-4 min-w-[240px]">
                                        @if ($question->audio_file)
                                            <audio controls preload="none" class="w-56">

                                                <source src="{{ asset('storage/' . $question->audio_file) }}">

                                                Your browser does not support audio playback.
                                            </audio>
                                        @elseif (!$isLessonMode && $material->audio_file)
                                            <span
                                                class="inline-flex px-3 py-1
                                                rounded-full
                                                bg-blue-100 text-blue-700
                                                dark:bg-blue-500/10 dark:text-blue-300
                                                text-xs font-semibold">

                                                Material Audio
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex px-3 py-1
                                                rounded-full
                                                bg-slate-100 text-slate-500
                                                dark:bg-slate-700 dark:text-slate-300
                                                text-xs font-semibold">

                                                No Audio
                                            </span>
                                        @endif
                                    </td>

                                    {{-- INSTRUCTION --}}
                                    <td class="px-6 py-4 max-w-xs">
                                        @if ($question->instruction)
                                            <p class="text-slate-700 dark:text-slate-300">
                                                {{ \Illuminate\Support\Str::limit($question->instruction, 60) }}
                                            </p>
                                        @else
                                            <span class="text-slate-400">
                                                —
                                            </span>
                                        @endif
                                    </td>

                                    {{-- QUESTION --}}
                                    <td class="px-6 py-4 max-w-md">
                                        <p class="font-medium text-slate-900 dark:text-white">
                                            {{ \Illuminate\Support\Str::limit($question->question, 100) }}
                                        </p>

                                        {{-- OPSI DINAMIS SESUAI DATABASE --}}
                                        <div class="mt-3 flex flex-wrap gap-2">
                                            @foreach (['A', 'B', 'C', 'D', 'E'] as $option)
                                                @php
                                                    $field = 'option_' . strtolower($option);
                                                @endphp

                                                @if (!empty($question->$field))
                                                    <span
                                                        class="px-2 py-1 rounded-lg
                                                        bg-slate-100 text-slate-700
                                                        dark:bg-slate-700 dark:text-slate-300
                                                        text-xs font-semibold">

                                                        {{ $option }}.
                                                        {{ $question->$field }}
                                                    </span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>

                                    {{-- CORRECT ANSWER --}}
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex px-3 py-1
                                            rounded-full
                                            bg-green-100 text-green-700
                                            dark:bg-green-500/10 dark:text-green-300
                                            text-sm font-bold">

                                            {{ $correctAnswerText }}
                                        </span>
                                    </td>

                                    {{-- SCORE --}}
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex px-3 py-1
                                            rounded-full
                                            bg-cyan-100 text-cyan-700
                                            dark:bg-cyan-500/10 dark:text-cyan-300
                                            text-sm font-bold">

                                            {{ $question->score }}
                                        </span>
                                    </td>

                                    {{-- ACTION --}}
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">

                                            <a href="{{ route('admin.listening-questions.edit', $question->id) }}"
                                                class="px-3 py-2 rounded-lg
                                                bg-blue-600 hover:bg-blue-700
                                                text-white transition">

                                                Edit
                                            </a>

                                            <button type="button"
                                                data-url="{{ route('admin.listening-questions.destroy', $question->id) }}"
                                                onclick="openDeleteModal(this.dataset.url)"
                                                class="px-3 py-2 rounded-lg
                                                bg-red-600 hover:bg-red-700
                                                text-white transition">

                                                Delete
                                            </button>

                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            @else
                <div class="p-12 text-center">

                    <div class="text-6xl mb-4">
                        🎧
                    </div>

                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                        No Questions Yet
                    </h3>

                    <p class="mt-2 text-slate-500 dark:text-slate-400">
                        Create your first listening question.
                    </p>

                    <a href="{{ $createRoute }}"
                        class="inline-flex mt-6 px-5 py-3
                        rounded-xl
                        bg-blue-600 hover:bg-blue-700
                        text-white font-semibold">

                        Create First Question
                    </a>

                </div>
            @endif
        </div>

    </div>

    {{-- DELETE MODAL --}}
    <div id="deleteModal"
        class="fixed inset-0 z-50 hidden
        items-center justify-center
        bg-black/60 backdrop-blur-sm">

        <div
            class="w-full max-w-md mx-4
            bg-white dark:bg-slate-800
            rounded-2xl shadow-2xl overflow-hidden">

            <div class="px-6 py-5
                border-b border-slate-200 dark:border-slate-700">

                <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                    Delete Question
                </h3>
            </div>

            <div class="p-6">
                <p class="text-slate-600 dark:text-slate-300">
                    Are you sure you want to delete this question?

                    <br><br>

                    Pertanyaan dan file audio yang terkait akan dihapus.
                    This action cannot be undone.
                </p>
            </div>

            <div class="px-6 py-4
                bg-slate-50 dark:bg-slate-900
                flex justify-end gap-3">

                <button type="button" onclick="closeDeleteModal()"
                    class="px-5 py-2 rounded-xl
                    bg-slate-200 hover:bg-slate-300
                    dark:bg-slate-700 dark:hover:bg-slate-600
                    text-slate-900 dark:text-white transition">

                    Cancel
                </button>

                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="px-5 py-2 rounded-xl
                        bg-red-600 hover:bg-red-700
                        text-white transition">

                        Delete
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(actionUrl) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');

            form.action = actionUrl;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');

            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeDeleteModal();
            }
        });

        const deleteModal = document.getElementById('deleteModal');

        if (deleteModal) {
            deleteModal.addEventListener('click', function(event) {
                if (event.target === this) {
                    closeDeleteModal();
                }
            });
        }
    </script>
@endsection
