@extends('layouts.admin')

@section('content')

<div class="space-y-6">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-black text-slate-900 dark:text-white">
                Speaking Materials
            </h1>

            <p class="mt-1 text-slate-500 dark:text-slate-400">
                Manage speaking materials for this lesson
            </p>
        </div>

        <a href="{{ route('admin.speaking-materials.create', $lesson->id) }}"
            class="inline-flex items-center justify-center px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold transition">

            + Add Material

        </a>

    </div>

    <!-- LESSON INFO -->
    <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl shadow-sm p-6">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-xl font-bold text-slate-900 dark:text-white">
                    {{ $lesson->title }}
                </h2>

                <p class="mt-1 text-slate-500 dark:text-slate-400">
                    Lesson ID : {{ $lesson->id }}
                </p>

            </div>

            <div
                class="px-4 py-2 rounded-xl bg-purple-100 dark:bg-purple-900/40 text-purple-700 dark:text-purple-300 text-sm font-semibold">

                Speaking Lesson

            </div>

        </div>

    </div>

    <!-- MATERIAL LIST -->
    <div
        class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-200 dark:border-slate-700">

            <h3 class="text-lg font-bold text-slate-900 dark:text-white">
                Material List
            </h3>

        </div>

        @if ($materials->count())

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>
                      <tr class="bg-slate-100 dark:bg-slate-900 text-slate-700 dark:text-slate-300">

                          <th class="text-left px-6 py-4">
                              Image
                          </th>

                          <th class="text-left px-6 py-4">
                              Title
                          </th>

                          <th class="text-left px-6 py-4">
                              Passage
                          </th>

                          <th class="text-left px-6 py-4">
                              Questions
                          </th>

                          <th class="text-left px-6 py-4">
                              Action
                          </th>

                      </tr>
                  </thead>
                    <tbody>

                      @foreach ($materials as $material)

                      <tr
                          class="border-t border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700/40 transition">

                          <td class="px-6 py-5">

                              @if($material->image)

                                  <img
                                      src="{{ asset('storage/'.$material->image) }}"
                                      class="w-24 h-24 object-cover rounded-xl shadow"
                                  >

                              @else

                                  <div
                                      class="w-24 h-24 rounded-xl bg-slate-100 dark:bg-slate-700 flex items-center justify-center text-slate-400">

                                      🎤

                                  </div>

                              @endif

                          </td>

                          <td class="px-6 py-5">

                              <div class="font-semibold text-slate-900 dark:text-white">
                                  {{ $material->title }}
                              </div>

                          </td>

                          <td class="px-6 py-5">

                              <div
                                  class="max-w-md p-3 rounded-xl bg-slate-50 dark:bg-slate-900 text-slate-600 dark:text-slate-300">

                                  {{ Str::limit($material->instruction, 120) }}
                              </div>

                          </td>

                          <td class="px-6 py-5">

                              <span
                                  class="inline-flex items-center px-3 py-1 rounded-full bg-purple-100 dark:bg-purple-900/40 text-purple-700 dark:text-purple-300 text-sm font-medium">

                                  {{ $material->questions->count() }}
                                  Questions

                              </span>

                          </td>

                          <td class="px-6 py-5">

                              <div class="flex items-center gap-2">

                                  <a
                                      href="{{ route('admin.speaking-questions.index', $material->id) }}"
                                      class="px-4 py-2 rounded-lg bg-purple-600 hover:bg-purple-700 text-white">

                                      Questions

                                  </a>

                                  <a
                                      href="{{ route('admin.speaking-materials.edit', $material->id) }}"
                                      class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

                                      Edit

                                  </a>

                                  <button
                                      type="button"
                                      data-id="{{ $material->id }}"
                                      onclick="openDeleteModal(this.dataset.id)"
                                      class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white">

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
                    🎤
                </div>

                <h3 class="text-xl font-bold text-slate-900 dark:text-white">

                    No Speaking Materials Yet

                </h3>

                <p class="mt-2 text-slate-500 dark:text-slate-400">

                    Start by creating your first speaking material.

                </p>

                <a href="{{ route('admin.speaking-materials.create', $lesson->id) }}"
                    class="inline-flex mt-6 px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold">

                    Create First Material

                </a>

            </div>

        @endif

    </div>

</div>
<!-- DELETE MODAL -->
<div id="deleteModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm p-4">

    <div class="w-full max-w-md bg-white dark:bg-slate-800 rounded-2xl shadow-2xl overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-200 dark:border-slate-700">

            <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                Delete Speaking Material
            </h3>

        </div>

        <div class="p-6">

            <p class="text-slate-600 dark:text-slate-300">
                Are you sure you want to delete this material?
            </p>

            <p class="mt-4 text-sm text-red-500">
                This action cannot be undone.
            </p>

        </div>

        <div class="flex justify-end gap-3 px-6 py-5 bg-slate-50 dark:bg-slate-900">

            <button
                onclick="closeDeleteModal()"
                class="px-5 py-2 rounded-xl bg-slate-300 dark:bg-slate-600 text-slate-800 dark:text-white">

                Cancel

            </button>

            <form id="deleteForm" method="POST">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="px-5 py-2 rounded-xl bg-red-600 hover:bg-red-700 text-white">

                    Delete

                </button>

            </form>

        </div>

    </div>

</div>

<script>

    function openDeleteModal(id)
    {
        const modal =
            document.getElementById('deleteModal');

        const form =
            document.getElementById('deleteForm');

        form.action =
            `/admin/speaking-materials/${id}`;

        modal.classList.remove('hidden');

        modal.classList.add('flex');
    }

    function closeDeleteModal()
    {
        const modal =
            document.getElementById('deleteModal');

        modal.classList.add('hidden');

        modal.classList.remove('flex');
    }

</script>

@endsection