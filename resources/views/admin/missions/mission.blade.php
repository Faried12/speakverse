@extends('layouts.admin')

@section('content')
    <!-- HEADER -->
    <div class="flex items-center justify-between mb-8">

        <div>

            <h1 class="text-3xl font-black">
                Mission Management
            </h1>

            <p class="text-slate-500 mt-1">
                Create and manage learning missions
            </p>

        </div>

    </div>

    <!-- CREATE MISSION -->
    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm mb-8">

        <div class="flex items-center justify-between mb-6">

            <div>

                <h2 class="text-2xl font-bold">
                    Create Mission
                </h2>

                <p class="text-slate-500 text-sm mt-1">
                    Add new mission for students
                </p>

            </div>

        </div>

        <form action="" method="POST">

            @csrf

            <div class="grid grid-cols-2 gap-6">

                <!-- TITLE -->
                <div>

                    <label class="block text-sm font-semibold text-slate-600 mb-2">
                        Mission Title
                    </label>

                    <input
                        type="text"
                        placeholder="Enter mission title"
                        class="w-full px-5 py-4 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-cyan-500">

                </div>

                <!-- CATEGORY -->
                <div>

                    <label class="block text-sm font-semibold text-slate-600 mb-2">
                        Category
                    </label>

                    <select
                        class="w-full px-5 py-4 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-cyan-500">

                        <option>Speaking</option>
                        <option>Vocabulary</option>
                        <option>Listening</option>
                        <option>Grammar</option>

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

                <!-- REWARD -->
                <div>

                    <label class="block text-sm font-semibold text-slate-600 mb-2">
                        Reward XP
                    </label>

                    <input
                        type="number"
                        placeholder="Enter reward XP"
                        class="w-full px-5 py-4 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-cyan-500">

                </div>

                <!-- DEADLINE -->
                <div>

                    <label class="block text-sm font-semibold text-slate-600 mb-2">
                        Deadline
                    </label>

                    <input
                        type="date"
                        class="w-full px-5 py-4 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-cyan-500">

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
                    Mission Description
                </label>

                <textarea
                    rows="5"
                    placeholder="Enter mission description"
                    class="w-full px-5 py-4 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-cyan-500"></textarea>

            </div>

            <!-- BUTTON -->
            <div class="mt-6 flex justify-end">

                <button
                    type="submit"
                    class="px-6 py-4 rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-semibold shadow-lg shadow-cyan-500/20">

                    + Create Mission

                </button>

            </div>

        </form>

    </div>

    <!-- EXISTING MISSIONS -->
    <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm">

        <div class="px-6 py-5 border-b border-slate-200">

            <h2 class="text-xl font-bold">
                Existing Missions
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-200">

                    <tr>

                        <th class="text-left px-6 py-4 text-sm font-bold text-slate-500">
                            Mission
                        </th>

                        <th class="text-left px-6 py-4 text-sm font-bold text-slate-500">
                            Category
                        </th>

                        <th class="text-left px-6 py-4 text-sm font-bold text-slate-500">
                            Difficulty
                        </th>

                        <th class="text-left px-6 py-4 text-sm font-bold text-slate-500">
                            Reward
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

                        <td class="px-6 py-5">

                            <div class="flex items-center gap-4">

                                <div
                                    class="w-12 h-12 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center text-white font-bold">

                                    DS

                                </div>

                                <div>

                                    <h3 class="font-bold">
                                        Daily Speaking
                                    </h3>

                                    <p class="text-sm text-slate-500">
                                        Complete 5 speaking practices
                                    </p>

                                </div>

                            </div>

                        </td>

                        <td class="px-6 py-5 text-slate-600">
                            Speaking
                        </td>

                        <td class="px-6 py-5">

                            <span
                                class="px-4 py-2 rounded-xl bg-yellow-500/10 text-yellow-500 text-sm font-semibold">

                                Medium

                            </span>

                        </td>

                        <td class="px-6 py-5 text-slate-600 font-semibold">
                            100 XP
                        </td>

                        <td class="px-6 py-5">

                            <span
                                class="px-4 py-2 rounded-xl bg-green-500/10 text-green-500 text-sm font-semibold">

                                Active

                            </span>

                        </td>

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