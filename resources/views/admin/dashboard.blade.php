@extends('layouts.admin')

@section('content')
    <!-- STATS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- TOTAL USERS -->
        <div
            class="rounded-3xl border border-slate-200 dark:border-white/10
        bg-white dark:bg-white/[0.03]
        p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        Total Users
                    </p>

                    <h2 class="text-4xl font-black mt-3">
                        {{ $totalUsers }}
                    </h2>

                </div>

                <div
                    class="w-16 h-16 rounded-2xl
                bg-cyan-500/10 text-cyan-400
                flex items-center justify-center text-3xl">

                    👥

                </div>

            </div>

        </div>

        <!-- TOTAL QUESTIONS -->
        <div
            class="rounded-3xl border border-slate-200 dark:border-white/10
        bg-white dark:bg-white/[0.03]
        p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        Total Questions
                    </p>

                    <h2 class="text-4xl font-black mt-3">
                        {{ $totalQuestions }}
                    </h2>

                </div>

                <div
                    class="w-16 h-16 rounded-2xl
                bg-pink-500/10 text-pink-400
                flex items-center justify-center text-3xl">

                    📚

                </div>

            </div>

        </div>

        <!-- TOTAL ATTEMPTS -->
        <div
            class="rounded-3xl border border-slate-200 dark:border-white/10
        bg-white dark:bg-white/[0.03]
        p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        Total Attempts
                    </p>

                    <h2 class="text-4xl font-black mt-3">
                        {{ $totalAttempts }}
                    </h2>

                </div>

                <div
                    class="w-16 h-16 rounded-2xl
                bg-purple-500/10 text-purple-400
                flex items-center justify-center text-3xl">

                    🎯

                </div>

            </div>

        </div>

        <!-- AVERAGE SCORE -->
        <div
            class="rounded-3xl border border-slate-200 dark:border-white/10
        bg-white dark:bg-white/[0.03]
        p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        Average Score
                    </p>

                    <h2 class="text-4xl font-black mt-3 text-green-400">
                        {{ $averageScore }}
                    </h2>

                </div>

                <div
                    class="w-16 h-16 rounded-2xl
                bg-green-500/10 text-green-400
                flex items-center justify-center text-3xl">

                    ⭐

                </div>

            </div>

        </div>

    </div>

    <!-- SECOND SECTION -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-6">

        <!-- RECENT USERS -->
        <div
            class="xl:col-span-2
        rounded-3xl border border-slate-200 dark:border-white/10
        bg-white dark:bg-white/[0.03]
        p-6 shadow-sm">

            <div class="flex items-center justify-between mb-6">

                <div>

                    <h3 class="text-xl font-black">
                        Recent Users
                    </h3>

                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        Latest registered students
                    </p>

                </div>

            </div>

            <div class="space-y-4">

                @forelse($recentUsers as $user)
                    <div
                        class="flex items-center justify-between
                    p-4 rounded-2xl
                    bg-slate-50 dark:bg-white/[0.03]
                    border border-slate-200 dark:border-white/5">

                        <div class="flex items-center gap-4">

                            <div
                                class="w-12 h-12 rounded-2xl
                            bg-gradient-to-br from-cyan-400 to-blue-600
                            flex items-center justify-center
                            text-white font-bold">

                                {{ strtoupper(substr($user->name, 0, 1)) }}

                            </div>

                            <div>

                                <h4 class="font-bold">
                                    {{ $user->name }}
                                </h4>

                                <p class="text-sm text-slate-500 dark:text-slate-400">
                                    {{ $user->email }}
                                </p>

                            </div>

                        </div>

                        <span
                            class="px-4 py-2 rounded-xl
                        bg-green-500/10 text-green-400
                        text-sm font-semibold">

                            {{ ucfirst($user->role) }}

                        </span>

                    </div>

                @empty

                    <div class="p-8 text-center rounded-2xl
                    border border-dashed border-slate-300">

                        <p class="text-slate-500">
                            No users found
                        </p>

                    </div>
                @endforelse

            </div>

        </div>

        <!-- ACTIVITY -->
        <div
            class="rounded-3xl border border-slate-200 dark:border-white/10
        bg-white dark:bg-white/[0.03]
        p-6 shadow-sm">

            <h3 class="text-xl font-black mb-6">
                System Information
            </h3>

            <div class="space-y-5">

                <div class="flex gap-4">

                    <div class="w-3 h-3 rounded-full bg-cyan-400 mt-2"></div>

                    <div>

                        <h4 class="font-semibold">
                            Registered Users
                        </h4>

                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            {{ $totalUsers }} users in database
                        </p>

                    </div>

                </div>

                <div class="flex gap-4">

                    <div class="w-3 h-3 rounded-full bg-pink-400 mt-2"></div>

                    <div>

                        <h4 class="font-semibold">
                            Vocabulary Questions
                        </h4>

                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            {{ $totalQuestions }} questions available
                        </p>

                    </div>

                </div>

                <div class="flex gap-4">

                    <div class="w-3 h-3 rounded-full bg-green-400 mt-2"></div>

                    <div>

                        <h4 class="font-semibold">
                            Pretest Attempts
                        </h4>

                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            {{ $totalAttempts }} attempts recorded
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>
    ```
@endsection
