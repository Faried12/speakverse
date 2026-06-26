@extends('layouts.admin')

@section('content')

<div class="space-y-6">

    <!-- HEADER -->
    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-3xl font-black text-slate-900 dark:text-white">
                Listening Questions
            </h1>

            <p class="mt-1 text-slate-500 dark:text-slate-400">
                Manage questions for this listening material
            </p>

        </div>

        <a href="{{ route('admin.listening-questions.create', $material->id) }}"
            class="px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold transition">

            + Add Question

        </a>

    </div>

    <!-- MATERIAL INFO -->
    <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl shadow-sm p-6">

        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
            {{ $material->title }}
        </h2>

        <p class="mt-2 text-slate-500 dark:text-slate-400">
            Total Questions :
            {{ $questions->count() }}
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

    <!-- QUESTION LIST -->
    <div
        class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl shadow-sm overflow-hidden">

        <div class="p-6 border-b border-slate-200 dark:border-slate-700">

            <h3 class="text-lg font-bold text-slate-900 dark:text-white">
                Question List
            </h3>

        </div>

        @if ($questions->count())

            <table class="w-full">

                <thead>

                    <tr class="bg-slate-100 dark:bg-slate-900">

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

                        <tr class="border-t border-slate-200 dark:border-slate-700">

                            <td class="px-6 py-4">

                                {{ Str::limit($question->question, 80) }}

                            </td>

                            <td class="px-6 py-4">

                                {{ $question->correct_answer }}

                            </td>

                            <td class="px-6 py-4">

                                {{ $question->score }}

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex gap-2">

                                    <a href="{{ route('admin.listening-questions.edit', $question->id) }}"
                                        class="px-3 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

                                        Edit

                                    </a>

                                    <button
                                        type="button"
                                        data-url="{{ route('admin.listening-questions.destroy', $question->id) }}"
                                        onclick="openDeleteModal(this.dataset.url)"
                                        class="px-3 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white transition">

                                        Delete

                                    </button>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

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

                <a href="{{ route('admin.listening-questions.create', $material->id) }}"
                    class="inline-flex mt-6 px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold">

                    Create First Question

                </a>

            </div>

        @endif

    </div>

</div>

<!-- DELETE MODAL -->

<div id="deleteModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">

    <div class="w-full max-w-md mx-4 bg-white dark:bg-slate-800 rounded-2xl shadow-2xl overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-200 dark:border-slate-700">

            <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                Delete Question
            </h3>

        </div>

        <div class="p-6">

            <p class="text-slate-600 dark:text-slate-300">

                Are you sure you want to delete this question?

                <br><br>

                This action cannot be undone.

            </p>

        </div>

        <div class="px-6 py-4 bg-slate-50 dark:bg-slate-900 flex justify-end gap-3">

            <button
                type="button"
                onclick="closeDeleteModal()"
                class="px-5 py-2 rounded-xl bg-slate-200 hover:bg-slate-300 dark:bg-slate-700 dark:hover:bg-slate-600 text-slate-900 dark:text-white transition">

                Cancel

            </button>

            <form id="deleteForm" method="POST">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="px-5 py-2 rounded-xl bg-red-600 hover:bg-red-700 text-white transition">

                    Delete

                </button>

            </form>

        </div>

    </div>

</div>

<script>
    function openDeleteModal(actionUrl) {

        document.getElementById(
            'deleteForm'
        ).action = actionUrl;

        document
            .getElementById('deleteModal')
            .classList
            .remove('hidden');

        document
            .getElementById('deleteModal')
            .classList
            .add('flex');
    }

    function closeDeleteModal() {

        document
            .getElementById('deleteModal')
            .classList
            .remove('flex');

        document
            .getElementById('deleteModal')
            .classList
            .add('hidden');
    }
</script>
@endsection
