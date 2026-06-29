<x-app-layout>

    <div class="max-w-7xl mx-auto space-y-8">

        <section
            class="relative overflow-hidden rounded-[36px] border border-slate-200 dark:border-white/10 bg-white/80 dark:bg-white/5 backdrop-blur-2xl p-8 lg:p-10">
            <div class="absolute -top-24 -right-24 w-72 h-72 bg-cyan-400/20 rounded-full blur-3xl"></div>

            <div class="relative">
                <p class="text-cyan-500 font-bold mb-3">
                    📈 Learning Progress
                </p>

                <h1 class="text-4xl lg:text-5xl font-black">
                    Track Your English Journey 🚀
                </h1>

                <p class="mt-4 text-slate-500 max-w-2xl">
                    Monitor your assessment scores, skill progress, and test history based on your completed Pre-Test
                    and Post-Test.
                </p>
            </div>
        </section>

        <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <div class="rounded-[28px] border border-slate-200 dark:border-white/10 bg-white/80 dark:bg-white/5 p-6">
                <p class="text-sm text-slate-500">Average Score</p>
                <h3 class="mt-3 text-5xl font-black text-cyan-400">{{ $averageScore }}</h3>
            </div>

            <div class="rounded-[28px] border border-slate-200 dark:border-white/10 bg-white/80 dark:bg-white/5 p-6">
                <p class="text-sm text-slate-500">Completed Tests</p>
                <h3 class="mt-3 text-5xl font-black text-green-400">{{ $totalCompleted }}</h3>
            </div>

            <div class="rounded-[28px] border border-slate-200 dark:border-white/10 bg-white/80 dark:bg-white/5 p-6">
                <p class="text-sm text-slate-500">Pre-Test Average</p>
                <h3 class="mt-3 text-5xl font-black text-blue-400">{{ $pretestAverage }}</h3>
            </div>

            <div class="rounded-[28px] border border-slate-200 dark:border-white/10 bg-white/80 dark:bg-white/5 p-6">
                <p class="text-sm text-slate-500">Post-Test Average</p>
                <h3 class="mt-3 text-5xl font-black text-purple-400">{{ $posttestAverage }}</h3>
            </div>

        </section>

        <section class="grid grid-cols-1 xl:grid-cols-3 gap-8">

            <div
                class="xl:col-span-2 rounded-[32px] border border-slate-200 dark:border-white/10 bg-white/80 dark:bg-white/5 p-8">
                <h2 class="text-2xl font-black mb-6">
                    Skill Progress
                </h2>

                <div class="space-y-6">
                    @foreach ($skillAverages as $skill => $score)
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="font-bold capitalize">{{ $skill }}</span>
                                <span class="font-black text-cyan-400">{{ $score }}%</span>
                            </div>

                            <div class="w-full h-4 rounded-full bg-slate-200 dark:bg-white/10 overflow-hidden">
                                <div class="h-full rounded-full bg-gradient-to-r from-cyan-400 to-blue-600"
                                    style="width: {{ $score }}%">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="rounded-[32px] border border-slate-200 dark:border-white/10 bg-white/80 dark:bg-white/5 p-8">
                <h2 class="text-2xl font-black mb-6">
                    Best Result
                </h2>

                @if ($bestSubmission)
                    <p class="text-sm text-slate-500">
                        {{ strtoupper($bestSubmission->type) }} - {{ ucfirst($bestSubmission->skill) }}
                    </p>

                    <h3 class="mt-4 text-6xl font-black text-green-400">
                        {{ $bestSubmission->final_score }}
                    </h3>

                    <p class="mt-4 text-slate-500">
                        {{ $bestSubmission->submitted_at?->format('d M Y, H:i') }}
                    </p>
                @else
                    <p class="text-slate-500">
                        No completed assessment yet.
                    </p>
                @endif
            </div>

        </section>

        <section>
            <h2 class="text-2xl font-black mb-5">
                Assessment History
            </h2>

            <div
                class="rounded-[32px] border border-slate-200 dark:border-white/10 bg-white/80 dark:bg-white/5 overflow-hidden">

                @forelse ($submissions as $submission)
                    <div
                        class="p-6 border-b border-slate-200 dark:border-white/10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                        <div>
                            <div class="flex flex-wrap items-center gap-3 mb-2">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-bold bg-cyan-100 text-cyan-700 dark:bg-cyan-500/10 dark:text-cyan-300">
                                    {{ strtoupper($submission->type) }}
                                </span>

                                <span
                                    class="px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-700 dark:bg-white/10 dark:text-slate-300">
                                    {{ ucfirst($submission->skill) }}
                                </span>

                                <span
                                    class="px-3 py-1 rounded-full text-xs font-bold
                                {{ $submission->status === 'completed'
                                    ? 'bg-green-100 text-green-700 dark:bg-green-500/10 dark:text-green-300'
                                    : 'bg-yellow-100 text-yellow-700 dark:bg-yellow-500/10 dark:text-yellow-300' }}">
                                    {{ ucfirst($submission->status) }}
                                </span>
                            </div>

                            <h3 class="text-xl font-black">
                                {{ strtoupper($submission->type) }} - {{ ucfirst($submission->skill) }}
                            </h3>

                            <p class="mt-1 text-slate-500">
                                {{ $submission->lesson->title ?? '-' }}
                                •
                                {{ $submission->submitted_at?->format('d M Y, H:i') ?? $submission->created_at->format('d M Y, H:i') }}
                            </p>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="text-right">
                                <p class="text-xs text-slate-500">Score</p>
                                <p class="text-3xl font-black text-cyan-400">
                                    {{ $submission->final_score ?? '-' }}
                                </p>
                            </div>

                            <a href="{{ route('student.assessment.result', $submission->id) }}"
                                class="px-5 py-3 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-bold">
                                View Result
                            </a>
                        </div>

                    </div>
                @empty
                    <div class="p-14 text-center">
                        <div class="text-7xl mb-4">📭</div>

                        <h3 class="text-2xl font-black">
                            No Progress Yet
                        </h3>

                        <p class="mt-2 text-slate-500">
                            Complete your first assessment to see your progress here.
                        </p>
                    </div>
                @endforelse

            </div>
        </section>

    </div>

</x-app-layout>
