@extends('layouts.admin')

@section('content')
    <!-- HEADER -->
    <div class="flex items-center justify-between mb-8">

        <div>

            <h1 class="text-3xl font-black">
                Analytics
            </h1>

            <p class="text-slate-500 mt-1">
                Monitor platform performance and student activity
            </p>

        </div>

    </div>

    <!-- STATS -->
    <div class="grid grid-cols-4 gap-6 mb-8">

        <!-- TOTAL USERS -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200">

            <p class="text-slate-500 text-sm">
                Total Users
            </p>

            <h2 class="text-4xl font-black mt-3">
                120
            </h2>

        </div>

        <!-- PRACTICES -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200">

            <p class="text-slate-500 text-sm">
                Practices Completed
            </p>

            <h2 class="text-4xl font-black mt-3 text-cyan-500">
                890
            </h2>

        </div>

        <!-- MISSIONS -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200">

            <p class="text-slate-500 text-sm">
                Missions Completed
            </p>

            <h2 class="text-4xl font-black mt-3 text-green-500">
                540
            </h2>

        </div>

        <!-- AVG SCORE -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200">

            <p class="text-slate-500 text-sm">
                Average Score
            </p>

            <h2 class="text-4xl font-black mt-3 text-yellow-500">
                87%
            </h2>

        </div>

    </div>

    <!-- CHART + PERFORMANCE -->
    <div class="grid grid-cols-3 gap-6 mb-8">

        <!-- ACTIVITY CHART -->
        <div class="col-span-2 bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">

            <div class="flex items-center justify-between mb-6">

                <div>

                    <h2 class="text-xl font-bold">
                        User Activity
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Weekly student activity overview
                    </p>

                </div>

            </div>

            <!-- FAKE CHART -->
            <div class="flex items-end gap-4 h-64">

                <div class="flex flex-col items-center gap-2">

                    <div class="w-10 h-32 bg-cyan-400 rounded-t-xl"></div>

                    <span class="text-sm text-slate-500">
                        Mon
                    </span>

                </div>

                <div class="flex flex-col items-center gap-2">

                    <div class="w-10 h-40 bg-cyan-500 rounded-t-xl"></div>

                    <span class="text-sm text-slate-500">
                        Tue
                    </span>

                </div>

                <div class="flex flex-col items-center gap-2">

                    <div class="w-10 h-24 bg-cyan-300 rounded-t-xl"></div>

                    <span class="text-sm text-slate-500">
                        Wed
                    </span>

                </div>

                <div class="flex flex-col items-center gap-2">

                    <div class="w-10 h-52 bg-cyan-600 rounded-t-xl"></div>

                    <span class="text-sm text-slate-500">
                        Thu
                    </span>

                </div>

                <div class="flex flex-col items-center gap-2">

                    <div class="w-10 h-44 bg-cyan-500 rounded-t-xl"></div>

                    <span class="text-sm text-slate-500">
                        Fri
                    </span>

                </div>

                <div class="flex flex-col items-center gap-2">

                    <div class="w-10 h-28 bg-cyan-400 rounded-t-xl"></div>

                    <span class="text-sm text-slate-500">
                        Sat
                    </span>

                </div>

                <div class="flex flex-col items-center gap-2">

                    <div class="w-10 h-36 bg-cyan-500 rounded-t-xl"></div>

                    <span class="text-sm text-slate-500">
                        Sun
                    </span>

                </div>

            </div>

        </div>

        <!-- PERFORMANCE -->
        <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">

            <h2 class="text-xl font-bold mb-6">
                Performance
            </h2>

            <!-- SPEAKING -->
            <div class="mb-6">

                <div class="flex items-center justify-between mb-2">

                    <p class="text-sm font-medium text-slate-600">
                        Speaking
                    </p>

                    <span class="text-sm font-bold text-cyan-500">
                        92%
                    </span>

                </div>

                <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden">

                    <div class="w-[92%] h-full bg-cyan-500 rounded-full"></div>

                </div>

            </div>

            <!-- LISTENING -->
            <div class="mb-6">

                <div class="flex items-center justify-between mb-2">

                    <p class="text-sm font-medium text-slate-600">
                        Listening
                    </p>

                    <span class="text-sm font-bold text-green-500">
                        84%
                    </span>

                </div>

                <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden">

                    <div class="w-[84%] h-full bg-green-500 rounded-full"></div>

                </div>

            </div>

            <!-- VOCABULARY -->
            <div>

                <div class="flex items-center justify-between mb-2">

                    <p class="text-sm font-medium text-slate-600">
                        Vocabulary
                    </p>

                    <span class="text-sm font-bold text-yellow-500">
                        76%
                    </span>

                </div>

                <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden">

                    <div class="w-[76%] h-full bg-yellow-500 rounded-full"></div>

                </div>

            </div>

        </div>

    </div>

    <!-- TOP USERS -->
    <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm">

        <div class="px-6 py-5 border-b border-slate-200">

            <h2 class="text-xl font-bold">
                Most Active Users
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-200">

                    <tr>

                        <th class="text-left px-6 py-4 text-sm font-bold text-slate-500">
                            User
                        </th>

                        <th class="text-left px-6 py-4 text-sm font-bold text-slate-500">
                            Practices
                        </th>

                        <th class="text-left px-6 py-4 text-sm font-bold text-slate-500">
                            Missions
                        </th>

                        <th class="text-left px-6 py-4 text-sm font-bold text-slate-500">
                            Average Score
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

                                    A

                                </div>

                                <div>

                                    <h3 class="font-bold">
                                        Usera
                                    </h3>

                                    <p class="text-sm text-slate-500">
                                        Student
                                    </p>

                                </div>

                            </div>

                        </td>

                        <td class="px-6 py-5 text-slate-600">
                            50
                        </td>

                        <td class="px-6 py-5 text-slate-600">
                            20
                        </td>

                        <td class="px-6 py-5">

                            <span
                                class="px-4 py-2 rounded-xl bg-green-500/10 text-green-500 text-sm font-semibold">

                                95%

                            </span>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>
@endsection