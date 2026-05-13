@extends('layouts.admin')

@section('content')
    <!-- HEADER -->
    <div class="flex items-center justify-between mb-8">

        <div>

            <h1 class="text-3xl font-black">
                Practice Management
            </h1>

            <p class="text-slate-500 mt-1">
                Create and manage learning practices
            </p>

        </div>

    </div>

    <!-- CREATE PRACTICE -->
    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm mb-8">

        <div class="mb-6">

            <h2 class="text-2xl font-bold">
                Create Practice
            </h2>

            <p class="text-slate-500 text-sm mt-1">
                Add new practice material for students
            </p>

        </div>

        <form action="" method="POST">

            @csrf

            <div class="grid grid-cols-2 gap-6">

                <!-- TITLE -->
                <div>

                    <label class="block text-sm font-semibold text-slate-600 mb-2">
                        Practice Title
                    </label>

                    <input
                        type="text"
                        placeholder="Enter practice title"
                        class="w-full px-5 py-4 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-cyan-500">

                </div>

                <!-- TYPE -->
                <div>

                    <label class="block text-sm font-semibold text-slate-600 mb-2">
                        Practice Type
                    </label>

                    <select
                        class="w-full px-5 py-4 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-cyan-500">

                        <option>Speaking</option>
                        <option>Listening</option>
                        <option>Vocabulary</option>
                        <option>Pronunciation</option>

                    </select>

                </div>

                <!-- DIFFICULTY -->
                <div>

                    <label class="block text-sm font-semibold text-slate-600 mb-2">
                        Difficulty
                    </label>

                    <select
                        class="w-full px-5 py-4 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-cyan-500">

                        <option>Easy</option>
                        <option>Medium</option>
                        <option>Hard</option>

                    </select>

                </div>

                <!-- STATUS -->
                <div>

                    <label class="block text-sm font-semibold text-slate-600 mb-2">
                        Status
                    </label>

                    <select
                        class="w-full px-5 py-4 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-cyan-500">

                        <option>Active</option>
                        <option>Draft</option>

                    </select>

                </div>

            </div>

            <!-- DESCRIPTION -->
            <div class="mt-6">

                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Description
                </label>

                <textarea
                    rows="4"
                    placeholder="Enter practice description"
                    class="w-full px-5 py-4 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-cyan-500"></textarea>

            </div>

            <!-- AUDIO -->
            <div class="mt-6">

                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Upload Audio
                </label>

                <input
                    type="file"
                    class="w-full px-5 py-4 rounded-2xl border border-slate-200 bg-white focus:outline-none">

            </div>

            <!-- IMAGE -->
            <div class="mt-6">

                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Upload Image
                </label>

                <input
                    type="file"
                    class="w-full px-5 py-4 rounded-2xl border border-slate-200 bg-white focus:outline-none">

            </div>

            <!-- CORRECT ANSWER -->
            <div class="mt-6">

                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Correct Answer
                </label>

                <input
                    type="text"
                    placeholder="Enter correct answer"
                    class="w-full px-5 py-4 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-cyan-500">

            </div>

            <!-- BUTTON -->
            <div class="mt-6 flex justify-end">

                <button
                    type="submit"
                    class="px-6 py-4 rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-semibold shadow-lg shadow-cyan-500/20">

                    + Create Practice

                </button>

            </div>

        </form>

    </div>

    <!-- EXISTING PRACTICES -->
    <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm">

        <div class="px-6 py-5 border-b border-slate-200">

            <h2 class="text-xl font-bold">
                Existing Practices
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-200">

                    <tr>

                        <th class="text-left px-6 py-4 text-sm font-bold text-slate-500">
                            Practice
                        </th>

                        <th class="text-left px-6 py-4 text-sm font-bold text-slate-500">
                            Type
                        </th>

                        <th class="text-left px-6 py-4 text-sm font-bold text-slate-500">
                            Difficulty
                        </th>

                        <th class="text-left px-6 py-4 text-sm font-bold text-slate-500">
                            Status
                        </th>

                        <th class="text-right px-6 py-4 text-sm font-bold text-slate-500">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <!-- ROW -->
                    <tr class="border-b border-slate-100 hover:bg-slate-50 transition">

                        <!-- PRACTICE -->
                        <td class="px-6 py-5">

                            <div class="flex items-center gap-4">

                                <div
                                    class="w-12 h-12 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center text-white font-bold">

                                    SP

                                </div>

                                <div>

                                    <h3 class="font-bold">
                                        Speaking Animals
                                    </h3>

                                    <p class="text-sm text-slate-500">
                                        Pronounce animal vocabulary correctly
                                    </p>

                                </div>

                            </div>

                        </td>

                        <!-- TYPE -->
                        <td class="px-6 py-5 text-slate-600">

                            Speaking

                        </td>

                        <!-- DIFFICULTY -->
                        <td class="px-6 py-5">

                            <span
                                class="px-4 py-2 rounded-xl bg-yellow-500/10 text-yellow-500 text-sm font-semibold">

                                Medium

                            </span>

                        </td>

                        <!-- STATUS -->
                        <td class="px-6 py-5">

                            <span
                                class="px-4 py-2 rounded-xl bg-green-500/10 text-green-500 text-sm font-semibold">

                                Active

                            </span>

                        </td>

                        <!-- ACTION -->
                        <td class="px-6 py-5">

                            <div class="flex items-center justify-end gap-3">

                                <button
                                    class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 transition text-sm font-medium">

                                    Edit

                                </button>

                                <button
                                    class="px-4 py-2 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-500 transition text-sm font-medium">

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