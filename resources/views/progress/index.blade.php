<x-app-layout>

    <div class="max-w-7xl mx-auto space-y-8">

        <section
            class="relative overflow-hidden rounded-[40px]
            border border-slate-200 dark:border-white/10
            bg-white/80 dark:bg-white/5
            backdrop-blur-2xl p-8 lg:p-12">

            <div class="absolute -top-24 -right-24 w-80 h-80 bg-cyan-400/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-28 -left-28 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl"></div>

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                <div>
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full
                        bg-cyan-500/10 text-cyan-500 font-bold text-sm mb-5">
                        📈 Learning Progress
                    </div>

                    <h1 class="text-4xl lg:text-6xl font-black leading-tight">
                        Track Your English Journey 🚀
                    </h1>

                    <p class="mt-5 text-slate-500 max-w-2xl text-base lg:text-lg">
                        Monitor your assessment scores, skill progress, and learning history from Pre-Test and
                        Post-Test.
                    </p>
                </div>

                <div
                    class="rounded-[32px] bg-slate-100 dark:bg-white/5
                    border border-slate-200 dark:border-white/10 p-6 min-w-[240px]">

                    <p class="text-sm text-slate-500">
                        Best Score
                    </p>

                    <h2 class="mt-2 text-6xl font-black text-green-400">
                        {{ $bestSubmission?->final_score ?? 0 }}
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        {{ $bestSubmission ? strtoupper($bestSubmission->type) . ' - ' . ucfirst($bestSubmission->skill) : 'No result yet' }}
                    </p>
                </div>

            </div>

        </section>

        <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <div class="rounded-[30px] border border-slate-200 dark:border-white/10 bg-white/80 dark:bg-white/5 p-6">
                <p class="text-sm text-slate-500">Average Score</p>
                <h3 class="mt-3 text-5xl font-black text-cyan-400">{{ $averageScore }}</h3>
            </div>

            <div class="rounded-[30px] border border-slate-200 dark:border-white/10 bg-white/80 dark:bg-white/5 p-6">
                <p class="text-sm text-slate-500">Completed Tests</p>
                <h3 class="mt-3 text-5xl font-black text-green-400">{{ $totalCompleted }}</h3>
            </div>

            <div class="rounded-[30px] border border-slate-200 dark:border-white/10 bg-white/80 dark:bg-white/5 p-6">
                <p class="text-sm text-slate-500">Pre-Test Average</p>
                <h3 class="mt-3 text-5xl font-black text-blue-400">{{ $pretestAverage }}</h3>
            </div>

            <div class="rounded-[30px] border border-slate-200 dark:border-white/10 bg-white/80 dark:bg-white/5 p-6">
                <p class="text-sm text-slate-500">Post-Test Average</p>
                <h3 class="mt-3 text-5xl font-black text-purple-400">{{ $posttestAverage }}</h3>
            </div>

        </section>

        <section
            class="rounded-[36px] border border-slate-200 dark:border-white/10
            bg-white/80 dark:bg-white/5 p-8">

            <h2 class="text-2xl font-black mb-7">
                Skill Progress
            </h2>

            <div class="space-y-7">

                @foreach ($skillAverages as $skill => $score)
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-black capitalize">
                                {{ $skill }}
                            </span>

                            <span class="font-black text-cyan-400">
                                {{ $score }}%
                            </span>
                        </div>

                        <div class="w-full h-4 rounded-full bg-slate-200 dark:bg-white/10 overflow-hidden">
                            <div class="h-full rounded-full bg-gradient-to-r from-cyan-400 to-blue-600"
                                style="width: {{ $score }}%">
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </section>

        <section>

            <h2 class="text-2xl font-black mb-5">
                Assessment History
            </h2>

            <div
                class="rounded-[36px] border border-slate-200 dark:border-white/10
                bg-white/80 dark:bg-white/5 overflow-hidden">

                @forelse ($submissions as $submission)
                    @php
                        $score = $submission->final_score;
                    @endphp

                    <div
                        class="p-6 border-b border-slate-200 dark:border-white/10
                        flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                        <div>
                            <div class="flex flex-wrap items-center gap-2 mb-3">

                                <span class="px-3 py-1 rounded-full text-xs font-black bg-cyan-500/10 text-cyan-400">
                                    {{ strtoupper($submission->type) }}
                                </span>

                                <span class="px-3 py-1 rounded-full text-xs font-black bg-slate-500/10 text-slate-400">
                                    {{ ucfirst($submission->skill) }}
                                </span>

                                <span
                                    class="px-3 py-1 rounded-full text-xs font-black
                                    {{ $submission->status === 'completed' ? 'bg-green-500/10 text-green-400' : 'bg-yellow-500/10 text-yellow-400' }}">
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

                        <div class="flex items-center gap-5">

                            <div class="text-right">
                                <p class="text-xs text-slate-500">
                                    Score
                                </p>

                                <p
                                    class="text-4xl font-black
                                    {{ $score >= 80 ? 'text-green-400' : ($score >= 60 ? 'text-blue-400' : 'text-cyan-400') }}">
                                    {{ $score ?? '-' }}
                                </p>
                            </div>

                            <a href="{{ route('student.assessment.result', $submission->id) }}"
                                class="px-5 py-3 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-black">
                                View Result
                            </a>

                        </div>

                    </div>
                @empty

                    <div class="p-16 text-center">
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
