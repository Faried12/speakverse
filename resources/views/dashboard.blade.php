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

                                Continue Learning

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

        <!-- CONTINUE LEARNING -->
        <section>

            <div class="flex items-center justify-between mb-6">

                <div>

                    <h2 class="text-2xl font-bold">
                        Continue Learning
                    </h2>

                    <p class="text-slate-500 dark:text-slate-400 mt-1">
                        Pick up where you left off.
                    </p>

                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                <!-- CARD -->
                <div
                    class="rounded-[28px] border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur-xl p-6 hover:scale-[1.02] transition-all duration-300">

                    <div class="flex items-center justify-between mb-6">

                        <div class="w-14 h-14 rounded-2xl bg-cyan-500/10 flex items-center justify-center text-2xl">
                            🎤
                        </div>

                        <span class="px-3 py-1 rounded-full bg-green-500/10 text-green-400 text-xs font-medium">
                            Active
                        </span>

                    </div>

                    <h3 class="text-2xl font-bold mb-3">
                        Speaking Practice
                    </h3>

                    <p class="text-slate-500 dark:text-slate-400 leading-relaxed">
                        Improve pronunciation and fluency with guided speaking exercises.
                    </p>

                    <!-- PROGRESS -->
                    <div class="mt-6">

                        <div class="flex justify-between text-sm mb-2">
                            <span class="text-slate-500 dark:text-slate-400">
                                Progress
                            </span>

                            <span class="font-semibold">
                                72%
                            </span>
                        </div>

                        <div class="w-full h-3 rounded-full bg-slate-200 dark:bg-white/10 overflow-hidden">

                            <div class="w-[72%] h-full rounded-full bg-gradient-to-r from-cyan-400 to-blue-500">
                            </div>

                        </div>

                    </div>

                </div>

                <!-- CARD -->
                <div
                    class="rounded-[28px] border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur-xl p-6 hover:scale-[1.02] transition-all duration-300">

                    <div class="flex items-center justify-between mb-6">

                        <div class="w-14 h-14 rounded-2xl bg-purple-500/10 flex items-center justify-center text-2xl">
                            🧠
                        </div>

                        <span class="px-3 py-1 rounded-full bg-yellow-500/10 text-yellow-400 text-xs font-medium">
                            New
                        </span>

                    </div>

                    <h3 class="text-2xl font-bold mb-3">
                        AI Feedback
                    </h3>

                    <p class="text-slate-500 dark:text-slate-400 leading-relaxed">
                        Receive AI-generated feedback for pronunciation and confidence.
                    </p>

                    <button
                        class="mt-6 px-5 py-3 rounded-2xl bg-slate-100 dark:bg-white/10 hover:bg-slate-200 dark:hover:bg-white/15 transition font-medium">

                        Start Practice

                    </button>

                </div>

                <!-- CARD -->
                <div
                    class="rounded-[28px] border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur-xl p-6 hover:scale-[1.02] transition-all duration-300">

                    <div class="flex items-center justify-between mb-6">

                        <div class="w-14 h-14 rounded-2xl bg-orange-500/10 flex items-center justify-center text-2xl">
                            📚
                        </div>

                        <span class="px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-400 text-xs font-medium">
                            Daily
                        </span>

                    </div>

                    <h3 class="text-2xl font-bold mb-3">
                        Vocabulary Builder
                    </h3>

                    <p class="text-slate-500 dark:text-slate-400 leading-relaxed">
                        Learn new vocabulary and practice contextual speaking.
                    </p>

                    <button
                        class="mt-6 px-5 py-3 rounded-2xl bg-slate-100 dark:bg-white/10 hover:bg-slate-200 dark:hover:bg-white/15 transition font-medium">

                        Continue

                    </button>

                </div>

            </div>

        </section>

        <!-- DAILY MISSIONS -->
        <section>

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
                <div
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

        </section>

    </div>

</x-app-layout>
