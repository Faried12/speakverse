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
                            daily challenges, listening exercises, reading comprehension, writing prompts, and speaking practice with AI-powered exercises.

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

        <!-- TIMELINE -->
        <div class="relative">

            <!-- LINE -->
            <div
                class="absolute left-7 lg:left-8
                top-8
                bottom-[250px]
                w-[4px]
                bg-slate-500 dark:bg-slate-700">
            </div>
            <div class="space-y-14">

                <!-- PRETEST -->
                <div class="relative flex gap-6">

                    <div
                        class="w-16 h-16 rounded-2xl bg-gradient-to-r from-orange-500 to-red-500 flex items-center justify-center text-white text-3xl">

                        <x-heroicon-o-clipboard-document-check
                        class="w-9 h-9 text-white" />

                    </div>

                    <div class="flex-1 min-w-0">

                        <h2 class="text-2xl lg:text-3xl font-black">
                            PRE-TEST
                        </h2>

                        <p class="text-slate-500 mb-5">
                            Baseline Assessment
                        </p>

                        <a href="{{ route('missions.pretest') }}"
                            class="group block w-full lg:max-w-md text-left

                            rounded-[28px]
                            border border-slate-200 dark:border-white/10
                            bg-white/70 dark:bg-white/5
                            backdrop-blur-xl p-6

                            hover:-translate-y-1
                            hover:shadow-xl
                            hover:shadow-cyan-500/10
                            hover:border-cyan-400/30

                            active:scale-[0.98]

                            transition-all duration-300">

                            <!-- ICON -->
                            <div
                                class="w-12 h-12 rounded-2xl
                                bg-cyan-500/10
                                border border-cyan-500/20
                                flex items-center justify-center
                                mb-5

                                group-hover:bg-cyan-500/20
                                transition-all duration-300">

                                <x-heroicon-o-play
                                    class="w-6 h-6 text-cyan-400
                                    group-hover:scale-110
                                    transition-all duration-300" />

                            </div>

                            <!-- TITLE -->
                            <h3
                                class="text-xl lg:text-2xl font-bold
                                transition-colors duration-300">

                                Start Pre-Test

                            </h3>

                            <!-- DESCRIPTION -->
                            <!-- <p class="text-slate-500 mt-2">
                                TASK: SPEAKING • +50 XP
                            </p> -->

                            <!-- FOOTER -->
                            <div class="flex items-center justify-between mt-5">

                                <span
                                    class="inline-flex items-center gap-2
                                    px-3 py-1 rounded-full
                                    bg-cyan-500/10
                                    text-cyan-400 text-xs font-medium">

                                    Ready to Start

                                </span>

                                <x-heroicon-o-arrow-right
                                    class="w-5 h-5 text-slate-400

                                    group-hover:text-cyan-400
                                    group-hover:translate-x-1

                                    transition-all duration-300" />

                            </div>

                        </a>

                    </div>

                </div>

                <!-- UNIT 1 -->
                <div class="relative flex gap-6">

                    <div
                        class="w-16 h-16 rounded-2xl bg-gradient-to-r from-yellow-400 to-green-500 flex items-center justify-center text-white text-3xl">

                        <x-heroicon-o-book-open
                        class="w-9 h-9 text-white" />

                    </div>

                    <div class="flex-1">

                        <h2 class="text-3xl font-black">
                            UNIT 1
                        </h2>

                        <p class="text-slate-500 mb-6">
                            Are We Connected to Nature?
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                            <!-- LISTENING -->
                            <button
                                type="button"
                                class="group w-full text-left cursor-pointer

                                rounded-[28px]
                                border border-slate-200 dark:border-white/10
                                bg-white/70 dark:bg-white/5
                                backdrop-blur-xl p-6

                                hover:-translate-y-1
                                hover:shadow-xl
                                hover:shadow-cyan-500/10
                                hover:border-cyan-400/30

                                active:scale-[0.98]
                                transition-all duration-300">

                                <!-- ICON -->
                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-cyan-500/10
                                    border border-cyan-500/20
                                    flex items-center justify-center
                                    mb-5

                                    group-hover:bg-cyan-500/20
                                    transition-all duration-300">

                                    <x-heroicon-o-musical-note
                                        class="w-6 h-6 text-cyan-400
                                        group-hover:scale-110
                                        transition-all duration-300" />

                                </div>

                                <h3 class="text-2xl font-bold">
                                    Listening
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Listen carefully and identify important information.
                                </p>

                            </button>

                            <!-- READING -->
                            <button
                                type="button"
                                class="group w-full text-left cursor-pointer

                                rounded-[28px]
                                border border-slate-200 dark:border-white/10
                                bg-white/70 dark:bg-white/5
                                backdrop-blur-xl p-6

                                hover:-translate-y-1
                                hover:shadow-xl
                                hover:shadow-cyan-500/10
                                hover:border-cyan-400/30

                                active:scale-[0.98]
                                transition-all duration-300">

                                <!-- ICON -->
                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-cyan-500/10
                                    border border-cyan-500/20
                                    flex items-center justify-center
                                    mb-5

                                    group-hover:bg-cyan-500/20
                                    transition-all duration-300">

                                    <x-heroicon-o-book-open
                                        class="w-6 h-6 text-cyan-400
                                        group-hover:scale-110
                                        transition-all duration-300" />

                                </div>

                                <h3 class="text-2xl font-bold">
                                    Reading
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Learn key vocabulary and understand the topic.
                                </p>

                            </button>

                            <!-- WRITING -->
                            <button
                                type="button"
                                class="group w-full text-left cursor-pointer

                                rounded-[28px]
                                border border-slate-200 dark:border-white/10
                                bg-white/70 dark:bg-white/5
                                backdrop-blur-xl p-6

                                hover:-translate-y-1
                                hover:shadow-xl
                                hover:shadow-cyan-500/10
                                hover:border-cyan-400/30

                                active:scale-[0.98]
                                transition-all duration-300">

                                <!-- ICON -->
                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-cyan-500/10
                                    border border-cyan-500/20
                                    flex items-center justify-center
                                    mb-5

                                    group-hover:bg-cyan-500/20
                                    transition-all duration-300">

                                    <x-heroicon-o-pencil-square
                                        class="w-6 h-6 text-cyan-400
                                        group-hover:scale-110
                                        transition-all duration-300" />

                                </div>

                                <h3 class="text-2xl font-bold">
                                    Writing
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Organize and write your ideas effectively.
                                </p>

                            </button>

                            <!-- SPEAKING -->
                            <button
                                type="button"
                                class="group w-full text-left cursor-pointer

                                rounded-[28px]
                                border border-slate-200 dark:border-white/10
                                bg-white/70 dark:bg-white/5
                                backdrop-blur-xl p-6

                                hover:-translate-y-1
                                hover:shadow-xl
                                hover:shadow-cyan-500/10
                                hover:border-cyan-400/30

                                active:scale-[0.98]
                                transition-all duration-300">

                                <!-- ICON -->
                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-cyan-500/10
                                    border border-cyan-500/20
                                    flex items-center justify-center
                                    mb-5

                                    group-hover:bg-cyan-500/20
                                    transition-all duration-300">

                                    <x-heroicon-o-microphone
                                        class="w-6 h-6 text-cyan-400
                                        group-hover:scale-110
                                        transition-all duration-300" />

                                </div>

                                <h3 class="text-2xl font-bold">
                                    Speaking
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Practice expressing ideas confidently.
                                </p>

                            </button>

                        </div>

                    </div>

                </div>

                <!-- UNIT 2 -->
                <div class="relative flex gap-6">

                    <div
                        class="w-16 h-16 rounded-2xl bg-gradient-to-r from-green-400 to-cyan-500 flex items-center justify-center text-white text-3xl">

                        <x-heroicon-o-user
                            class="w-9 h-9 text-white" />

                    </div>

                    <div class="flex-1">

                        <h2 class="text-3xl font-black">
                            UNIT 2
                        </h2>

                        <p class="text-slate-500 mb-6">
                            Discovering Ourselves
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                            <!-- LISTENING -->
                            <button
                                type="button"
                                disabled
                                class="w-full text-left

                                rounded-[28px]
                                border border-slate-700
                                bg-black/30
                                backdrop-blur-xl
                                p-6

                                opacity-60
                                cursor-not-allowed

                                relative">

                                <!-- LOCK -->
                                <div class="absolute top-5 right-5">

                                    <x-heroicon-o-lock-closed
                                        class="w-5 h-5 text-slate-400" />

                                </div>

                                <!-- ICON -->
                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-slate-700/50
                                    border border-slate-600
                                    flex items-center justify-center
                                    mb-5">

                                    <x-heroicon-o-musical-note
                                        class="w-6 h-6 text-slate-400" />

                                </div>

                                <h3 class="text-2xl font-bold text-slate-300">
                                    Listening
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Complete Unit 1 to unlock this activity.
                                </p>

                            </button>

                            <!-- READING -->
                            <button
                                type="button"
                                disabled
                                class="w-full text-left

                                rounded-[28px]
                                border border-slate-700
                                bg-black/30
                                backdrop-blur-xl
                                p-6

                                opacity-60
                                cursor-not-allowed

                                relative">

                                <!-- LOCK -->
                                <div class="absolute top-5 right-5">

                                    <x-heroicon-o-lock-closed
                                        class="w-5 h-5 text-slate-400" />

                                </div>

                                <!-- ICON -->
                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-slate-700/50
                                    border border-slate-600
                                    flex items-center justify-center
                                    mb-5">

                                    <x-heroicon-o-book-open
                                        class="w-6 h-6 text-slate-400" />

                                </div>

                                <h3 class="text-2xl font-bold text-slate-300">
                                    Reading
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Complete Unit 1 to unlock this activity.
                                </p>

                            </button>

                            <!-- WRITING -->
                            <button
                                type="button"
                                disabled
                                class="w-full text-left

                                rounded-[28px]
                                border border-slate-700
                                bg-black/30
                                backdrop-blur-xl
                                p-6

                                opacity-60
                                cursor-not-allowed

                                relative">

                                <!-- LOCK -->
                                <div class="absolute top-5 right-5">

                                    <x-heroicon-o-lock-closed
                                        class="w-5 h-5 text-slate-400" />

                                </div>

                                <!-- ICON -->
                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-slate-700/50
                                    border border-slate-600
                                    flex items-center justify-center
                                    mb-5">

                                    <x-heroicon-o-pencil-square
                                        class="w-6 h-6 text-slate-400" />

                                </div>

                                <h3 class="text-2xl font-bold text-slate-300">
                                    Writing
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Complete Unit 1 to unlock this activity.
                                </p>

                            </button>

                            <!-- SPEAKING -->
                            <button
                                type="button"
                                disabled
                                class="w-full text-left

                                rounded-[28px]
                                border border-slate-700
                                bg-black/30
                                backdrop-blur-xl
                                p-6

                                opacity-60
                                cursor-not-allowed

                                relative">

                                <!-- LOCK -->
                                <div class="absolute top-5 right-5">

                                    <x-heroicon-o-lock-closed
                                        class="w-5 h-5 text-slate-400" />

                                </div>

                                <!-- ICON -->
                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-slate-700/50
                                    border border-slate-600
                                    flex items-center justify-center
                                    mb-5">

                                    <x-heroicon-o-microphone
                                        class="w-6 h-6 text-slate-400" />

                                </div>

                                <h3 class="text-2xl font-bold text-slate-300">
                                    Speaking
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Complete Unit 1 to unlock this activity.
                                </p>

                            </button>

                        </div>
                    </div>

                </div>

                <!-- UNIT 3 -->
                <div class="relative flex gap-6">

                    <div
                        class="w-16 h-16 rounded-2xl bg-gradient-to-r from-cyan-400 to-blue-500 flex items-center justify-center text-white text-3xl">

                        <x-heroicon-o-chat-bubble-left-right
                                class="w-9 h-9 text-white" />

                    </div>

                    <div class="flex-1">

                        <h2 class="text-3xl font-black">
                            UNIT 3
                        </h2>

                        <p class="text-slate-500 mb-6">
                            Why is Water Important?
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                            <!-- LISTENING -->
                            <button
                                type="button"
                                disabled
                                class="w-full text-left

                                rounded-[28px]
                                border border-slate-700
                                bg-black/30
                                backdrop-blur-xl
                                p-6

                                opacity-60
                                cursor-not-allowed

                                relative">

                                <!-- LOCK -->
                                <div class="absolute top-5 right-5">

                                    <x-heroicon-o-lock-closed
                                        class="w-5 h-5 text-slate-400" />

                                </div>

                                <!-- ICON -->
                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-slate-700/50
                                    border border-slate-600
                                    flex items-center justify-center
                                    mb-5">

                                    <x-heroicon-o-musical-note
                                        class="w-6 h-6 text-slate-400" />

                                </div>

                                <h3 class="text-2xl font-bold text-slate-300">
                                    Listening
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Complete Unit 1 to unlock this activity.
                                </p>

                            </button>

                            <!-- READING -->
                            <button
                                type="button"
                                disabled
                                class="w-full text-left

                                rounded-[28px]
                                border border-slate-700
                                bg-black/30
                                backdrop-blur-xl
                                p-6

                                opacity-60
                                cursor-not-allowed

                                relative">

                                <!-- LOCK -->
                                <div class="absolute top-5 right-5">

                                    <x-heroicon-o-lock-closed
                                        class="w-5 h-5 text-slate-400" />

                                </div>

                                <!-- ICON -->
                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-slate-700/50
                                    border border-slate-600
                                    flex items-center justify-center
                                    mb-5">

                                    <x-heroicon-o-book-open
                                        class="w-6 h-6 text-slate-400" />

                                </div>

                                <h3 class="text-2xl font-bold text-slate-300">
                                    Reading
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Complete Unit 1 to unlock this activity.
                                </p>

                            </button>

                            <!-- WRITING -->
                            <button
                                type="button"
                                disabled
                                class="w-full text-left

                                rounded-[28px]
                                border border-slate-700
                                bg-black/30
                                backdrop-blur-xl
                                p-6

                                opacity-60
                                cursor-not-allowed

                                relative">

                                <!-- LOCK -->
                                <div class="absolute top-5 right-5">

                                    <x-heroicon-o-lock-closed
                                        class="w-5 h-5 text-slate-400" />

                                </div>

                                <!-- ICON -->
                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-slate-700/50
                                    border border-slate-600
                                    flex items-center justify-center
                                    mb-5">

                                    <x-heroicon-o-pencil-square
                                        class="w-6 h-6 text-slate-400" />

                                </div>

                                <h3 class="text-2xl font-bold text-slate-300">
                                    Writing
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Complete Unit 1 to unlock this activity.
                                </p>

                            </button>

                            <!-- SPEAKING -->
                            <button
                                type="button"
                                disabled
                                class="w-full text-left

                                rounded-[28px]
                                border border-slate-700
                                bg-black/30
                                backdrop-blur-xl
                                p-6

                                opacity-60
                                cursor-not-allowed

                                relative">

                                <!-- LOCK -->
                                <div class="absolute top-5 right-5">

                                    <x-heroicon-o-lock-closed
                                        class="w-5 h-5 text-slate-400" />

                                </div>

                                <!-- ICON -->
                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-slate-700/50
                                    border border-slate-600
                                    flex items-center justify-center
                                    mb-5">

                                    <x-heroicon-o-microphone
                                        class="w-6 h-6 text-slate-400" />

                                </div>

                                <h3 class="text-2xl font-bold text-slate-300">
                                    Speaking
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Complete Unit 1 to unlock this activity.
                                </p>

                            </button>

                        </div>

                    </div>

                </div>

                <!-- UNIT 4 -->
                <div class="relative flex gap-6">

                    <div
                        class="w-16 h-16 rounded-2xl bg-gradient-to-r from-blue-500 to-purple-500 flex items-center justify-center text-white text-3xl">

                        <x-heroicon-o-shield-check
                            class="w-9 h-9 text-white" />

                    </div>

                    <div class="flex-1">

                        <h2 class="text-3xl font-black">
                            UNIT 4
                        </h2>

                        <p class="text-slate-500 mb-6">
                            Why Should We Live a Healthy Life?
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                            <!-- LISTENING -->
                            <button
                                type="button"
                                disabled
                                class="w-full text-left

                                rounded-[28px]
                                border border-slate-700
                                bg-black/30
                                backdrop-blur-xl
                                p-6

                                opacity-60
                                cursor-not-allowed

                                relative">

                                <!-- LOCK -->
                                <div class="absolute top-5 right-5">

                                    <x-heroicon-o-lock-closed
                                        class="w-5 h-5 text-slate-400" />

                                </div>

                                <!-- ICON -->
                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-slate-700/50
                                    border border-slate-600
                                    flex items-center justify-center
                                    mb-5">

                                    <x-heroicon-o-musical-note
                                        class="w-6 h-6 text-slate-400" />

                                </div>

                                <h3 class="text-2xl font-bold text-slate-300">
                                    Listening
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Complete Unit 1 to unlock this activity.
                                </p>

                            </button>

                            <!-- READING -->
                            <button
                                type="button"
                                disabled
                                class="w-full text-left

                                rounded-[28px]
                                border border-slate-700
                                bg-black/30
                                backdrop-blur-xl
                                p-6

                                opacity-60
                                cursor-not-allowed

                                relative">

                                <!-- LOCK -->
                                <div class="absolute top-5 right-5">

                                    <x-heroicon-o-lock-closed
                                        class="w-5 h-5 text-slate-400" />

                                </div>

                                <!-- ICON -->
                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-slate-700/50
                                    border border-slate-600
                                    flex items-center justify-center
                                    mb-5">

                                    <x-heroicon-o-book-open
                                        class="w-6 h-6 text-slate-400" />

                                </div>

                                <h3 class="text-2xl font-bold text-slate-300">
                                    Reading
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Complete Unit 1 to unlock this activity.
                                </p>

                            </button>

                            <!-- WRITING -->
                            <button
                                type="button"
                                disabled
                                class="w-full text-left

                                rounded-[28px]
                                border border-slate-700
                                bg-black/30
                                backdrop-blur-xl
                                p-6

                                opacity-60
                                cursor-not-allowed

                                relative">

                                <!-- LOCK -->
                                <div class="absolute top-5 right-5">

                                    <x-heroicon-o-lock-closed
                                        class="w-5 h-5 text-slate-400" />

                                </div>

                                <!-- ICON -->
                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-slate-700/50
                                    border border-slate-600
                                    flex items-center justify-center
                                    mb-5">

                                    <x-heroicon-o-pencil-square
                                        class="w-6 h-6 text-slate-400" />

                                </div>

                                <h3 class="text-2xl font-bold text-slate-300">
                                    Writing
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Complete Unit 1 to unlock this activity.
                                </p>

                            </button>

                            <!-- SPEAKING -->
                            <button
                                type="button"
                                disabled
                                class="w-full text-left

                                rounded-[28px]
                                border border-slate-700
                                bg-black/30
                                backdrop-blur-xl
                                p-6

                                opacity-60
                                cursor-not-allowed

                                relative">

                                <!-- LOCK -->
                                <div class="absolute top-5 right-5">

                                    <x-heroicon-o-lock-closed
                                        class="w-5 h-5 text-slate-400" />

                                </div>

                                <!-- ICON -->
                                <div
                                    class="w-12 h-12 rounded-2xl
                                    bg-slate-700/50
                                    border border-slate-600
                                    flex items-center justify-center
                                    mb-5">

                                    <x-heroicon-o-microphone
                                        class="w-6 h-6 text-slate-400" />

                                </div>

                                <h3 class="text-2xl font-bold text-slate-300">
                                    Speaking
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Complete Unit 1 to unlock this activity.
                                </p>

                            </button>

                        </div>

                    </div>

                </div>

                <!-- POSTTEST -->
                <div class="relative flex gap-6">

                    <div
                        class="w-16 h-16 rounded-2xl bg-gradient-to-r from-orange-500 to-red-500 flex items-center justify-center text-white text-3xl">

                        <x-heroicon-o-clipboard-document-check
                        class="w-9 h-9 text-white" />

                    </div>

                    <div class="flex-1">

                        <h2 class="text-3xl font-black">
                            POST-TEST
                        </h2>

                        <p class="text-slate-500 mb-5">
                            Final Assessment
                        </p>

                        <button
                            type="button"
                            disabled
                            class="max-w-md w-full text-left

                            rounded-[28px]
                            border border-slate-700/50
                            bg-slate-900/40
                            backdrop-blur-xl
                            p-6

                            opacity-75
                            cursor-not-allowed

                            relative">

                            <!-- LOCK -->
                            <div class="absolute top-5 right-5">

                                <x-heroicon-o-lock-closed
                                    class="w-5 h-5 text-slate-400" />

                            </div>

                            <!-- ICON -->
                            <div
                                class="w-12 h-12 rounded-2xl
                                bg-slate-700/50
                                border border-slate-600
                                flex items-center justify-center
                                mb-5">

                                <x-heroicon-o-play
                                    class="w-6 h-6 text-slate-400" />

                            </div>

                            <h3 class="text-2xl font-bold text-slate-300">
                                Start Post-Test
                            </h3>

                            <p class="mt-2 text-slate-500">
                                Complete all units to unlock the final assessment.
                            </p>

                            <span
                                class="inline-flex items-center gap-2
                                mt-5 px-3 py-1 rounded-full
                                bg-slate-700/50
                                text-slate-400 text-xs">

                                🔒 Locked

                            </span>

                        </button>

                    </div>

                </div>

            </div>

        </div>

        </section>

    </div>

</x-app-layout>
