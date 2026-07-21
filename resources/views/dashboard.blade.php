<x-app-layout>

    @php
        /*
        |--------------------------------------------------------------------------
        | Tampilan setiap tahap
        |--------------------------------------------------------------------------
        |
        | Class ditulis lengkap agar dapat terdeteksi oleh Tailwind.
        |--------------------------------------------------------------------------
        */

        $stageStyles = [
            1 => [
                'icon' => 'clipboard',
                'gradient' => 'from-orange-500 to-red-500',
                'text' => 'text-orange-400',
                'shadow' => 'hover:shadow-orange-500/10',
            ],

            2 => [
                'icon' => 'book',
                'gradient' => 'from-yellow-400 to-green-500',
                'text' => 'text-green-400',
                'shadow' => 'hover:shadow-green-500/10',
            ],

            3 => [
                'icon' => 'user',
                'gradient' => 'from-green-400 to-cyan-500',
                'text' => 'text-cyan-400',
                'shadow' => 'hover:shadow-cyan-500/10',
            ],

            4 => [
                'icon' => 'chat',
                'gradient' => 'from-cyan-400 to-blue-500',
                'text' => 'text-blue-400',
                'shadow' => 'hover:shadow-blue-500/10',
            ],

            5 => [
                'icon' => 'shield',
                'gradient' => 'from-blue-500 to-purple-500',
                'text' => 'text-purple-400',
                'shadow' => 'hover:shadow-purple-500/10',
            ],

            6 => [
                'icon' => 'trophy',
                'gradient' => 'from-cyan-400 to-purple-500',
                'text' => 'text-pink-400',
                'shadow' => 'hover:shadow-pink-500/10',
            ],
        ];
    @endphp

    <div class="space-y-10">

        {{-- HERO --}}
        <section
            class="relative overflow-hidden rounded-[32px]
                   border border-slate-200 dark:border-white/10
                   bg-white/70 dark:bg-white/5
                   backdrop-blur-2xl p-8 lg:p-10">

            {{-- Glow --}}
            <div
                class="absolute top-[-120px] right-[-120px]
                       h-[300px] w-[300px]
                       rounded-full bg-cyan-400/10 blur-3xl">
            </div>

            <div class="relative z-10">

                <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">

                    {{-- LEFT --}}
                    <div class="flex-1">

                        <div
                            class="mb-5 inline-flex items-center gap-2
                                   rounded-full border border-cyan-400/20
                                   bg-cyan-500/10 px-4 py-2
                                   text-sm font-medium text-cyan-400">

                            ✨ Welcome Back

                        </div>

                        <h1
                            class="text-4xl font-black leading-tight
                                   text-slate-900 dark:text-white
                                   lg:text-5xl">

                            Hello,
                            {{ implode(' ', array_slice(explode(' ', $user->name), 0, 2)) }}
                            <span class="inline-block">👋</span>

                        </h1>

                        <p
                            class="mt-4 max-w-2xl text-lg leading-relaxed
                                   text-slate-600 dark:text-slate-400">

                            Continue improving your English skills through
                            listening, reading, writing, and speaking activities.

                        </p>

                        {{-- Overall progress --}}
                        <div class="mt-6 max-w-xl">

                            <div
                                class="mb-2 flex items-center justify-between
                                       text-sm font-semibold">

                                <span class="text-slate-600 dark:text-slate-300">
                                    Overall Learning Progress
                                </span>

                                <span class="text-cyan-400">
                                    {{ $overallProgress }}%
                                </span>

                            </div>

                            <div
                                class="h-3 overflow-hidden rounded-full
                                       bg-slate-200 dark:bg-white/10">

                                <div class="h-full rounded-full
                                           bg-gradient-to-r from-cyan-500 to-blue-600
                                           transition-all duration-700"
                                    style="width: {{ min($overallProgress, 100) }}%">
                                </div>

                            </div>

                            <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">

                                {{ $completedStages }} of {{ $totalStages }}
                                learning stages completed.

                            </p>

                        </div>

                        {{-- BUTTONS --}}
                        <div class="mt-8 flex flex-wrap gap-4">

                            <a href="{{ $nextActionUrl }}"
                                class="rounded-2xl
                                       bg-gradient-to-r from-cyan-500 to-blue-600
                                       px-6 py-4 font-semibold text-white
                                       shadow-lg shadow-cyan-500/20
                                       transition-all duration-300
                                       hover:scale-[1.02]">

                                {{ $nextActionLabel }}

                            </a>

                            <a href="{{ route('progress') }}"
                                class="rounded-2xl border border-slate-300
                                       bg-white px-6 py-4
                                       font-semibold text-slate-700
                                       transition
                                       hover:bg-slate-100
                                       dark:border-white/10
                                       dark:bg-white/5
                                       dark:text-white
                                       dark:hover:bg-white/10">

                                View Progress

                            </a>

                        </div>

                    </div>

                    {{-- RIGHT --}}
                    <div class="grid w-full grid-cols-1 gap-5 sm:grid-cols-2 lg:w-auto lg:min-w-[520px]">

                        {{-- XP --}}
                        <div
                            class="rounded-3xl border border-slate-200
                                   bg-slate-50 p-6
                                   dark:border-white/10 dark:bg-white/5">

                            <p class="mb-2 text-sm text-slate-500 dark:text-slate-400">
                                Total XP
                            </p>

                            <h3 class="text-4xl font-black text-cyan-400">
                                {{ number_format($totalXp) }}
                            </h3>

                            <p class="mt-2 text-xs text-slate-400">
                                100 XP per completed skill
                            </p>

                        </div>

                        {{-- STREAK --}}
                        <div
                            class="rounded-3xl border border-slate-200
                                   bg-slate-50 p-6
                                   dark:border-white/10 dark:bg-white/5">

                            <p class="mb-2 text-sm text-slate-500 dark:text-slate-400">
                                Daily Streak
                            </p>

                            <h3 class="text-4xl font-black text-orange-400">
                                {{ $dailyStreak }}
                                <span class="text-3xl">🔥</span>
                            </h3>

                            <p class="mt-2 text-xs text-slate-400">
                                Consecutive learning days
                            </p>

                        </div>

                        {{-- LEVEL --}}
                        <div
                            class="rounded-3xl border border-slate-200
                                   bg-slate-50 p-6
                                   dark:border-white/10 dark:bg-white/5">

                            <p class="mb-2 text-sm text-slate-500 dark:text-slate-400">
                                Current Level
                            </p>

                            <h3
                                class="break-words text-2xl font-black
                                       text-slate-900 dark:text-white">

                                {{ $currentLevel }}

                            </h3>

                            <p class="mt-2 text-xs text-slate-400">
                                Based on earned XP
                            </p>

                        </div>

                        {{-- MISSIONS --}}
                        <div
                            class="rounded-3xl border border-slate-200
                                   bg-slate-50 p-6
                                   dark:border-white/10 dark:bg-white/5">

                            <p class="mb-2 text-sm text-slate-500 dark:text-slate-400">
                                Missions Done
                            </p>

                            <h3 class="text-4xl font-black text-green-400">

                                {{ $completedMissions }}/{{ $totalMissions }}

                            </h3>

                            <p class="mt-2 text-xs text-slate-400">
                                Completed learning skills
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        {{-- CONTINUE JOURNEY --}}
        <section>

            <div class="mb-6">

                <h2 class="text-3xl font-black text-slate-900 dark:text-white">
                    Continue Your Journey
                </h2>

                <p class="mt-1 text-slate-500 dark:text-slate-400">
                    Complete each skill to unlock the next learning stage.
                </p>

            </div>

            @if ($units->isEmpty())

                <div
                    class="rounded-3xl border border-dashed border-slate-300
                           bg-white/50 p-10 text-center
                           dark:border-white/10 dark:bg-white/5">

                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                        No Learning Stage Available
                    </h3>

                    <p class="mt-2 text-slate-500 dark:text-slate-400">
                        The administrator has not activated any learning stages.
                    </p>

                </div>
            @else
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

                    @foreach ($units as $unit)
                        @php
                            $data = $stageData[$unit->id];

                            $style = $stageStyles[$unit->order_number] ?? $stageStyles[2];

                            $isLocked = !$data['is_unlocked'];
                            $isCompleted = $data['is_completed'];

                            $nextSkillLabel = $data['next_skill'] ? ucfirst($data['next_skill']) : null;
                        @endphp

                        <a href="{{ $isLocked ? '#' : $data['action_url'] }}"
                            @if ($isLocked) onclick="return false;"
                                aria-disabled="true" @endif
                            class="group relative block overflow-hidden
                                   rounded-[30px]
                                   border border-slate-200
                                   bg-white/70 p-6
                                   backdrop-blur-xl
                                   transition-all duration-300
                                   dark:border-white/10 dark:bg-white/5

                                   {{ $isLocked ? 'cursor-not-allowed opacity-55' : 'hover:-translate-y-1 hover:shadow-lg ' . $style['shadow'] }}">

                            {{-- Completed glow --}}
                            @if ($isCompleted)
                                <div
                                    class="absolute right-[-45px] top-[-45px]
                                           h-32 w-32 rounded-full
                                           bg-green-400/10 blur-2xl">
                                </div>
                            @endif

                            <div class="relative flex items-center gap-5">

                                {{-- Icon --}}
                                <div
                                    class="flex h-16 w-16 shrink-0
                                           items-center justify-center
                                           rounded-2xl
                                           bg-gradient-to-r
                                           {{ $style['gradient'] }}
                                           text-white shadow-lg">

                                    @switch($style['icon'])
                                        @case('clipboard')
                                            <x-heroicon-o-clipboard-document-check class="h-9 w-9 text-white" />
                                        @break

                                        @case('book')
                                            <x-heroicon-o-book-open class="h-9 w-9 text-white" />
                                        @break

                                        @case('user')
                                            <x-heroicon-o-user class="h-9 w-9 text-white" />
                                        @break

                                        @case('chat')
                                            <x-heroicon-o-chat-bubble-left-right class="h-9 w-9 text-white" />
                                        @break

                                        @case('shield')
                                            <x-heroicon-o-shield-check class="h-9 w-9 text-white" />
                                        @break

                                        @case('trophy')
                                            <x-heroicon-o-trophy class="h-9 w-9 text-white" />
                                        @break

                                        @default
                                            <x-heroicon-o-academic-cap class="h-9 w-9 text-white" />
                                    @endswitch

                                </div>

                                {{-- CONTENT --}}
                                <div class="min-w-0 flex-1">

                                    <div class="mb-3 flex items-start justify-between gap-4">

                                        <div class="min-w-0">

                                            <p
                                                class="text-xs font-semibold uppercase
                                                       tracking-widest
                                                       {{ $style['text'] }}">

                                                {{ $unit->title }}

                                            </p>

                                            <h3
                                                class="mt-1 text-xl font-black
                                                       text-slate-900 dark:text-white">

                                                {{ $unit->subtitle ?? $unit->title }}

                                            </h3>

                                        </div>

                                        <div class="shrink-0 text-right">

                                            @if ($isLocked)
                                                <span
                                                    class="inline-flex items-center gap-1
                                                           rounded-full
                                                           bg-slate-500/10
                                                           px-3 py-1
                                                           text-xs font-semibold
                                                           text-slate-500
                                                           dark:text-slate-400">

                                                    🔒 Locked

                                                </span>
                                            @elseif ($isCompleted)
                                                <span
                                                    class="inline-flex items-center gap-1
                                                           rounded-full
                                                           bg-green-500/10
                                                           px-3 py-1
                                                           text-xs font-semibold
                                                           text-green-400">

                                                    ✓ Completed

                                                </span>
                                            @else
                                                <span
                                                    class="font-bold
                                                           text-slate-500
                                                           dark:text-slate-300">

                                                    {{ $data['progress'] }}%

                                                </span>
                                            @endif

                                        </div>

                                    </div>

                                    {{-- Progress bar --}}
                                    <div
                                        class="h-3 overflow-hidden rounded-full
                                               bg-slate-200 dark:bg-white/10">

                                        <div class="h-full rounded-full
                                                   bg-gradient-to-r
                                                   {{ $style['gradient'] }}
                                                   transition-all duration-700"
                                            style="width: {{ min($data['progress'], 100) }}%">
                                        </div>

                                    </div>

                                    <div
                                        class="mt-3 flex flex-wrap
                                               items-center justify-between gap-2
                                               text-sm">

                                        <span class="text-slate-500 dark:text-slate-400">

                                            {{ $data['completed_count'] }}
                                            of
                                            {{ $data['total_skills'] }}
                                            skills completed

                                        </span>

                                        @if (!$isLocked && !$isCompleted && $nextSkillLabel)
                                            <span class="font-semibold {{ $style['text'] }}">

                                                Next: {{ $nextSkillLabel }} →

                                            </span>
                                        @elseif ($isCompleted)
                                            <span class="font-semibold text-green-400">
                                                View missions →
                                            </span>
                                        @endif

                                    </div>

                                </div>

                                {{-- Arrow --}}
                                @if (!$isLocked)
                                    <x-heroicon-o-chevron-right
                                        class="h-7 w-7 shrink-0
                                               text-slate-400
                                               transition-transform duration-300
                                               group-hover:translate-x-1" />
                                @endif

                            </div>

                        </a>
                    @endforeach

                </div>

            @endif

        </section>

        {{-- NEXT LEARNING RECOMMENDATION --}}
        @if ($nextStage)
            @php
                $nextData = $stageData[$nextStage->id];
            @endphp

            <section
                class="rounded-[30px]
                       border border-cyan-400/20
                       bg-gradient-to-r
                       from-cyan-500/10 to-blue-500/10
                       p-7">

                <div
                    class="flex flex-col gap-5
                           md:flex-row md:items-center md:justify-between">

                    <div>

                        <p
                            class="text-xs font-semibold uppercase
                                   tracking-widest text-cyan-400">

                            Recommended Next Step

                        </p>

                        <h2
                            class="mt-2 text-2xl font-black
                                   text-slate-900 dark:text-white">

                            {{ $nextStage->title }} —
                            {{ ucfirst($nextData['next_skill'] ?? 'Continue') }}

                        </h2>

                        <p class="mt-2 text-slate-500 dark:text-slate-400">

                            Continue your learning journey and complete the
                            remaining skill in this stage.

                        </p>

                    </div>

                    <a href="{{ $nextData['action_url'] }}"
                        class="inline-flex shrink-0 items-center
                               justify-center gap-2
                               rounded-2xl
                               bg-gradient-to-r from-cyan-500 to-blue-600
                               px-6 py-4 font-semibold text-white
                               shadow-lg shadow-cyan-500/20
                               transition hover:scale-[1.02]">

                        Continue Now

                        <x-heroicon-o-arrow-right class="h-5 w-5" />

                    </a>

                </div>

            </section>
        @elseif ($units->isNotEmpty())
            <section
                class="rounded-[30px]
                       border border-green-400/20
                       bg-green-500/10 p-8 text-center">

                <div class="text-5xl">
                    🏆
                </div>

                <h2 class="mt-4 text-2xl font-black
                           text-slate-900 dark:text-white">

                    Congratulations!

                </h2>

                <p class="mt-2 text-slate-500 dark:text-slate-400">
                    You have completed all available learning stages.
                </p>

                <a href="{{ route('progress') }}"
                    class="mt-6 inline-flex items-center gap-2
                           rounded-2xl
                           bg-green-500 px-6 py-3
                           font-semibold text-white
                           transition hover:scale-[1.02]">

                    View Your Progress

                    <x-heroicon-o-arrow-right class="h-5 w-5" />

                </a>

            </section>
        @endif

    </div>

</x-app-layout>
