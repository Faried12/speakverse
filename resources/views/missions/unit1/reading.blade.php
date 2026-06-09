<x-app-layout>

<div class="space-y-8">
    

    <!-- HEADER -->
    <section
        class="relative overflow-hidden rounded-[32px]
        border border-slate-200 dark:border-white/10
        bg-white/70 dark:bg-white/5
        backdrop-blur-2xl
        p-6 md:p-8 lg:p-10">

        <div
            class="absolute top-[-100px] right-[-100px]
            w-[250px] h-[250px]
            bg-cyan-400/10 rounded-full blur-3xl">
        </div>

        <div class="relative z-10">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                <!-- LEFT -->
                <div class="flex-1">

                    <div
                        class="inline-flex items-center gap-2
                        px-4 py-2 rounded-full
                        bg-cyan-500/10 border border-cyan-400/20
                        text-cyan-400 text-sm font-medium mb-5">

                        📖 Reading Mission

                    </div>

                    <h1
                        class="text-3xl md:text-4xl lg:text-5xl
                        font-black leading-tight">

                        Unit 1 Reading
                        <br>
                        Let's Read & Learn 🚀

                    </h1>

                    <p
                        class="mt-5 text-slate-600 dark:text-slate-400
                        text-base md:text-lg
                        max-w-2xl leading-relaxed">

                        Read the passage carefully and understand the main ideas before starting the exercise.

                    </p>

                </div>

                <!-- RIGHT STATS -->
                <div
                    class="grid grid-cols-2 gap-4
                    w-full lg:w-[340px]">

                    <div
                        class="rounded-3xl
                        border border-slate-200 dark:border-white/10
                        bg-slate-50 dark:bg-white/5
                        p-5">

                        <p class="text-sm text-slate-500 mb-2">
                            Questions
                        </p>

                        <h3 class="text-3xl font-black text-cyan-400">
                            {{ $material->questions->count() }}
                        </h3>

                    </div>

                    <div
                        class="rounded-3xl
                        border border-slate-200 dark:border-white/10
                        bg-slate-50 dark:bg-white/5
                        p-5">

                        <p class="text-sm text-slate-500 mb-2">
                            Duration
                        </p>

                        <h3 class="text-3xl font-black text-blue-400">
                            10m
                        </h3>

                    </div>

                    <div
                        class="rounded-3xl
                        border border-slate-200 dark:border-white/10
                        bg-slate-50 dark:bg-white/5
                        p-5">

                        <p class="text-sm text-slate-500 mb-2">
                            Level
                        </p>

                        <h3 class="text-2xl font-black text-orange-400">
                            Basic
                        </h3>

                    </div>

                    <div
                        class="rounded-3xl
                        border border-slate-200 dark:border-white/10
                        bg-slate-50 dark:bg-white/5
                        p-5">

                        <p class="text-sm text-slate-500 mb-2">
                            Status
                        </p>

                        <h3 class="text-2xl font-black text-green-400">
                            Ready
                        </h3>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- READING MATERIAL -->
    <section
        class="rounded-[32px]
        border border-slate-200 dark:border-white/10
        bg-white/70 dark:bg-white/5
        backdrop-blur-xl
        p-8">

        <div class="flex items-center gap-3 mb-6">

            <div
                class="w-14 h-14 rounded-2xl
                bg-cyan-500/10
                flex items-center justify-center">

                <x-heroicon-o-book-open
                    class="w-7 h-7 text-cyan-400" />

            </div>

            <div>

                <h2 class="text-2xl font-bold">
                    Reading Material
                </h2>

                <p class="text-slate-500">
                    Read the passage below carefully.
                </p>

            </div>

        </div>

        <!-- NANTI DIGANTI DATA DATABASE -->
        <h3 class="text-2xl font-bold mb-4">
            {{ $material->title }}
        </h3>

        @if($material->instruction)
            <div>

                <p class="text-cyan-400 font-medium">
                    {{ $material->instruction }}
                </p>

            </div>
        @endif

        <div
            class="leading-8 text-slate-700 dark:text-slate-300 whitespace-pre-line">

            {{ $material->passage }}

        </div>

    </section>

    <!-- START EXERCISE -->
    <section
        class="rounded-[32px]
        border border-slate-200 dark:border-white/10
        bg-white/70 dark:bg-white/5
        backdrop-blur-xl
        p-8">

        <h2 class="text-2xl font-bold">
            Ready for the Exercise?
        </h2>

        <p class="text-slate-500 mt-2">
            Once you finish reading the passage, continue to answer the questions.
        </p>

        <a
            href="{{ route('student.reading.quiz') }}"
            class="mt-6 inline-flex items-center justify-center
            w-full py-4 rounded-2xl

            bg-gradient-to-r
            from-cyan-500
            to-blue-600

            text-white font-semibold

            hover:scale-[1.02]
            transition-all duration-300
            shadow-lg shadow-cyan-500/20">

            Start Exercise

        </a>

    </section>

</div>

</x-app-layout>