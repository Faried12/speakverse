<x-app-layout>

    <div class="space-y-8">

        <section
            class="rounded-[32px] border border-slate-200 dark:border-white/10
        bg-white/70 dark:bg-white/5 backdrop-blur-2xl p-8 lg:p-10">

            <h1 class="text-4xl lg:text-5xl font-black">
                Track Your English Journey 🚀
            </h1>

            <p class="mt-4 text-slate-500">
                Monitor your assessment results and learning progress.
            </p>

        </section>

        <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <div class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 p-6">
                <p class="text-sm text-slate-500">Average Score</p>
                <h3 class="mt-2 text-4xl font-black text-cyan-400">
                    {{ $averageScore }}
                </h3>
            </div>

            <div class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 p-6">
                <p class="text-sm text-slate-500">Completed Tests</p>
                <h3 class="mt-2 text-4xl font-black text-green-400">
                    {{ $totalCompleted }}
                </h3>
            </div>

            <div class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 p-6">
                <p class="text-sm text-slate-500">Pre-Test Avg</p>
                <h3 class="mt-2 text-4xl font-black text-blue-400">
                    {{ $pretestAverage }}
                </h3>
            </div>

            <div class="rounded-3xl border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 p-6">
                <p class="text-sm text-slate-500">Post-Test Avg</p>
                <h3 class="mt-2 text-4xl font-black text-purple-400">
                    {{ $posttestAverage }}
                </h3>
            </div>

        </section>

        <section>
            <h2 class="text-2xl font-black mb-5">
                Skill Progress
            </h2>

            <div
                class="rounded-[32px] border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 p-8 space-y-6">

                @foreach ($skillAverages as $skill => $score)
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-bold capitalize">
                                {{ $skill }}
                            </span>

                            <span class="font-bold text-cyan-400">
                                {{ $score }}%
                            </span>
                        </div>

                        <div class="w-full h-4 rounded-full bg-slate-200 dark:bg-white/10 overflow-hidden">
                            <div class="h-full rounded-full bg-gradient-to-r from-cyan-400 to-blue-500"
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
                class="rounded-[32px] border border-slate-200 dark:border-white/10 bg-white/70 dark:bg-white/5 overflow-hidden">

                @forelse ($submissions as $submission)
                    <div
                        class="p-6 border-b border-slate-200 dark:border-white/10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                        <div>
                            <h3 class="text-xl font-black">
                                {{ strtoupper($submission->type) }} - {{ ucfirst($submission->skill) }}
                            </h3>

                            <p class="mt-1 text-slate-500">
                                {{ $submission->lesson->title ?? '-' }} •
                                {{ $submission->submitted_at ?? $submission->created_at }}
                            </p>
                        </div>

                        <div class="flex items-center gap-3">
                            <span class="text-2xl font-black text-cyan-400">
                                {{ $submission->final_score ?? 0 }}
                            </span>

                            <a href="{{ route('student.assessment.result', $submission->id) }}"
                                class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold">
                                View Result
                            </a>
                        </div>

                    </div>
                @empty
                    <div class="p-12 text-center">
                        <div class="text-6xl mb-4">📭</div>

                        <h3 class="text-xl font-black">
                            No Progress Yet
                        </h3>

                        <p class="mt-2 text-slate-500">
                            Complete your first assessment to see progress here.
                        </p>
                    </div>
                @endforelse

            </div>
        </section>

    </div>

</x-app-layout>
