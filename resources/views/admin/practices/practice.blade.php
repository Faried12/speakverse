@extends('layouts.admin')

@section('content')
    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5 mb-8">

        <div>

            <h1 class="text-3xl lg:text-4xl font-black leading-tight">
                Practice Management
            </h1>

            <p class="mt-2 text-slate-500 dark:text-slate-400">
                Create and manage learning practices
            </p>

        </div>

    </div>

    <!-- CREATE PRACTICE -->
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
                Create Practice
            </h2>

            <p class="mt-2 text-slate-500 dark:text-slate-400">
                Add new practice material for students
            </p>

        </div>

        <!-- FORM -->
        <form action="" method="POST">

            @csrf

            <!-- GRID -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- TITLE -->
                <div>

                    <label
                        class="block mb-3
                        text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Practice Title

                    </label>

                    <input type="text" placeholder="Enter practice title"
                        class="w-full
                        px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none
                        focus:ring-2 focus:ring-cyan-500
                        transition-all duration-200">

                </div>

                <!-- TYPE -->
                <div>

                    <label
                        class="block mb-3
                        text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Practice Type

                    </label>

                    <select
                        class="w-full
                        px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none
                        focus:ring-2 focus:ring-cyan-500
                        transition-all duration-200">

                        <option>Speaking</option>
                        <option>Listening</option>
                        <option>Vocabulary</option>
                        <option>Pronunciation</option>

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

                    <select
                        class="w-full
                        px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none
                        focus:ring-2 focus:ring-cyan-500
                        transition-all duration-200">

                        <option>Easy</option>
                        <option>Medium</option>
                        <option>Hard</option>

                    </select>

                </div>

                <!-- STATUS -->
                <div>

                    <label
                        class="block mb-3
                        text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Status

                    </label>

                    <select
                        class="w-full
                        px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none
                        focus:ring-2 focus:ring-cyan-500
                        transition-all duration-200">

                        <option>Active</option>
                        <option>Draft</option>

                    </select>

                </div>

            </div>

            <!-- DESCRIPTION -->
            <div class="mt-6">

                <label
                    class="block mb-3
                    text-sm font-bold
                    text-slate-700 dark:text-slate-300">

                    Description

                </label>

                <textarea rows="5" placeholder="Enter practice description"
                    class="w-full
                    px-5 py-4 rounded-2xl
                    bg-slate-50 dark:bg-white/[0.03]
                    border border-slate-200 dark:border-white/10
                    focus:outline-none
                    focus:ring-2 focus:ring-cyan-500
                    transition-all duration-200"></textarea>

            </div>

            <!-- FILE UPLOAD -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">

                <!-- AUDIO -->
                <div>

                    <label
                        class="block mb-3
                        text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Upload Audio

                    </label>

                    <div
                        class="rounded-2xl
                        border-2 border-dashed
                        border-slate-200 dark:border-white/10
                        bg-slate-50 dark:bg-white/[0.03]
                        p-6 text-center">

                        <div
                            class="w-14 h-14 mx-auto rounded-2xl
                            bg-cyan-500/10
                            text-cyan-400
                            flex items-center justify-center
                            text-2xl mb-4">

                            🎧

                        </div>

                        <p class="font-semibold">
                            Upload Audio File
                        </p>

                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                            MP3, WAV supported
                        </p>

                        <input type="file"
                            class="mt-4 block w-full text-sm
                            file:mr-4
                            file:px-4
                            file:py-2
                            file:rounded-xl
                            file:border-0
                            file:bg-cyan-500/10
                            file:text-cyan-500
                            hover:file:bg-cyan-500/20">

                    </div>

                </div>

                <!-- IMAGE -->
                <div>

                    <label
                        class="block mb-3
                        text-sm font-bold
                        text-slate-700 dark:text-slate-300">

                        Upload Image

                    </label>

                    <div
                        class="rounded-2xl
                        border-2 border-dashed
                        border-slate-200 dark:border-white/10
                        bg-slate-50 dark:bg-white/[0.03]
                        p-6 text-center">

                        <div
                            class="w-14 h-14 mx-auto rounded-2xl
                            bg-pink-500/10
                            text-pink-400
                            flex items-center justify-center
                            text-2xl mb-4">

                            🖼️

                        </div>

                        <p class="font-semibold">
                            Upload Image File
                        </p>

                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                            PNG, JPG supported
                        </p>

                        <input type="file"
                            class="mt-4 block w-full text-sm
                            file:mr-4
                            file:px-4
                            file:py-2
                            file:rounded-xl
                            file:border-0
                            file:bg-pink-500/10
                            file:text-pink-500
                            hover:file:bg-pink-500/20">

                    </div>

                </div>

            </div>

            <!-- CORRECT ANSWER -->
            <div class="mt-6">

                <label
                    class="block mb-3
                    text-sm font-bold
                    text-slate-700 dark:text-slate-300">

                    Correct Answer

                </label>

                <input type="text" placeholder="Enter correct answer"
                    class="w-full
                    px-5 py-4 rounded-2xl
                    bg-slate-50 dark:bg-white/[0.03]
                    border border-slate-200 dark:border-white/10
                    focus:outline-none
                    focus:ring-2 focus:ring-cyan-500
                    transition-all duration-200">

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

                    + Create Practice

                </button>

            </div>

        </form>

    </div>

    <!-- MOBILE PRACTICE CARD -->
    <div class="grid grid-cols-1 gap-5 lg:hidden">

        <!-- CARD -->
        <div
            class="rounded-3xl
            bg-white dark:bg-white/[0.03]
            border border-slate-200 dark:border-white/10
            p-5 shadow-sm">

            <!-- TOP -->
            <div class="flex items-start justify-between gap-4">

                <div class="flex items-center gap-4">

                    <!-- ICON -->
                    <div
                        class="relative
                        w-16 h-16 rounded-3xl
                        bg-gradient-to-br from-cyan-400 via-sky-500 to-blue-600
                        flex items-center justify-center
                        shadow-xl shadow-cyan-500/20
                        overflow-hidden shrink-0">

                        <div class="absolute inset-0
                            bg-white/10 backdrop-blur-sm">
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" class="relative z-10 w-8 h-8 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.868v4.264a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" />

                        </svg>

                    </div>

                    <!-- TEXT -->
                    <div>

                        <h3 class="font-black text-lg leading-tight">
                            Speaking Animals
                        </h3>

                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                            Pronounce animal vocabulary correctly
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

            <!-- INFO -->
            <div class="grid grid-cols-2 gap-4 mt-6">

                <div>

                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Type
                    </p>

                    <h4 class="font-bold mt-1">
                        Speaking
                    </h4>

                </div>

                <div>

                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Difficulty
                    </p>

                    <h4 class="font-bold mt-1 text-yellow-400">
                        Medium
                    </h4>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="grid grid-cols-2 gap-3 mt-6">

                <button
                    class="py-3 rounded-2xl
                    bg-slate-100 dark:bg-white/5
                    hover:bg-slate-200 dark:hover:bg-white/10
                    transition-all duration-200
                    font-semibold">

                    Edit

                </button>

                <button
                    class="py-3 rounded-2xl
                    bg-red-500/10
                    text-red-400
                    hover:bg-red-500/20
                    transition-all duration-200
                    font-semibold">

                    Delete

                </button>

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
                Existing Practices
            </h2>

        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">

            <table class="w-full min-w-[950px]">

                <!-- HEAD -->
                <thead
                    class="bg-slate-50 dark:bg-white/[0.03]
                    border-b border-slate-200 dark:border-white/10">

                    <tr>

                        <th class="text-left px-8 py-5 text-sm font-black text-slate-500 dark:text-slate-400">
                            Practice
                        </th>

                        <th class="text-left px-8 py-5 text-sm font-black text-slate-500 dark:text-slate-400">
                            Type
                        </th>

                        <th class="text-left px-8 py-5 text-sm font-black text-slate-500 dark:text-slate-400">
                            Difficulty
                        </th>

                        <th class="text-left px-8 py-5 text-sm font-black text-slate-500 dark:text-slate-400">
                            Status
                        </th>

                        <th class="text-right px-8 py-5 text-sm font-black text-slate-500 dark:text-slate-400">
                            Actions
                        </th>

                    </tr>

                </thead>

                <!-- BODY -->
                <tbody>

                    <tr
                        class="border-b border-slate-100 dark:border-white/5
                        hover:bg-slate-50 dark:hover:bg-white/[0.02]
                        transition-all duration-200">

                        <!-- PRACTICE -->
                        <td class="px-8 py-6">

                            <div class="flex items-center gap-5">

                                <!-- ICON -->
                                <div
                                    class="relative
                                    w-16 h-16 rounded-3xl
                                    bg-gradient-to-br from-cyan-400 via-sky-500 to-blue-600
                                    flex items-center justify-center
                                    shadow-xl shadow-cyan-500/20
                                    overflow-hidden shrink-0">

                                    <div
                                        class="absolute inset-0
                                        bg-white/10 backdrop-blur-sm">
                                    </div>

                                    <svg xmlns="http://www.w3.org/2000/svg" class="relative z-10 w-8 h-8 text-white"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.868v4.264a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />

                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" />

                                    </svg>

                                    <!-- BADGE -->
                                    <div
                                        class="absolute -top-1 -right-1
                                        w-6 h-6 rounded-full
                                        bg-white
                                        text-cyan-500
                                        flex items-center justify-center
                                        text-[10px] font-black
                                        shadow-md">

                                        ▶

                                    </div>

                                </div>

                                <!-- TEXT -->
                                <div>

                                    <h3 class="font-black text-lg leading-tight">
                                        Speaking Animals
                                    </h3>

                                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1 max-w-[260px]">
                                        Pronounce animal vocabulary correctly
                                    </p>

                                </div>

                            </div>

                        </td>

                        <!-- TYPE -->
                        <td class="px-8 py-6 font-medium">
                            Speaking
                        </td>

                        <!-- DIFFICULTY -->
                        <td class="px-8 py-6">

                            <span
                                class="px-4 py-2 rounded-xl
                                bg-yellow-500/10
                                text-yellow-400
                                text-sm font-bold">

                                Medium

                            </span>

                        </td>

                        <!-- STATUS -->
                        <td class="px-8 py-6">

                            <span
                                class="px-4 py-2 rounded-xl
                                bg-green-500/10
                                text-green-400
                                text-sm font-bold">

                                Active

                            </span>

                        </td>

                        <!-- ACTION -->
                        <td class="px-8 py-6">

                            <div class="flex items-center justify-end gap-3">

                                <button
                                    class="px-5 py-3 rounded-2xl
                                    bg-slate-100 dark:bg-white/5
                                    hover:bg-slate-200 dark:hover:bg-white/10
                                    transition-all duration-200
                                    font-semibold">

                                    Edit

                                </button>

                                <button
                                    class="px-5 py-3 rounded-2xl
                                    bg-red-500/10
                                    text-red-400
                                    hover:bg-red-500/20
                                    transition-all duration-200
                                    font-semibold">

                                    Delete

                                </button>

                            </div>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>
@endsection
