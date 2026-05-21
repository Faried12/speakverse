<x-app-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- HEADER -->
        <section
            class="relative overflow-hidden rounded-[32px]
            border border-slate-200 dark:border-white/10
            bg-white/70 dark:bg-white/5
            backdrop-blur-2xl
            p-8 lg:p-10 mb-10">

            <div
                class="absolute top-[-120px] right-[-120px]
                w-[280px] h-[280px]
                bg-cyan-400/10 rounded-full blur-3xl">
            </div>

            <div class="relative z-10">

                <div class="flex flex-col lg:flex-row gap-8 lg:items-center lg:justify-between">

                    <div>

                        <span
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full
                            bg-cyan-500/10 border border-cyan-500/20
                            text-cyan-400 text-sm font-medium">

                            🎤 Speaking Journey
                        </span>

                        <h1 class="mt-5 text-4xl lg:text-5xl font-black">
                            Speaking Quest
                        </h1>

                        <p class="mt-4 text-slate-500 dark:text-slate-400 max-w-2xl">
                            Complete speaking missions, improve pronunciation,
                            build confidence, and unlock the next challenge.
                        </p>

                    </div>

                    <div class="grid grid-cols-2 gap-4">

                        <div
                            class="rounded-3xl p-5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10">
                            <p class="text-sm text-slate-500">
                                Progress
                            </p>
                            <h3 class="text-3xl font-black text-cyan-400">
                                35%
                            </h3>
                        </div>

                        <div
                            class="rounded-3xl p-5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10">
                            <p class="text-sm text-slate-500">
                                XP Earned
                            </p>
                            <h3 class="text-3xl font-black text-green-400">
                                540
                            </h3>
                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- TIMELINE -->
        <div class="relative">

            <!-- LINE -->
            <div
                class="hidden md:block absolute left-8 top-0 bottom-0 w-1
                bg-gradient-to-b from-cyan-500 via-blue-500 to-purple-500">
            </div>

            <div class="space-y-14">

                <!-- PRETEST -->
                <div class="relative flex gap-6">

                    <div
                        class="hidden md:flex w-16 h-16 rounded-3xl
                        bg-orange-500 text-white
                        items-center justify-center
                        text-3xl z-10">

                        📝

                    </div>

                    <div class="flex-1">

                        <h2 class="text-3xl font-black">
                            PRE-TEST
                        </h2>

                        <p class="text-slate-500 mb-5">
                            Baseline Speaking Assessment
                        </p>

                        <div
                            class="max-w-md rounded-[28px]
                            border border-slate-200 dark:border-white/10
                            bg-white/70 dark:bg-white/5
                            backdrop-blur-xl p-6">

                            <div
                                class="w-12 h-12 rounded-2xl
                                bg-cyan-500/10 flex items-center justify-center
                                text-2xl mb-5">

                                ▶

                            </div>

                            <h3 class="text-2xl font-bold">
                                Start Pre-Test
                            </h3>

                            <p class="text-slate-500 mt-2">
                                TASK: SPEAKING • +50 XP
                            </p>

                        </div>

                    </div>

                </div>

                <!-- PERSONAL SPEAKING -->
                <div class="relative flex gap-6">

                    <div
                        class="hidden md:flex w-16 h-16 rounded-3xl
                        bg-yellow-500 text-white
                        items-center justify-center
                        text-3xl z-10">

                        📚

                    </div>

                    <div class="flex-1">

                        <h2 class="text-3xl font-black">
                            PERSONAL SPEAKING
                        </h2>

                        <p class="text-slate-500 mb-6">
                            Guided Speaking Activities
                        </p>

                        <div
                            class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                            <!-- MODULE -->
                            <div
                                class="rounded-[28px]
                                border border-cyan-500/40
                                bg-white/70 dark:bg-white/5
                                backdrop-blur-xl p-6 relative">

                                <div
                                    class="absolute right-5 top-5
                                    w-8 h-8 rounded-full
                                    border-2 border-cyan-400
                                    flex items-center justify-center">

                                    ✓

                                </div>

                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-cyan-500/10 flex items-center justify-center
                                    text-xl mb-5">

                                    📖

                                </div>

                                <h3 class="text-2xl font-bold">
                                    Speaking Module
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Learn speaking strategies and improve pronunciation.
                                </p>

                                <span
                                    class="inline-block mt-5 text-cyan-400 font-semibold">
                                    +60 XP
                                </span>

                            </div>

                            <!-- PRACTICE -->
                            <div
                                class="rounded-[28px]
                                border border-slate-200 dark:border-white/10
                                bg-white/70 dark:bg-white/5
                                backdrop-blur-xl p-6">

                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-green-500/10 flex items-center justify-center
                                    text-xl mb-5">

                                    📑

                                </div>

                                <h3 class="text-2xl font-bold">
                                    Comprehension Practice
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Listen to audio and answer speaking questions.
                                </p>

                                <span
                                    class="inline-block mt-5 text-green-400 font-semibold">
                                    +70 XP
                                </span>

                            </div>

                            <!-- LOCKED -->
                            <div
                                class="rounded-[28px]
                                border border-white/10
                                bg-black/30
                                p-6 opacity-60 relative">

                                <div
                                    class="absolute top-5 right-5 text-2xl">

                                    🔒

                                </div>

                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-white/10 flex items-center justify-center
                                    text-xl mb-5">

                                    📘

                                </div>

                                <h3 class="text-2xl font-bold">
                                    Speaking Challenge
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Unlock after completing comprehension.
                                </p>

                                <span
                                    class="inline-block mt-5 text-slate-500 font-semibold">
                                    +85 XP
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- STORY SPEAKING -->
                <div class="relative flex gap-6">

                    <div
                        class="hidden md:flex w-16 h-16 rounded-3xl
                        bg-green-500 text-white
                        items-center justify-center
                        text-3xl z-10">

                        📗

                    </div>

                    <div class="flex-1">

                        <h2 class="text-3xl font-black">
                            STORY SPEAKING
                        </h2>

                        <p class="text-slate-500 mb-6">
                            Practice speaking while listening to stories.
                        </p>

                        <div
                            class="rounded-[28px]
                            border border-slate-200 dark:border-white/10
                            bg-white/70 dark:bg-white/5
                            backdrop-blur-xl p-6">

                            <h3 class="text-2xl font-bold">
                                Adventure in the Forest
                            </h3>

                            <p class="text-slate-500 mt-2">
                                Practice speaking while listening to stories.
                            </p>

                            <button
                                class="mt-6 px-6 py-3 rounded-2xl
                                bg-gradient-to-r from-cyan-500 to-blue-600
                                text-white font-semibold">

                                Continue Speaking

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>