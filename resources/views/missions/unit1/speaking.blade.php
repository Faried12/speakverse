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
            bg-purple-400/10 rounded-full blur-3xl">
        </div>

        <div class="relative z-10">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                <div class="flex-1">

                    <div
                        class="inline-flex items-center gap-2
                        px-4 py-2 rounded-full
                        bg-purple-500/10 border border-purple-400/20
                        text-purple-400 text-sm font-medium mb-5">

                        🎤 Speaking Mission

                    </div>

                    <h1
                        class="text-3xl md:text-4xl lg:text-5xl
                        font-black leading-tight">

                        {{ $material->title }}

                    </h1>

                    <p
                        class="mt-5 text-slate-600 dark:text-slate-400
                        text-base md:text-lg
                        max-w-2xl leading-relaxed">

                        Practice your speaking skills by describing the picture below.

                    </p>

                </div>

                <div
                    class="rounded-3xl
                    border border-slate-200 dark:border-white/10
                    bg-slate-50 dark:bg-white/5
                    p-6 w-full lg:w-64">

                    <p class="text-sm text-slate-500 mb-2">
                        Status
                    </p>

                    <h3 class="text-2xl font-black text-green-400">
                        Ready
                    </h3>

                </div>

            </div>

        </div>

    </section>

    <!-- SPEAKING MATERIAL -->
    <section
        class="rounded-[32px]
        border border-slate-200 dark:border-white/10
        bg-white/70 dark:bg-white/5
        backdrop-blur-xl
        p-8">

        <div class="flex items-center gap-3 mb-6">

            <div
                class="w-14 h-14 rounded-2xl
                bg-purple-500/10
                flex items-center justify-center">

                🎤

            </div>

            <div>

                <h2 class="text-2xl font-bold">
                    Speaking Task
                </h2>

                <p class="text-slate-500">
                    Observe the picture and speak clearly.
                </p>

            </div>

        </div>

        @if($material->instruction)
            <div
                class="mb-6 p-4 rounded-2xl
                bg-purple-500/10
                border border-purple-500/20">

                <p class="text-purple-400 font-medium">
                    {{ $material->instruction }}
                </p>

            </div>
        @endif

        <!-- IMAGE -->
        @if($material->image)
            <div class="mb-8">

                <img
                    src="{{ asset('storage/'.$material->image) }}"
                    class="w-full max-w-3xl mx-auto
                    rounded-3xl shadow-lg">

            </div>
        @endif

    </section>

    <!-- START EXCERCISE -->
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
            href="{{ route('student.speaking.quiz') }}"
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