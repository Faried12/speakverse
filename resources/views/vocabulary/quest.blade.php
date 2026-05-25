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
                bg-emerald-400/10 rounded-full blur-3xl">
            </div>

            <div class="relative z-10">

                <div class="flex flex-col lg:flex-row gap-8 lg:items-center lg:justify-between">

                    <div>

                        <span
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full
                            bg-emerald-500/10 border border-emerald-500/20
                            text-emerald-400 text-sm font-medium">

                            📚 Vocabulary Journey
                        </span>

                        <h1 class="mt-5 text-4xl lg:text-5xl font-black">
                            Vocabulary Quest
                        </h1>

                        <p class="mt-4 text-slate-500 dark:text-slate-400 max-w-2xl">
                            Expand vocabulary mastery, improve word recognition,
                            and strengthen daily English communication.
                        </p>

                    </div>

                    <div class="grid grid-cols-2 gap-4">

                        <div
                            class="rounded-3xl p-5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10">

                            <p class="text-sm text-slate-500">
                                Progress
                            </p>

                            <h3 class="text-3xl font-black text-emerald-400">
                                10%
                            </h3>

                        </div>

                        <div
                            class="rounded-3xl p-5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10">

                            <p class="text-sm text-slate-500">
                                XP Earned
                            </p>

                            <h3 class="text-3xl font-black text-green-400">
                                80
                            </h3>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- CONTENT -->
        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
            <div
                class="rounded-[28px]
                border border-blue-500/30
                bg-white/70 dark:bg-white/5
                backdrop-blur-xl p-6">

                <div class="text-4xl mb-5">
                    📖
                </div>

                <h3 class="text-2xl font-bold">
                    Pre Test
                </h3>

                <p class="mt-2 text-slate-500">
                    Test your vocabulary knowledge before starting the learning journey.
                </p>

                <a href="{{ route('vocabulary.pretest') }}"
                    class="mt-6 w-full py-3 rounded-2xl
                    bg-gradient-to-r from-blue-500 to-cyan-500
                    text-white font-semibold
                    flex items-center justify-center">

                    Start Pre Test

                </a>

            </div>

            <div
                class="rounded-[28px]
                border border-emerald-500/30
                bg-white/70 dark:bg-white/5
                backdrop-blur-xl p-6">

                <div class="text-4xl mb-5">
                    📝
                </div>

                <h3 class="text-2xl font-bold">
                    Daily Words
                </h3>

                <p class="mt-2 text-slate-500">
                    Learn 10 new English words every day.
                </p>

                <button
                    class="mt-6 w-full py-3 rounded-2xl
                    bg-gradient-to-r from-emerald-500 to-green-500
                    text-white font-semibold">

                    Start Learning

                </button>

            </div>

            <div
                class="rounded-[28px]
                border border-slate-200 dark:border-white/10
                bg-white/70 dark:bg-white/5
                backdrop-blur-xl p-6">

                <div class="text-4xl mb-5">
                    🎯
                </div>

                <h3 class="text-2xl font-bold">
                    Word Matching
                </h3>

                <p class="mt-2 text-slate-500">
                    Match words with meanings and synonyms.
                </p>

                <button
                    class="mt-6 w-full py-3 rounded-2xl
                    border border-slate-300 dark:border-white/10">

                    Play Game

                </button>

            </div>

        </div>

    </div>

</x-app-layout>
