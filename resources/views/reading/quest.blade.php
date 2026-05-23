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
                bg-purple-400/10 rounded-full blur-3xl">
            </div>

            <div class="relative z-10">

                <div class="flex flex-col lg:flex-row gap-8 lg:items-center lg:justify-between">

                    <div>

                        <span
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full
                            bg-purple-500/10 border border-purple-500/20
                            text-purple-400 text-sm font-medium">

                            📖 Reading Journey
                        </span>

                        <h1 class="mt-5 text-4xl lg:text-5xl font-black">
                            Reading Quest
                        </h1>

                        <p class="mt-4 text-slate-500 dark:text-slate-400 max-w-2xl">
                            Improve reading comprehension, vocabulary recognition,
                            and critical thinking through interactive passages.
                        </p>

                    </div>

                    <div class="grid grid-cols-2 gap-4">

                        <div
                            class="rounded-3xl p-5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10">

                            <p class="text-sm text-slate-500">
                                Progress
                            </p>

                            <h3 class="text-3xl font-black text-purple-400">
                                15%
                            </h3>

                        </div>

                        <div
                            class="rounded-3xl p-5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10">

                            <p class="text-sm text-slate-500">
                                XP Earned
                            </p>

                            <h3 class="text-3xl font-black text-pink-400">
                                120
                            </h3>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- TIMELINE -->
        <div class="space-y-10">

            <!-- SECTION -->
            <div
                class="rounded-[28px]
                border border-slate-200 dark:border-white/10
                bg-white/70 dark:bg-white/5
                backdrop-blur-xl p-8">

                <h2 class="text-3xl font-black mb-2">
                    Reading Basics
                </h2>

                <p class="text-slate-500 mb-6">
                    Learn basic comprehension and reading techniques.
                </p>

                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">

                    <div class="rounded-3xl border border-purple-500/30 p-6">

                        <div class="text-4xl mb-4">
                            📘
                        </div>

                        <h3 class="text-2xl font-bold">
                            Short Passage
                        </h3>

                        <p class="mt-2 text-slate-500">
                            Read short passages and answer questions.
                        </p>

                        <button
                            class="mt-6 w-full py-3 rounded-2xl
                            bg-gradient-to-r from-purple-500 to-pink-500
                            text-white font-semibold">

                            Start Reading

                        </button>

                    </div>

                    <div class="rounded-3xl border border-slate-200 dark:border-white/10 p-6">

                        <div class="text-4xl mb-4">
                            🧠
                        </div>

                        <h3 class="text-2xl font-bold">
                            Comprehension Quiz
                        </h3>

                        <p class="mt-2 text-slate-500">
                            Answer reading comprehension exercises.
                        </p>

                        <button
                            class="mt-6 w-full py-3 rounded-2xl
                            border border-slate-300 dark:border-white/10">

                            Start Quiz

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
