<x-app-layout>

    <div class="max-w-5xl mx-auto space-y-8">

        @if (session('success'))
            <div class="p-4 rounded-2xl bg-green-100 text-green-700 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <div
            class="rounded-[32px]
            border border-slate-200 dark:border-white/10
            bg-white/70 dark:bg-white/5
            backdrop-blur-xl
            p-8">

            <p class="text-sm font-semibold text-cyan-500 mb-3">
                Assessment Result
            </p>

            <h1 class="text-3xl md:text-4xl font-black">
                {{ strtoupper($submission->type) }} - {{ ucfirst($submission->skill) }}
            </h1>

            <p class="mt-2 text-slate-500">
                {{ $submission->lesson->title ?? '-' }} Assessment
            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div
                class="rounded-[28px]
                border border-slate-200 dark:border-white/10
                bg-white/70 dark:bg-white/5
                backdrop-blur-xl
                p-6">

                <p class="text-sm text-slate-500">
                    Final Score
                </p>

                <h2 class="mt-3 text-5xl font-black text-cyan-500">
                    {{ $submission->final_score ?? 0 }}
                </h2>

            </div>

            <div
                class="rounded-[28px]
                border border-slate-200 dark:border-white/10
                bg-white/70 dark:bg-white/5
                backdrop-blur-xl
                p-6">

                <p class="text-sm text-slate-500">
                    Status
                </p>

                <h2 class="mt-3 text-2xl font-black">
                    {{ ucfirst($submission->status) }}
                </h2>

            </div>

            <div
                class="rounded-[28px]
                border border-slate-200 dark:border-white/10
                bg-white/70 dark:bg-white/5
                backdrop-blur-xl
                p-6">

                <p class="text-sm text-slate-500">
                    Submitted At
                </p>

                <h2 class="mt-3 text-lg font-bold">
                    {{ $submission->submitted_at ?? $submission->created_at }}
                </h2>

            </div>

        </div>

        <div
            class="rounded-[28px]
            border border-slate-200 dark:border-white/10
            bg-white/70 dark:bg-white/5
            backdrop-blur-xl
            p-6">

            <h2 class="text-xl font-black mb-4">
                Feedback
            </h2>

            <p class="whitespace-pre-line text-slate-600 dark:text-slate-300 leading-relaxed">
                {{ $submission->feedback ?? 'Belum ada feedback.' }}
            </p>

        </div>

        <div
            class="rounded-[28px]
            border border-slate-200 dark:border-white/10
            bg-white/70 dark:bg-white/5
            backdrop-blur-xl
            overflow-hidden">

            <div class="p-6 border-b border-slate-200 dark:border-white/10">
                <h2 class="text-xl font-black">
                    Answer Details
                </h2>
            </div>

            <div class="divide-y divide-slate-200 dark:divide-white/10">

                @foreach ($submission->answers as $index => $answer)
                    <div class="p-6 space-y-3">

                        <div class="flex items-center justify-between gap-4">

                            <h3 class="font-bold">
                                Question {{ $index + 1 }}
                            </h3>

                            <span
                                class="px-3 py-1 rounded-full
                                bg-cyan-100 text-cyan-700
                                dark:bg-cyan-500/10 dark:text-cyan-300
                                text-sm font-bold">

                                {{ $answer->score }} / {{ $answer->max_score }}

                            </span>

                        </div>

                        @if ($answer->selected_option)
                            <p class="text-slate-600 dark:text-slate-300">
                                Selected Answer:
                                <strong>{{ $answer->selected_option }}</strong>
                            </p>

                            <p class="text-slate-600 dark:text-slate-300">
                                Result:
                                @if ($answer->is_correct)
                                    <span class="font-bold text-green-500">Correct</span>
                                @else
                                    <span class="font-bold text-red-500">Wrong</span>
                                @endif
                            </p>
                        @else
                            <p class="text-slate-600 dark:text-slate-300 whitespace-pre-line">
                                Answer:
                                {{ $answer->answer ?? '-' }}
                            </p>
                        @endif

                        @if ($answer->feedback)
                            <div
                                class="p-4 rounded-2xl
                                bg-slate-100 dark:bg-white/5
                                text-slate-600 dark:text-slate-300">

                                {{ $answer->feedback }}

                            </div>
                        @endif

                    </div>
                @endforeach

            </div>

        </div>

        <div class="flex gap-3">

            <a href="{{ route('missions.pretest') }}"
                class="px-6 py-3 rounded-2xl
                bg-gradient-to-r from-cyan-500 to-blue-600
                text-white font-bold">

                Back to Pretest

            </a>

            <a href="{{ route('missions') }}"
                class="px-6 py-3 rounded-2xl
                bg-slate-200 dark:bg-white/10
                text-slate-900 dark:text-white font-bold">

                Back to Missions

            </a>

        </div>

    </div>

</x-app-layout>
