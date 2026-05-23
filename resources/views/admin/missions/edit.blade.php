@extends('layouts.admin')

@section('content')
    <!-- HEADER -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-8">

        <div>

            <h1 class="text-3xl lg:text-4xl font-black leading-tight">
                Edit Mission
            </h1>

            <p class="mt-2 text-slate-500 dark:text-slate-400">
                Update learning mission information
            </p>

        </div>

        <!-- BACK -->
        <a href="{{ route('admin.missions') }}"
            class="px-6 py-3 rounded-2xl
            bg-slate-100 dark:bg-white/5
            hover:bg-slate-200 dark:hover:bg-white/10
            transition-all duration-200
            font-semibold text-center">

            ← Back to Missions

        </a>

    </div>

    <!-- EDIT FORM -->
    <div
        class="rounded-[32px]
        bg-white dark:bg-white/[0.03]
        border border-slate-200 dark:border-white/10
        shadow-sm
        p-5 lg:p-8">

        <!-- TITLE -->
        <div class="mb-8">

            <h2 class="text-2xl lg:text-3xl font-black">
                Mission Information
            </h2>

            <p class="mt-2 text-slate-500 dark:text-slate-400">
                Modify mission details below
            </p>

        </div>

        <!-- FORM -->
        <form action="" method="POST">

            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- TITLE -->
                <div>

                    <label class="block mb-3 text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Mission Title

                    </label>

                    <input type="text" value="Speaking Challenge"
                        class="w-full px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none focus:ring-2
                        focus:ring-cyan-500">

                </div>

                <!-- CATEGORY -->
                <div>

                    <label class="block mb-3 text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Category

                    </label>

                    <select
                        class="w-full px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none focus:ring-2
                        focus:ring-cyan-500">

                        <option selected>Speaking</option>
                        <option>Reading</option>
                        <option>Vocabulary</option>

                    </select>

                </div>

                <!-- DIFFICULTY -->
                <div>

                    <label class="block mb-3 text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Difficulty

                    </label>

                    <select
                        class="w-full px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none focus:ring-2
                        focus:ring-cyan-500">

                        <option>Easy</option>
                        <option selected>Medium</option>
                        <option>Hard</option>

                    </select>

                </div>

                <!-- XP -->
                <div>

                    <label class="block mb-3 text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Reward XP

                    </label>

                    <input type="number" value="120"
                        class="w-full px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none focus:ring-2
                        focus:ring-cyan-500">

                </div>

                <!-- STATUS -->
                <div>

                    <label class="block mb-3 text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Status

                    </label>

                    <select
                        class="w-full px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none focus:ring-2
                        focus:ring-cyan-500">

                        <option selected>Active</option>
                        <option>Draft</option>

                    </select>

                </div>

                <!-- DEADLINE -->
                <div>

                    <label class="block mb-3 text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Deadline

                    </label>

                    <input type="date" value="2026-12-31"
                        class="w-full px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none focus:ring-2
                        focus:ring-cyan-500">

                </div>

            </div>

            <!-- DESCRIPTION -->
            <div class="mt-6">

                <label class="block mb-3 text-sm font-bold
                    text-slate-700 dark:text-slate-300">

                    Mission Description

                </label>

                <textarea rows="5"
                    class="w-full px-5 py-4 rounded-2xl
                    bg-slate-50 dark:bg-white/[0.03]
                    border border-slate-200 dark:border-white/10
                    focus:outline-none focus:ring-2
                    focus:ring-cyan-500">Practice speaking for 10 minutes and improve pronunciation accuracy.</textarea>

            </div>

            <!-- BUTTON -->
            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-end">

                <a href="{{ route('admin.missions') }}"
                    class="px-8 py-4 rounded-2xl
                    bg-slate-100 dark:bg-white/5
                    hover:bg-slate-200 dark:hover:bg-white/10
                    transition-all duration-200
                    font-semibold text-center">

                    Cancel

                </a>

                <button type="submit"
                    class="px-8 py-4 rounded-2xl
                    bg-gradient-to-r from-cyan-500 to-blue-600
                    text-white font-bold
                    shadow-lg shadow-cyan-500/20
                    hover:scale-[1.02]
                    transition-all duration-200">

                    Save Changes

                </button>

            </div>

        </form>

    </div>
@endsection
