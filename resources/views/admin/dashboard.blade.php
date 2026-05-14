@extends('layouts.admin')

@section('content')
    <!-- STATS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- CARD -->
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
                        120
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

        <!-- CARD -->
        <div
            class="rounded-3xl border border-slate-200 dark:border-white/10
            bg-white dark:bg-white/[0.03]
            p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        Total Missions
                    </p>

                    <h2 class="text-4xl font-black mt-3">
                        32
                    </h2>

                </div>

                <div
                    class="w-16 h-16 rounded-2xl
                    bg-pink-500/10 text-pink-400
                    flex items-center justify-center text-3xl">

                    🎯

                </div>

            </div>

        </div>

        <!-- CARD -->
        <div
            class="rounded-3xl border border-slate-200 dark:border-white/10
            bg-white dark:bg-white/[0.03]
            p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        Practice Sessions
                    </p>

                    <h2 class="text-4xl font-black mt-3">
                        890
                    </h2>

                </div>

                <div
                    class="w-16 h-16 rounded-2xl
                    bg-purple-500/10 text-purple-400
                    flex items-center justify-center text-3xl">

                    🎤

                </div>

            </div>

        </div>

        <!-- CARD -->
        <div
            class="rounded-3xl border border-slate-200 dark:border-white/10
            bg-white dark:bg-white/[0.03]
            p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        Active Users
                    </p>

                    <h2 class="text-4xl font-black mt-3 text-green-400">
                        87
                    </h2>

                </div>

                <div
                    class="w-16 h-16 rounded-2xl
                    bg-green-500/10 text-green-400
                    flex items-center justify-center text-3xl">

                    ⚡

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

                <button class="px-5 py-2 rounded-2xl
                    bg-cyan-500/10 text-cyan-400 font-semibold">

                    View All

                </button>

            </div>

            <div class="space-y-4">

                @for ($i = 1; $i <= 5; $i++)
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

                                U

                            </div>

                            <div>

                                <h4 class="font-bold">
                                    User {{ $i }}
                                </h4>

                                <p class="text-sm text-slate-500 dark:text-slate-400">
                                    user{{ $i }}@gmail.com
                                </p>

                            </div>

                        </div>

                        <span
                            class="px-4 py-2 rounded-xl
                            bg-green-500/10 text-green-400
                            text-sm font-semibold">

                            Active

                        </span>

                    </div>
                @endfor

            </div>

        </div>

        <!-- ACTIVITY -->
        <div
            class="rounded-3xl border border-slate-200 dark:border-white/10
            bg-white dark:bg-white/[0.03]
            p-6 shadow-sm">

            <h3 class="text-xl font-black mb-6">
                Activity
            </h3>

            <div class="space-y-5">

                <div class="flex gap-4">

                    <div class="w-3 h-3 rounded-full bg-cyan-400 mt-2"></div>

                    <div>

                        <h4 class="font-semibold">
                            New user registered
                        </h4>

                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            5 minutes ago
                        </p>

                    </div>

                </div>

                <div class="flex gap-4">

                    <div class="w-3 h-3 rounded-full bg-pink-400 mt-2"></div>

                    <div>

                        <h4 class="font-semibold">
                            New mission created
                        </h4>

                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            20 minutes ago
                        </p>

                    </div>

                </div>

                <div class="flex gap-4">

                    <div class="w-3 h-3 rounded-full bg-green-400 mt-2"></div>

                    <div>

                        <h4 class="font-semibold">
                            Practice completed
                        </h4>

                        <p class="text-sm text-slate-500 dark:text-slate-400">
                            1 hour ago
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
