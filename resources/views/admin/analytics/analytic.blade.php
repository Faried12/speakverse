@extends('layouts.admin')

@section('content')
    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5 mb-8">

        <div>

            <h1 class="text-3xl lg:text-4xl font-black leading-tight">
                Analytics
            </h1>

            <p class="mt-2 text-slate-500 dark:text-slate-400">
                Monitor platform performance and student activity
            </p>

        </div>

    </div>

    <!-- STATS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

        <!-- TOTAL USERS -->
        <div
            class="relative overflow-hidden
            rounded-[30px]
            bg-white dark:bg-white/[0.03]
            border border-slate-200 dark:border-white/10
            p-6 shadow-sm">

            <div
                class="absolute top-0 right-0
                w-32 h-32
                bg-cyan-500/10
                rounded-full blur-3xl">
            </div>

            <div class="relative z-10">

                <div
                    class="w-14 h-14 rounded-2xl
                    bg-slate-100 dark:bg-white/5
                    flex items-center justify-center
                    text-2xl mb-5">

                    👥

                </div>

                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">
                    Total Users
                </p>

                <h2 class="text-5xl font-black mt-3">
                    120
                </h2>

                <p class="text-sm text-green-400 mt-3 font-semibold">
                    +12% this month
                </p>

            </div>

        </div>

        <!-- PRACTICES -->
        <div
            class="relative overflow-hidden
            rounded-[30px]
            bg-white dark:bg-white/[0.03]
            border border-slate-200 dark:border-white/10
            p-6 shadow-sm">

            <div
                class="absolute top-0 right-0
                w-32 h-32
                bg-cyan-500/10
                rounded-full blur-3xl">
            </div>

            <div class="relative z-10">

                <div
                    class="w-14 h-14 rounded-2xl
                    bg-cyan-500/10
                    text-cyan-400
                    flex items-center justify-center
                    text-2xl mb-5">

                    🎤

                </div>

                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">
                    Practices Completed
                </p>

                <h2 class="text-5xl font-black mt-3 text-cyan-400">
                    890
                </h2>

                <p class="text-sm text-green-400 mt-3 font-semibold">
                    +28% this week
                </p>

            </div>

        </div>

        <!-- MISSIONS -->
        <div
            class="relative overflow-hidden
            rounded-[30px]
            bg-white dark:bg-white/[0.03]
            border border-slate-200 dark:border-white/10
            p-6 shadow-sm">

            <div
                class="absolute top-0 right-0
                w-32 h-32
                bg-green-500/10
                rounded-full blur-3xl">
            </div>

            <div class="relative z-10">

                <div
                    class="w-14 h-14 rounded-2xl
                    bg-green-500/10
                    text-green-400
                    flex items-center justify-center
                    text-2xl mb-5">

                    🎯

                </div>

                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">
                    Missions Completed
                </p>

                <h2 class="text-5xl font-black mt-3 text-green-400">
                    540
                </h2>

                <p class="text-sm text-green-400 mt-3 font-semibold">
                    +18% this month
                </p>

            </div>

        </div>

        <!-- AVG SCORE -->
        <div
            class="relative overflow-hidden
            rounded-[30px]
            bg-white dark:bg-white/[0.03]
            border border-slate-200 dark:border-white/10
            p-6 shadow-sm">

            <div
                class="absolute top-0 right-0
                w-32 h-32
                bg-yellow-500/10
                rounded-full blur-3xl">
            </div>

            <div class="relative z-10">

                <div
                    class="w-14 h-14 rounded-2xl
                    bg-yellow-500/10
                    text-yellow-400
                    flex items-center justify-center
                    text-2xl mb-5">

                    ⭐

                </div>

                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">
                    Average Score
                </p>

                <h2 class="text-5xl font-black mt-3 text-yellow-400">
                    87%
                </h2>

                <p class="text-sm text-green-400 mt-3 font-semibold">
                    Excellent performance
                </p>

            </div>

        </div>

    </div>

    <!-- CHART + PERFORMANCE -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-8">

        <!-- ACTIVITY -->
        <div
            class="xl:col-span-2
            rounded-[32px]
            bg-white dark:bg-white/[0.03]
            border border-slate-200 dark:border-white/10
            p-6 lg:p-8 shadow-sm">

            <!-- TITLE -->
            <div class="flex items-center justify-between mb-8">

                <div>

                    <h2 class="text-2xl font-black">
                        User Activity
                    </h2>

                    <p class="mt-2 text-slate-500 dark:text-slate-400">
                        Weekly student activity overview
                    </p>

                </div>

                <div
                    class="hidden sm:flex items-center gap-2
                    px-4 py-2 rounded-2xl
                    bg-cyan-500/10 text-cyan-400
                    text-sm font-bold">

                    <span class="w-2 h-2 rounded-full bg-cyan-400"></span>

                    Active Growth

                </div>

            </div>

            <!-- CHART -->
            <div class="flex items-end justify-between gap-3 h-[320px]">

                <!-- MON -->
                <div class="flex flex-col items-center flex-1">

                    <div
                        class="w-full max-w-[58px]
                        h-24 rounded-t-[20px]
                        bg-gradient-to-t from-cyan-500 to-cyan-300
                        shadow-lg shadow-cyan-500/20">
                    </div>

                    <span class="mt-4 text-sm font-semibold text-slate-500 dark:text-slate-400">
                        Mon
                    </span>

                </div>

                <!-- TUE -->
                <div class="flex flex-col items-center flex-1">

                    <div
                        class="w-full max-w-[58px]
                        h-40 rounded-t-[20px]
                        bg-gradient-to-t from-sky-600 to-cyan-400
                        shadow-lg shadow-sky-500/20">
                    </div>

                    <span class="mt-4 text-sm font-semibold text-slate-500 dark:text-slate-400">
                        Tue
                    </span>

                </div>

                <!-- WED -->
                <div class="flex flex-col items-center flex-1">

                    <div
                        class="w-full max-w-[58px]
                        h-28 rounded-t-[20px]
                        bg-gradient-to-t from-cyan-400 to-cyan-200
                        shadow-lg shadow-cyan-400/20">
                    </div>

                    <span class="mt-4 text-sm font-semibold text-slate-500 dark:text-slate-400">
                        Wed
                    </span>

                </div>

                <!-- THU -->
                <div class="flex flex-col items-center flex-1">

                    <div
                        class="w-full max-w-[58px]
                        h-60 rounded-t-[20px]
                        bg-gradient-to-t from-cyan-700 to-cyan-400
                        shadow-xl shadow-cyan-600/30">
                    </div>

                    <span class="mt-4 text-sm font-semibold text-slate-500 dark:text-slate-400">
                        Thu
                    </span>

                </div>

                <!-- FRI -->
                <div class="flex flex-col items-center flex-1">

                    <div
                        class="w-full max-w-[58px]
                        h-48 rounded-t-[20px]
                        bg-gradient-to-t from-cyan-600 to-cyan-300
                        shadow-lg shadow-cyan-500/20">
                    </div>

                    <span class="mt-4 text-sm font-semibold text-slate-500 dark:text-slate-400">
                        Fri
                    </span>

                </div>

                <!-- SAT -->
                <div class="flex flex-col items-center flex-1">

                    <div
                        class="w-full max-w-[58px]
                        h-32 rounded-t-[20px]
                        bg-gradient-to-t from-cyan-500 to-cyan-300
                        shadow-lg shadow-cyan-400/20">
                    </div>

                    <span class="mt-4 text-sm font-semibold text-slate-500 dark:text-slate-400">
                        Sat
                    </span>

                </div>

                <!-- SUN -->
                <div class="flex flex-col items-center flex-1">

                    <div
                        class="w-full max-w-[58px]
                        h-44 rounded-t-[20px]
                        bg-gradient-to-t from-sky-600 to-cyan-400
                        shadow-lg shadow-sky-500/20">
                    </div>

                    <span class="mt-4 text-sm font-semibold text-slate-500 dark:text-slate-400">
                        Sun
                    </span>

                </div>

            </div>

        </div>

        <!-- PERFORMANCE -->
        <div
            class="rounded-[32px]
            bg-white dark:bg-white/[0.03]
            border border-slate-200 dark:border-white/10
            p-6 lg:p-8 shadow-sm">

            <!-- TITLE -->
            <div class="mb-8">

                <h2 class="text-2xl font-black">
                    Performance
                </h2>

                <p class="mt-2 text-slate-500 dark:text-slate-400">
                    Student learning progress
                </p>

            </div>

            <!-- SPEAKING -->
            <div class="mb-8">

                <div class="flex items-center justify-between mb-3">

                    <div class="flex items-center gap-3">

                        <div
                            class="w-10 h-10 rounded-2xl
                            bg-cyan-500/10
                            text-cyan-400
                            flex items-center justify-center">

                            🎤

                        </div>

                        <p class="font-bold">
                            Speaking
                        </p>

                    </div>

                    <span class="text-cyan-400 font-black text-lg">
                        92%
                    </span>

                </div>

                <div class="w-full h-4 rounded-full
                    bg-slate-100 dark:bg-white/5 overflow-hidden">

                    <div
                        class="h-full w-[92%]
                        rounded-full
                        bg-gradient-to-r from-cyan-400 to-cyan-600">
                    </div>

                </div>

            </div>

            <!-- LISTENING -->
            <div class="mb-8">

                <div class="flex items-center justify-between mb-3">

                    <div class="flex items-center gap-3">

                        <div
                            class="w-10 h-10 rounded-2xl
                            bg-green-500/10
                            text-green-400
                            flex items-center justify-center">

                            🎧

                        </div>

                        <p class="font-bold">
                            Listening
                        </p>

                    </div>

                    <span class="text-green-400 font-black text-lg">
                        84%
                    </span>

                </div>

                <div class="w-full h-4 rounded-full
                    bg-slate-100 dark:bg-white/5 overflow-hidden">

                    <div
                        class="h-full w-[84%]
                        rounded-full
                        bg-gradient-to-r from-green-400 to-green-600">
                    </div>

                </div>

            </div>

            <!-- VOCABULARY -->
            <div class="mb-8">

                <div class="flex items-center justify-between mb-3">

                    <div class="flex items-center gap-3">

                        <div
                            class="w-10 h-10 rounded-2xl
                            bg-yellow-500/10
                            text-yellow-400
                            flex items-center justify-center">

                            📚

                        </div>

                        <p class="font-bold">
                            Vocabulary
                        </p>

                    </div>

                    <span class="text-yellow-400 font-black text-lg">
                        76%
                    </span>

                </div>

                <div class="w-full h-4 rounded-full
                    bg-slate-100 dark:bg-white/5 overflow-hidden">

                    <div
                        class="h-full w-[76%]
                        rounded-full
                        bg-gradient-to-r from-yellow-400 to-yellow-500">
                    </div>

                </div>

            </div>

            <!-- GRAMMAR -->
            <div>

                <div class="flex items-center justify-between mb-3">

                    <div class="flex items-center gap-3">

                        <div
                            class="w-10 h-10 rounded-2xl
                            bg-purple-500/10
                            text-purple-400
                            flex items-center justify-center">

                            ✍️

                        </div>

                        <p class="font-bold">
                            Grammar
                        </p>

                    </div>

                    <span class="text-purple-400 font-black text-lg">
                        81%
                    </span>

                </div>

                <div class="w-full h-4 rounded-full
                    bg-slate-100 dark:bg-white/5 overflow-hidden">

                    <div
                        class="h-full w-[81%]
                        rounded-full
                        bg-gradient-to-r from-purple-400 to-purple-600">
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- TOP USERS -->
    <div
        class="rounded-[32px]
        overflow-hidden
        bg-white dark:bg-white/[0.03]
        border border-slate-200 dark:border-white/10
        shadow-sm">

        <!-- HEADER -->
        <div class="px-6 lg:px-8 py-6
            border-b border-slate-200 dark:border-white/10">

            <div class="flex items-center justify-between">

                <div>

                    <h2 class="text-2xl font-black">
                        Most Active Users
                    </h2>

                    <p class="mt-2 text-slate-500 dark:text-slate-400">
                        Top performing students this week
                    </p>

                </div>

                <div
                    class="hidden sm:flex items-center gap-2
                    px-4 py-2 rounded-2xl
                    bg-green-500/10
                    text-green-400
                    text-sm font-bold">

                    🟢 Active

                </div>

            </div>

        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">

            <table class="w-full min-w-[800px]">

                <!-- HEAD -->
                <thead
                    class="bg-slate-50 dark:bg-white/[0.03]
                    border-b border-slate-200 dark:border-white/10">

                    <tr>

                        <th class="text-left px-8 py-5 text-sm font-black text-slate-500 dark:text-slate-400">
                            User
                        </th>

                        <th class="text-left px-8 py-5 text-sm font-black text-slate-500 dark:text-slate-400">
                            Practices
                        </th>

                        <th class="text-left px-8 py-5 text-sm font-black text-slate-500 dark:text-slate-400">
                            Missions
                        </th>

                        <th class="text-left px-8 py-5 text-sm font-black text-slate-500 dark:text-slate-400">
                            Average Score
                        </th>

                    </tr>

                </thead>

                <!-- BODY -->
                <tbody>

                    <!-- USER -->
                    <tr
                        class="border-b border-slate-100 dark:border-white/5
                        hover:bg-slate-50 dark:hover:bg-white/[0.02]
                        transition-all duration-200">

                        <!-- USER -->
                        <td class="px-8 py-6">

                            <div class="flex items-center gap-5">

                                <div
                                    class="w-16 h-16 rounded-3xl
                                    bg-gradient-to-br from-cyan-400 via-sky-500 to-blue-600
                                    flex items-center justify-center
                                    text-white text-xl font-black
                                    shadow-xl shadow-cyan-500/20">

                                    A

                                </div>

                                <div>

                                    <h3 class="font-black text-lg">
                                        Usera
                                    </h3>

                                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                                        Student
                                    </p>

                                </div>

                            </div>

                        </td>

                        <!-- PRACTICES -->
                        <td class="px-8 py-6 font-semibold">
                            50
                        </td>

                        <!-- MISSIONS -->
                        <td class="px-8 py-6 font-semibold">
                            20
                        </td>

                        <!-- SCORE -->
                        <td class="px-8 py-6">

                            <span
                                class="px-5 py-3 rounded-2xl
                                bg-green-500/10
                                text-green-400
                                text-sm font-bold">

                                95%

                            </span>

                        </td>

                    </tr>

                    <!-- USER -->
                    <tr
                        class="hover:bg-slate-50 dark:hover:bg-white/[0.02]
                        transition-all duration-200">

                        <!-- USER -->
                        <td class="px-8 py-6">

                            <div class="flex items-center gap-5">

                                <div
                                    class="w-16 h-16 rounded-3xl
                                    bg-gradient-to-br from-pink-400 to-purple-600
                                    flex items-center justify-center
                                    text-white text-xl font-black
                                    shadow-xl shadow-pink-500/20">

                                    M

                                </div>

                                <div>

                                    <h3 class="font-black text-lg">
                                        Michael
                                    </h3>

                                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                                        Student
                                    </p>

                                </div>

                            </div>

                        </td>

                        <!-- PRACTICES -->
                        <td class="px-8 py-6 font-semibold">
                            42
                        </td>

                        <!-- MISSIONS -->
                        <td class="px-8 py-6 font-semibold">
                            18
                        </td>

                        <!-- SCORE -->
                        <td class="px-8 py-6">

                            <span
                                class="px-5 py-3 rounded-2xl
                                bg-cyan-500/10
                                text-cyan-400
                                text-sm font-bold">

                                91%

                            </span>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>
@endsection
