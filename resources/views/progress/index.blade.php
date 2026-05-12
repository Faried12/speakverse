<x-app-layout>

    <div class="space-y-8">

        <!-- HERO -->
        <section
            class="relative overflow-hidden rounded-[32px]
            border border-slate-200 dark:border-white/10
            bg-white/70 dark:bg-white/5
            backdrop-blur-2xl
            p-8 lg:p-10">

            <!-- GLOW -->
            <div
                class="absolute top-[-120px] right-[-120px]
                w-[280px] h-[280px]
                bg-cyan-400/10 rounded-full blur-3xl">
            </div>

            <div class="relative z-10">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-10">

                    <!-- LEFT -->
                    <div>

                        <div
                            class="inline-flex items-center gap-2
                            px-4 py-2 rounded-full
                            bg-cyan-500/10 border border-cyan-400/20
                            text-cyan-400 text-sm font-medium mb-5">

                            📈 Learning Progress

                        </div>

                        <h1 class="text-4xl lg:text-5xl font-black leading-tight">

                            Track Your
                            <br>
                            English Journey 🚀

                        </h1>

                        <p
                            class="mt-5 text-slate-600 dark:text-slate-400
                            text-lg max-w-2xl leading-relaxed">

                            Monitor speaking performance, pronunciation score,
                            fluency improvement, completed missions,
                            and overall learning progress.

                        </p>

                    </div>

                    <!-- RIGHT STATS -->
                    <div class="grid grid-cols-2 gap-5 min-w-[320px]">

                        <!-- TOTAL XP -->
                        <div
                            class="rounded-3xl border border-slate-200 dark:border-white/10
                            bg-slate-50 dark:bg-white/5 p-6">

                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-2">
                                Total XP
                            </p>

                            <h3 class="text-4xl font-black text-cyan-400">
                                5,280
                            </h3>

                        </div>

                        <!-- LEVEL -->
                        <div
                            class="rounded-3xl border border-slate-200 dark:border-white/10
                            bg-slate-50 dark:bg-white/5 p-6">

                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-2">
                                Current Level
                            </p>

                            <h3 class="text-3xl font-black">
                                Advanced
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
                                16🔥
                            </h3>

                        </div>

                        <!-- ACCURACY -->
                        <div
                            class="rounded-3xl border border-slate-200 dark:border-white/10
                            bg-slate-50 dark:bg-white/5 p-6">

                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-2">
                                Accuracy
                            </p>

                            <h3 class="text-4xl font-black text-green-400">
                                92%
                            </h3>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- PROGRESS OVERVIEW -->
        <section>

            <div class="mb-6">

                <h2 class="text-2xl font-bold">
                    Weekly Progress
                </h2>

                <p class="text-slate-500 dark:text-slate-400 mt-1">
                    Your speaking improvement over the last 7 days.
                </p>

            </div>

            <div
                class="rounded-[32px]
                border border-slate-200 dark:border-white/10
                bg-white/70 dark:bg-white/5
                backdrop-blur-xl
                p-8">

                <!-- GRAPH -->
                <div class="space-y-6">

                    <!-- BAR -->
                    <div>

                        <div class="flex justify-between mb-2 text-sm">

                            <span class="font-medium">
                                Monday
                            </span>

                            <span class="text-cyan-400 font-bold">
                                68%
                            </span>

                        </div>

                        <div
                            class="w-full h-4 rounded-full
                            bg-slate-200 dark:bg-white/10 overflow-hidden">

                            <div
                                class="w-[68%] h-full rounded-full
                                bg-gradient-to-r from-cyan-400 to-blue-500">
                            </div>

                        </div>

                    </div>

                    <!-- BAR -->
                    <div>

                        <div class="flex justify-between mb-2 text-sm">

                            <span class="font-medium">
                                Tuesday
                            </span>

                            <span class="text-green-400 font-bold">
                                75%
                            </span>

                        </div>

                        <div
                            class="w-full h-4 rounded-full
                            bg-slate-200 dark:bg-white/10 overflow-hidden">

                            <div
                                class="w-[75%] h-full rounded-full
                                bg-gradient-to-r from-green-400 to-emerald-500">
                            </div>

                        </div>

                    </div>

                    <!-- BAR -->
                    <div>

                        <div class="flex justify-between mb-2 text-sm">

                            <span class="font-medium">
                                Wednesday
                            </span>

                            <span class="text-purple-400 font-bold">
                                82%
                            </span>

                        </div>

                        <div
                            class="w-full h-4 rounded-full
                            bg-slate-200 dark:bg-white/10 overflow-hidden">

                            <div
                                class="w-[82%] h-full rounded-full
                                bg-gradient-to-r from-purple-400 to-pink-500">
                            </div>

                        </div>

                    </div>

                    <!-- BAR -->
                    <div>

                        <div class="flex justify-between mb-2 text-sm">

                            <span class="font-medium">
                                Thursday
                            </span>

                            <span class="text-orange-400 font-bold">
                                91%
                            </span>

                        </div>

                        <div
                            class="w-full h-4 rounded-full
                            bg-slate-200 dark:bg-white/10 overflow-hidden">

                            <div
                                class="w-[91%] h-full rounded-full
                                bg-gradient-to-r from-orange-400 to-red-500">
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- ACHIEVEMENTS -->
        <section>

            <div class="mb-6">

                <h2 class="text-2xl font-bold">
                    Achievements
                </h2>

                <p class="text-slate-500 dark:text-slate-400 mt-1">
                    Milestones you have unlocked during your learning journey.
                </p>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <!-- CARD -->
                <div
                    class="rounded-[30px]
                    border border-slate-200 dark:border-white/10
                    bg-white/70 dark:bg-white/5
                    backdrop-blur-xl
                    p-7 text-center
                    hover:scale-[1.02]
                    transition-all duration-300">

                    <div
                        class="w-20 h-20 mx-auto rounded-3xl
                        bg-cyan-500/10
                        flex items-center justify-center
                        text-4xl mb-5">

                        🏆

                    </div>

                    <h3 class="text-xl font-black mb-2">
                        First Mission
                    </h3>

                    <p class="text-slate-500 dark:text-slate-400 text-sm">
                        Completed your first speaking mission.
                    </p>

                </div>

                <!-- CARD -->
                <div
                    class="rounded-[30px]
                    border border-slate-200 dark:border-white/10
                    bg-white/70 dark:bg-white/5
                    backdrop-blur-xl
                    p-7 text-center
                    hover:scale-[1.02]
                    transition-all duration-300">

                    <div
                        class="w-20 h-20 mx-auto rounded-3xl
                        bg-orange-500/10
                        flex items-center justify-center
                        text-4xl mb-5">

                        🔥

                    </div>

                    <h3 class="text-xl font-black mb-2">
                        15 Day Streak
                    </h3>

                    <p class="text-slate-500 dark:text-slate-400 text-sm">
                        Practiced consistently for 15 days.
                    </p>

                </div>

                <!-- CARD -->
                <div
                    class="rounded-[30px]
                    border border-slate-200 dark:border-white/10
                    bg-white/70 dark:bg-white/5
                    backdrop-blur-xl
                    p-7 text-center
                    hover:scale-[1.02]
                    transition-all duration-300">

                    <div
                        class="w-20 h-20 mx-auto rounded-3xl
                        bg-purple-500/10
                        flex items-center justify-center
                        text-4xl mb-5">

                        🎙️

                    </div>

                    <h3 class="text-xl font-black mb-2">
                        Pronunciation Master
                    </h3>

                    <p class="text-slate-500 dark:text-slate-400 text-sm">
                        Reached pronunciation accuracy above 90%.
                    </p>

                </div>

                <!-- CARD -->
                <div
                    class="rounded-[30px]
                    border border-slate-200 dark:border-white/10
                    bg-white/70 dark:bg-white/5
                    backdrop-blur-xl
                    p-7 text-center
                    hover:scale-[1.02]
                    transition-all duration-300">

                    <div
                        class="w-20 h-20 mx-auto rounded-3xl
                        bg-green-500/10
                        flex items-center justify-center
                        text-4xl mb-5">

                        🚀

                    </div>

                    <h3 class="text-xl font-black mb-2">
                        Advanced Speaker
                    </h3>

                    <p class="text-slate-500 dark:text-slate-400 text-sm">
                        Achieved advanced speaking level.
                    </p>

                </div>

            </div>

        </section>

    </div>

</x-app-layout>
