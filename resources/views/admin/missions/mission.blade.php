@extends('layouts.admin')

@section('content')
    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5 mb-8">

        <div>

            <h1 class="text-3xl lg:text-4xl font-black leading-tight">
                Mission Management
            </h1>

            <p class="mt-2 text-slate-500 dark:text-slate-400">
                Create and manage learning missions
            </p>

        </div>

    </div>

    <!-- CREATE MISSION -->
    <div
        class="rounded-[32px]
        bg-white dark:bg-white/[0.03]
        border border-slate-200 dark:border-white/10
        shadow-sm
        p-5 lg:p-8
        mb-8">

        <!-- TITLE -->
        <div class="mb-8">

            <h2 class="text-2xl lg:text-3xl font-black">
                Create Mission
            </h2>

            <p class="mt-2 text-slate-500 dark:text-slate-400">
                Add new mission for students
            </p>

        </div>

        <!-- FORM -->
        <form action="{{ route('admin.missions.store') }}" method="POST">

            @csrf

            <!-- GRID -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- TITLE -->
                <div>

                    <label
                        class="block mb-3
                        text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Mission Title

                    </label>

                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Enter mission title"
                        class="w-full
                        px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none
                        focus:ring-2 focus:ring-cyan-500
                        transition-all duration-200">

                </div>

                <!-- CATEGORY -->
                <div>

                    <label
                        class="block mb-3
                        text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Category

                    </label>

                    <select name="category"
                        class="w-full
                        px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none
                        focus:ring-2 focus:ring-cyan-500
                        transition-all duration-200">

                        <option value="speaking">Speaking</option>
                        <option value="reading">Reading</option>
                        <option value="vocabulary">Vocabulary</option>

                    </select>

                </div>

                <!-- DIFFICULTY -->
                <div>

                    <label
                        class="block mb-3
                        text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Difficulty

                    </label>

                    <select name="difficulty"
                        class="w-full
                        px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none
                        focus:ring-2 focus:ring-cyan-500
                        transition-all duration-200">

                        <option value="easy">Easy</option>
                        <option value="medium">Medium</option>
                        <option value="hard">Hard</option>

                    </select>

                </div>

                <!-- REWARD -->
                <div>

                    <label
                        class="block mb-3
                        text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Reward XP

                    </label>

                    <input type="number" name="reward_xp" value="{{ old('reward_xp') }}" placeholder="Enter reward XP"
                        class="w-full
                        px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none
                        focus:ring-2 focus:ring-cyan-500
                        transition-all duration-200">

                </div>

                <!-- DEADLINE -->
                <div>

                    <label
                        class="block mb-3
                        text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Deadline

                    </label>

                    <input type="date" name="deadline" value="{{ old('deadline') }}"
                        class="w-full
                        px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none
                        focus:ring-2 focus:ring-cyan-500
                        transition-all duration-200">

                </div>

                <!-- STATUS -->
                <div>

                    <label
                        class="block mb-3
                        text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Status

                    </label>

                    <select name="status"
                        class="w-full
                        px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none
                        focus:ring-2 focus:ring-cyan-500
                        transition-all duration-200">

                        <option value="active">Active</option>
                        <option value="draft">Draft</option>

                    </select>

                </div>

            </div>

            <!-- DESCRIPTION -->
            <div class="mt-6">

                <label
                    class="block mb-3
                    text-sm font-bold
                    text-slate-700 dark:text-slate-300">

                    Mission Description

                </label>

                <textarea name="description" rows="5" placeholder="Enter mission description"
                    class="w-full
                    px-5 py-4 rounded-2xl
                    bg-slate-50 dark:bg-white/[0.03]
                    border border-slate-200 dark:border-white/10
                    focus:outline-none
                    focus:ring-2 focus:ring-cyan-500
                    transition-all duration-200">{{ old('description') }}</textarea>

            </div>

            <!-- BUTTON -->
            <div class="mt-8 flex justify-end">

                <button type="submit"
                    class="w-full sm:w-auto
                    px-8 py-4 rounded-2xl
                    bg-gradient-to-r from-cyan-500 to-blue-600
                    text-white font-bold
                    shadow-lg shadow-cyan-500/20
                    hover:scale-[1.02]
                    transition-all duration-200">

                    + Create Mission

                </button>

            </div>

        </form>

    </div>

    <!-- MOBILE CARDS -->
    <div class="grid grid-cols-1 gap-5 lg:hidden">

        <!-- SPEAKING -->
        <div
            class="rounded-3xl
            bg-white dark:bg-white/[0.03]
            border border-slate-200 dark:border-white/10
            p-5 shadow-sm">

            <div class="flex items-start justify-between gap-4">

                <div class="flex items-center gap-4">

                    <div
                        class="w-16 h-16 rounded-3xl
                        bg-cyan-500/10
                        flex items-center justify-center
                        text-3xl shrink-0">

                        🎤

                    </div>

                    <div>

                        <h3 class="font-black text-lg leading-tight">
                            Speaking Challenge
                        </h3>

                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                            Practice pronunciation and speaking confidence.
                        </p>

                    </div>

                </div>

                <span
                    class="px-3 py-2 rounded-xl
                    bg-green-500/10
                    text-green-400
                    text-xs font-bold">

                    Active

                </span>

            </div>

        </div>

        <!-- READING -->
        <div
            class="rounded-3xl
            bg-white dark:bg-white/[0.03]
            border border-slate-200 dark:border-white/10
            p-5 shadow-sm">

            <div class="flex items-start justify-between gap-4">

                <div class="flex items-center gap-4">

                    <div
                        class="w-16 h-16 rounded-3xl
                        bg-purple-500/10
                        flex items-center justify-center
                        text-3xl shrink-0">

                        📖

                    </div>

                    <div>

                        <h3 class="font-black text-lg leading-tight">
                            Reading Challenge
                        </h3>

                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                            Improve reading comprehension and analysis.
                        </p>

                    </div>

                </div>

                <span
                    class="px-3 py-2 rounded-xl
                    bg-yellow-500/10
                    text-yellow-400
                    text-xs font-bold">

                    New

                </span>

            </div>

        </div>

        <!-- VOCABULARY -->
        <div
            class="rounded-3xl
            bg-white dark:bg-white/[0.03]
            border border-slate-200 dark:border-white/10
            p-5 shadow-sm">

            <div class="flex items-start justify-between gap-4">

                <div class="flex items-center gap-4">

                    <div
                        class="w-16 h-16 rounded-3xl
                        bg-emerald-500/10
                        flex items-center justify-center
                        text-3xl shrink-0">

                        📚

                    </div>

                    <div>

                        <h3 class="font-black text-lg leading-tight">
                            Vocabulary Challenge
                        </h3>

                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                            Learn new vocabulary and daily English words.
                        </p>

                    </div>

                </div>

                <span
                    class="px-3 py-2 rounded-xl
                    bg-emerald-500/10
                    text-emerald-400
                    text-xs font-bold">

                    New

                </span>

            </div>

        </div>

    </div>

    <!-- DESKTOP TABLE -->
    <div
        class="hidden lg:block
        rounded-[32px]
        overflow-hidden
        bg-white dark:bg-white/[0.03]
        border border-slate-200 dark:border-white/10
        shadow-sm mt-8">

        <!-- HEADER -->
        <div class="px-8 py-6
            border-b border-slate-200 dark:border-white/10">

            <h2 class="text-2xl font-black">
                Existing Missions
            </h2>

        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">

            <table class="w-full min-w-[950px]">

                <thead
                    class="bg-slate-50 dark:bg-white/[0.03]
                    border-b border-slate-200 dark:border-white/10">

                    <tr>

                        <th class="text-left px-8 py-5 text-sm font-black text-slate-500 dark:text-slate-400">
                            Mission
                        </th>

                        <th class="text-left px-8 py-5 text-sm font-black text-slate-500 dark:text-slate-400">
                            Category
                        </th>

                        <th class="text-left px-8 py-5 text-sm font-black text-slate-500 dark:text-slate-400">
                            Difficulty
                        </th>

                        <th class="text-left px-8 py-5 text-sm font-black text-slate-500 dark:text-slate-400">
                            Reward
                        </th>

                        <th class="text-left px-8 py-5 text-sm font-black text-slate-500 dark:text-slate-400">
                            Status
                        </th>

                        <th class="text-right px-8 py-5 text-sm font-black text-slate-500 dark:text-slate-400">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($missions as $mission)
                        <tr class="border-b border-slate-100 dark:border-white/5">

                            <td class="px-8 py-6">

                                <div>

                                    <h3 class="font-black text-lg">
                                        {{ $mission->title }}
                                    </h3>

                                    <p class="text-sm text-slate-500 dark:text-slate-400">
                                        {{ $mission->description }}
                                    </p>

                                </div>

                            </td>

                            <td class="px-8 py-6">
                                {{ ucfirst($mission->category) }}
                            </td>

                            <td class="px-8 py-6">
                                {{ ucfirst($mission->difficulty) }}
                            </td>

                            <td class="px-8 py-6 font-semibold">
                                {{ $mission->reward_xp }} XP
                            </td>

                            <td class="px-8 py-6">

                                @if ($mission->status == 'active')
                                    <span class="px-4 py-2 rounded-xl bg-green-500/10 text-green-400 text-sm font-bold">
                                        Active
                                    </span>
                                @else
                                    <span class="px-4 py-2 rounded-xl bg-yellow-500/10 text-yellow-400 text-sm font-bold">
                                        Draft
                                    </span>
                                @endif

                            </td>

                            <td class="px-8 py-6">

                                <div class="flex items-center justify-end gap-3">

                                    <a href="{{ route('admin.missions.edit', $mission->id) }}"
                                        class="px-5 py-3 rounded-2xl
                bg-slate-100 dark:bg-white/5
                hover:bg-slate-200 dark:hover:bg-white/10
                transition-all duration-200
                font-semibold">

                                        Edit

                                    </a>

                                    <form action="{{ route('admin.missions.destroy', $mission->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" onclick="return confirm('Hapus mission ini?')"
                                            class="px-5 py-3 rounded-2xl
                    bg-red-500/10
                    text-red-400
                    hover:bg-red-500/20
                    transition-all duration-200
                    font-semibold">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center py-10 text-slate-500">

                                Belum ada mission.

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
