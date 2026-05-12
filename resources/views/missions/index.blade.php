<x-app-layout>

    <div class="space-y-8">

        <!-- HEADER -->
        <section
            class="relative overflow-hidden rounded-[32px]
            border border-slate-200 dark:border-white/10
            bg-white/70 dark:bg-white/5
            backdrop-blur-2xl
            p-8 lg:p-10">

            <!-- GLOW -->
            <div
                class="absolute top-[-100px] right-[-100px]
                w-[250px] h-[250px]
                bg-cyan-400/10 rounded-full blur-3xl">
            </div>

            <div class="relative z-10">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                    <!-- LEFT -->
                    <div>

                        <div
                            class="inline-flex items-center gap-2
                            px-4 py-2 rounded-full
                            bg-cyan-500/10 border border-cyan-400/20
                            text-cyan-400 text-sm font-medium mb-5">

                            🎯 Daily Missions

                        </div>

                        <h1 class="text-4xl lg:text-5xl font-black leading-tight">

                            Complete Missions
                            <br>
                            Earn XP & Level Up 🚀

                        </h1>

                        <p
                            class="mt-5 text-slate-600 dark:text-slate-400
                            text-lg max-w-2xl leading-relaxed">

                            Improve your English skills through interactive
                            daily challenges, pronunciation tasks,
                            speaking practice, and AI-powered exercises.

                        </p>

                    </div>

                    <!-- RIGHT STATS -->
                    <div class="grid grid-cols-2 gap-5 min-w-[320px]">

                        <!-- TOTAL -->
                        <div
                            class="rounded-3xl border border-slate-200 dark:border-white/10
                            bg-slate-50 dark:bg-white/5 p-6">

                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-2">
                                Completed
                            </p>

                            <h3 class="text-4xl font-black text-green-400">
                                8
                            </h3>

                        </div>

                        <!-- XP -->
                        <div
                            class="rounded-3xl border border-slate-200 dark:border-white/10
                            bg-slate-50 dark:bg-white/5 p-6">

                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-2">
                                XP Earned
                            </p>

                            <h3 class="text-4xl font-black text-cyan-400">
                                1,250
                            </h3>

                        </div>

                        <!-- STREAK -->
                        <div
                            class="rounded-3xl border border-slate-200 dark:border-white/10
                            bg-slate-50 dark:bg-white/5 p-6">

                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-2">
                                Daily Streak
                            </p>

                            <h3 class="text-4xl font-black text-orange-400">
                                12🔥
                            </h3>

                        </div>

                        <!-- LEVEL -->
                        <div
                            class="rounded-3xl border border-slate-200 dark:border-white/10
                            bg-slate-50 dark:bg-white/5 p-6">

                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-2">
                                Current Rank
                            </p>

                            <h3 class="text-3xl font-black">
                                Silver
                            </h3>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- MISSIONS LIST -->
        <section>

            <div class="flex items-center justify-between mb-6">

                <div>

                    <h2 class="text-2xl font-bold">
                        Today's Missions
                    </h2>

                    <p class="text-slate-500 dark:text-slate-400 mt-1">
                        Complete all missions to maximize your daily XP.
                    </p>

                </div>

            </div>

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

                <!-- CARD -->
                <div
                    class="group rounded-[32px]
                    border border-slate-200 dark:border-white/10
                    bg-white/70 dark:bg-white/5
                    backdrop-blur-xl
                    p-7
                    hover:scale-[1.01]
                    transition-all duration-300">

                    <div class="flex items-start justify-between gap-5">

                        <div class="flex gap-5">

                            <div
                                class="w-16 h-16 rounded-3xl
                                bg-cyan-500/10
                                flex items-center justify-center
                                text-3xl">

                                🎤

                            </div>

                            <div>

                                <div
                                    class="inline-flex px-3 py-1 rounded-full
                                    bg-green-500/10 text-green-400
                                    text-xs font-semibold mb-4">

                                    ACTIVE

                                </div>

                                <h3 class="text-2xl font-black">
                                    Speaking Challenge
                                </h3>

                                <p class="mt-3 text-slate-500 dark:text-slate-400 leading-relaxed">

                                    Practice speaking for 10 minutes and
                                    improve pronunciation accuracy.

                                </p>

                            </div>

                        </div>

                        <div
                            class="px-4 py-2 rounded-2xl
                            bg-cyan-500/10 text-cyan-400
                            text-sm font-bold whitespace-nowrap">

                            +120 XP

                        </div>

                    </div>

                    <!-- PROGRESS -->
                    <div class="mt-8">

                        <div class="flex justify-between text-sm mb-2">

                            <span class="text-slate-500 dark:text-slate-400">
                                Progress
                            </span>

                            <span class="font-semibold">
                                72%
                            </span>

                        </div>

                        <div
                            class="w-full h-3 rounded-full
                            bg-slate-200 dark:bg-white/10 overflow-hidden">

                            <div
                                class="w-[72%] h-full rounded-full
                                bg-gradient-to-r from-cyan-400 to-blue-500">
                            </div>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <button
                        class="mt-8 w-full py-4 rounded-2xl
                        bg-gradient-to-r from-cyan-500 to-blue-600
                        text-white font-semibold
                        hover:scale-[1.01]
                        transition-all duration-300
                        shadow-lg shadow-cyan-500/20">

                        Continue Mission

                    </button>

                </div>

                <!-- CARD -->
                <div
                    class="group rounded-[32px]
                    border border-slate-200 dark:border-white/10
                    bg-white/70 dark:bg-white/5
                    backdrop-blur-xl
                    p-7
                    hover:scale-[1.01]
                    transition-all duration-300">

                    <div class="flex items-start justify-between gap-5">

                        <div class="flex gap-5">

                            <div
                                class="w-16 h-16 rounded-3xl
                                bg-purple-500/10
                                flex items-center justify-center
                                text-3xl">

                                🧠

                            </div>

                            <div>

                                <div
                                    class="inline-flex px-3 py-1 rounded-full
                                    bg-yellow-500/10 text-yellow-400
                                    text-xs font-semibold mb-4">

                                    NEW

                                </div>

                                <h3 class="text-2xl font-black">
                                    AI Pronunciation Test
                                </h3>

                                <p class="mt-3 text-slate-500 dark:text-slate-400 leading-relaxed">

                                    Speak several English sentences and
                                    receive AI-generated pronunciation feedback.

                                </p>

                            </div>

                        </div>

                        <div
                            class="px-4 py-2 rounded-2xl
                            bg-purple-500/10 text-purple-400
                            text-sm font-bold whitespace-nowrap">

                            +200 XP

                        </div>

                    </div>

                    <!-- PROGRESS -->
                    <div class="mt-8">

                        <div class="flex justify-between text-sm mb-2">

                            <span class="text-slate-500 dark:text-slate-400">
                                Progress
                            </span>

                            <span class="font-semibold">
                                15%
                            </span>

                        </div>

                        <div
                            class="w-full h-3 rounded-full
                            bg-slate-200 dark:bg-white/10 overflow-hidden">

                            <div
                                class="w-[15%] h-full rounded-full
                                bg-gradient-to-r from-purple-400 to-pink-500">
                            </div>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <button
                        class="mt-8 w-full py-4 rounded-2xl
                        border border-slate-300 dark:border-white/10
                        bg-white dark:bg-white/5
                        font-semibold
                        hover:bg-slate-100 dark:hover:bg-white/10
                        transition-all duration-300">

                        Start Mission

                    </button>

                </div>

            </div>

        </section>

    </div>

</x-app-layout>
