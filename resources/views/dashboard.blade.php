<x-app-layout>

    <div class="space-y-8">

        <!-- HERO -->
        <section
            class="relative overflow-hidden rounded-[32px] border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur-2xl p-8 lg:p-10">

            <!-- Glow -->
            <div class="absolute top-[-120px] right-[-120px] w-[300px] h-[300px] bg-cyan-400/10 rounded-full blur-3xl">
            </div>

            <div class="relative z-10">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                    <!-- LEFT -->
                    <div>

                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-cyan-500/10 border border-cyan-400/20 text-cyan-400 text-sm font-medium mb-5">

                            ✨ Welcome Back

                        </div>

                        <h1 class="text-4xl lg:text-5xl font-black leading-tight text-slate-900 dark:text-white">

                            Hello,
                            {{ implode(' ', array_slice(explode(' ', Auth::user()->name), 0, 2)) }}👋

                        </h1>

                        <p class="mt-4 text-slate-600 dark:text-slate-400 text-lg max-w-2xl leading-relaxed">

                            Continue improving your English speaking skills with
                            interactive practice, missions, and AI-powered feedback.

                        </p>

                        <!-- BUTTONS -->
                        <div class="flex flex-wrap gap-4 mt-8">

                            <button
                                class="px-6 py-4 rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-semibold hover:scale-[1.02] transition-all duration-300 shadow-lg shadow-cyan-500/20">

                                Get Started

                            </button>

                            <button
                                class="px-6 py-4 rounded-2xl border border-slate-300 dark:border-white/10 bg-white dark:bg-white/5 text-slate-700 dark:text-white font-semibold hover:bg-slate-100 dark:hover:bg-white/10 transition">

                                View Progress

                            </button>

                        </div>

                    </div>

                    <!-- RIGHT -->
                    <div class="grid grid-cols-2 gap-5 min-w-[320px]">

                        <!-- XP -->
                        <div
                            class="rounded-3xl border border-slate-200 dark:border-white/10 bg-slate-50 dark:bg-white/5 p-6">

                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-2">
                                Total XP
                            </p>

                            <h3 class="text-4xl font-black text-cyan-400">
                                1,250
                            </h3>

                        </div>

                        <!-- STREAK -->
                        <div
                            class="rounded-3xl border border-slate-200 dark:border-white/10 bg-slate-50 dark:bg-white/5 p-6">

                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-2">
                                Daily Streak
                            </p>

                            <h3 class="text-4xl font-black text-orange-400">
                                12🔥
                            </h3>

                        </div>

                        <!-- LEVEL -->
                        <div
                            class="rounded-3xl border border-slate-200 dark:border-white/10 bg-slate-50 dark:bg-white/5 p-6">

                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-2">
                                Current Level
                            </p>

                            <h3 class="text-3xl font-black">
                                Intermediate
                            </h3>

                        </div>

                        <!-- MISSIONS -->
                        <div
                            class="rounded-3xl border border-slate-200 dark:border-white/10 bg-slate-50 dark:bg-white/5 p-6">

                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-2">
                                Missions Done
                            </p>

                            <h3 class="text-4xl font-black text-green-400">
                                8/12
                            </h3>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- CONTINUE JOURNEY -->
        <section>

            <div class="mb-6">

                <h2 class="text-3xl font-black">
                    Continue Your Journey
                </h2>

                <p class="text-slate-500 dark:text-slate-400 mt-1">
                    Continue your learning path and complete each step.
                </p>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- PRE TEST -->
                <div
                    class="rounded-[30px] border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur-xl p-6 hover:scale-[1.02] hover:shadow-lg hover:shadow-orange-500/10 transition-all duration-300">

                    <div class="flex items-center gap-5">

                        <div
                            class="w-16 h-16 rounded-2xl bg-gradient-to-r from-orange-500 to-red-500 flex items-center justify-center text-white text-3xl">

                            <x-heroicon-o-clipboard-document-check
                                class="w-9 h-9 text-white" />

                        </div>

                        <div class="flex-1">

                            <div class="flex justify-between items-center mb-3">

                                <div>
                                    <p class="text-xs uppercase tracking-widest text-orange-400 font-semibold">
                                        Baseline Assessment
                                    </p>

                                    <h3 class="text-xl font-black">
                                        PRE-TEST
                                    </h3>
                                </div>

                                <span class="font-bold text-slate-400">
                                    0%
                                </span>

                            </div>

                            <div class="h-3 rounded-full bg-slate-200 dark:bg-white/10 overflow-hidden">
                                <div class="h-full w-0 bg-gradient-to-r from-orange-500 to-red-500"></div>
                            </div>

                        </div>

                        <span class="text-slate-400 text-3xl">›</span>

                    </div>

                </div>

                <!-- UNIT 1 -->
                <div
                    class="rounded-[30px] border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur-xl p-6 hover:scale-[1.02] hover:shadow-lg hover:shadow-green-500/10 transition-all duration-300">

                    <div class="flex items-center gap-5">

                        <div
                            class="w-16 h-16 rounded-2xl bg-gradient-to-r from-yellow-400 to-green-500 flex items-center justify-center text-white text-3xl">

                            <x-heroicon-o-book-open
                                class="w-9 h-9 text-white" />

                        </div>

                        <div class="flex-1">

                            <div class="flex justify-between items-center mb-3">

                                <div>
                                    <p class="text-xs uppercase tracking-widest text-green-400 font-semibold">
                                        Unit 1
                                    </p>

                                    <h3 class="text-xl font-black">
                                        Are We Connected to Nature?
                                    </h3>
                                </div>

                                <span class="font-bold text-slate-400">
                                    33%
                                </span>

                            </div>

                            <div class="h-3 rounded-full bg-slate-200 dark:bg-white/10 overflow-hidden">
                                <div class="h-full w-1/3 bg-gradient-to-r from-yellow-400 to-green-500"></div>
                            </div>

                        </div>

                        <span class="text-slate-400 text-3xl">›</span>

                    </div>

                </div>

                <!-- UNIT 2 -->
                <div
                    class="rounded-[30px] border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur-xl p-6 hover:scale-[1.02] hover:shadow-lg hover:shadow-cyan-500/10 transition-all duration-300">

                    <div class="flex items-center gap-5">

                        <div
                            class="w-16 h-16 rounded-2xl bg-gradient-to-r from-green-400 to-cyan-500 flex items-center justify-center text-white text-3xl">

                            <x-heroicon-o-user
                                class="w-9 h-9 text-white" />

                        </div>

                        <div class="flex-1">

                            <div class="flex justify-between items-center mb-3">

                                <div>
                                    <p class="text-xs uppercase tracking-widest text-cyan-400 font-semibold">
                                        Unit 2
                                    </p>

                                    <h3 class="text-xl font-black">
                                        Discovering Ourselves
                                    </h3>
                                </div>

                                <span class="font-bold text-slate-400">
                                    0%
                                </span>

                            </div>

                            <div class="h-3 rounded-full bg-slate-200 dark:bg-white/10 overflow-hidden">
                                <div class="h-full w-0 bg-gradient-to-r from-green-400 to-cyan-500"></div>
                            </div>

                        </div>

                        <span class="text-slate-400 text-3xl">›</span>

                    </div>

                </div>

                <!-- UNIT 3 -->
                <div
                    class="rounded-[30px] border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur-xl p-6 hover:scale-[1.02] hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300">

                    <div class="flex items-center gap-5">

                        <div
                            class="w-16 h-16 rounded-2xl bg-gradient-to-r from-cyan-400 to-blue-500 flex items-center justify-center text-white text-3xl">

                            <x-heroicon-o-chat-bubble-left-right
                                class="w-9 h-9 text-white" />

                        </div>

                        <div class="flex-1">

                            <div class="flex justify-between items-center mb-3">

                                <div>
                                    <p class="text-xs uppercase tracking-widest text-blue-400 font-semibold">
                                        Unit 3
                                    </p>

                                    <h3 class="text-xl font-black">
                                        Why is Water Important?
                                    </h3>
                                </div>

                                <span class="font-bold text-slate-400">
                                    0%
                                </span>

                            </div>

                            <div class="h-3 rounded-full bg-slate-200 dark:bg-white/10 overflow-hidden">
                                <div class="h-full w-0 bg-gradient-to-r from-cyan-400 to-blue-500"></div>
                            </div>

                        </div>

                        <span class="text-slate-400 text-3xl">›</span>

                    </div>

                </div>

                <!-- UNIT 4 -->
                <div
                    class="rounded-[30px] border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur-xl p-6 hover:scale-[1.02] hover:shadow-lg hover:shadow-purple-500/10 transition-all duration-300">

                    <div class="flex items-center gap-5">

                        <div
                            class="w-16 h-16 rounded-2xl bg-gradient-to-r from-blue-500 to-purple-500 flex items-center justify-center text-white text-3xl">

                            <x-heroicon-o-shield-check
                                class="w-9 h-9 text-white" />

                        </div>

                        <div class="flex-1">

                            <div class="flex justify-between items-center mb-3">

                                <div>
                                    <p class="text-xs uppercase tracking-widest text-purple-400 font-semibold">
                                        Unit 4
                                    </p>

                                    <h3 class="text-xl font-black">
                                        Why Should We Live a Healthy Life?
                                    </h3>
                                </div>

                                <span class="font-bold text-slate-400">
                                    0%
                                </span>

                            </div>

                            <div class="h-3 rounded-full bg-slate-200 dark:bg-white/10 overflow-hidden">
                                <div class="h-full w-0 bg-gradient-to-r from-blue-500 to-purple-500"></div>
                            </div>

                        </div>

                        <span class="text-slate-400 text-3xl">›</span>

                    </div>

                </div>

                <!-- POST TEST -->
                <div
                    class="rounded-[30px] border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur-xl p-6 hover:scale-[1.02] hover:shadow-lg hover:shadow-pink-500/10 transition-all duration-300">

                    <div class="flex items-center gap-5">

                        <div
                            class="w-16 h-16 rounded-2xl bg-gradient-to-r from-cyan-400 to-purple-500 flex items-center justify-center text-white text-3xl">

                            <x-heroicon-o-trophy
                                class="w-9 h-9 text-white" />

                        </div>

                        <div class="flex-1">

                            <div class="flex justify-between items-center mb-3">

                                <div>
                                    <p class="text-xs uppercase tracking-widest text-pink-400 font-semibold">
                                        Final Assessment
                                    </p>

                                    <h3 class="text-xl font-black">
                                        POST-TEST
                                    </h3>
                                </div>

                                <span class="font-bold text-slate-400">
                                    0%
                                </span>

                            </div>

                            <div class="h-3 rounded-full bg-slate-200 dark:bg-white/10 overflow-hidden">
                                <div class="h-full w-0 bg-gradient-to-r from-cyan-400 to-purple-500"></div>
                            </div>

                        </div>

                        <span class="text-slate-400 text-3xl">›</span>

                    </div>

                </div>

            </div>

        </section>

        <!-- DAILY MISSIONS -->
        <!-- <section>

            <div class="flex items-center justify-between mb-6">

                <div>

                    <h2 class="text-2xl font-bold">
                        Daily Missions
                    </h2>

                    <p class="text-slate-500 dark:text-slate-400 mt-1">
                        Complete missions to earn XP and improve skills.
                    </p>

                </div>

            </div>

            <div class="space-y-4">

                <!-- MISSION -->
                <!-- <div
                    class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur-xl p-6 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                    <div class="flex items-center gap-5">

                        <div class="w-16 h-16 rounded-2xl bg-cyan-500/10 flex items-center justify-center text-3xl">
                            🎯
                        </div>

                        <div>

                            <h3 class="text-xl font-bold">
                                Complete Speaking Exercise
                            </h3>

                            <p class="text-slate-500 dark:text-slate-400 mt-1">
                                Practice speaking for at least 10 minutes.
                            </p>

                        </div>

                    </div>

                    <div class="flex items-center gap-4">

                        <span class="px-4 py-2 rounded-full bg-green-500/10 text-green-400 text-sm font-medium">

                            +120 XP

                        </span>

                        <button
                            class="px-5 py-3 rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-medium">

                            Start

                        </button>

                    </div>

                </div>

            </div>

        </section> -->

    </div>

</x-app-layout>
