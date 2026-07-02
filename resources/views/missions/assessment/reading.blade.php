<x-app-layout>

  @if(isset($submission))

    @php
        $score = $submission->final_score ?? 0;

        $scoreColor = $score >= 80 ? 'text-green-400' : ($score >= 60 ? 'text-blue-400' : 'text-cyan-400');

        $statusClass =
            $submission->status === 'completed'
                ? 'bg-green-500/10 text-green-400'
                : ($submission->status === 'failed'
                    ? 'bg-red-500/10 text-red-400'
                    : 'bg-yellow-500/10 text-yellow-400');
    @endphp

    <div class="max-w-6xl mx-auto space-y-8">

        @if (session('success'))
            <div
                class="p-4 rounded-2xl bg-green-100 text-green-700 dark:bg-green-500/10 dark:text-green-300 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <section
            class="relative overflow-hidden rounded-[40px]
            border border-slate-200 dark:border-white/10
            bg-white/80 dark:bg-white/5
            backdrop-blur-2xl p-8 lg:p-10">

            <div class="absolute -top-24 -right-24 w-80 h-80 bg-cyan-400/20 rounded-full blur-3xl"></div>

            <div class="relative z-10">

                <p class="text-sm font-black text-cyan-500 mb-3">
                    Assessment Result
                </p>

                <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">

                    <div>
                        <h1 class="text-4xl lg:text-5xl font-black">
                            {{ strtoupper($submission->type) }} - {{ ucfirst($submission->skill) }}
                        </h1>

                        <p class="mt-3 text-slate-500">
                            {{ $submission->lesson->title ?? '-' }} Assessment
                        </p>
                    </div>

                    <div
                        class="rounded-[28px] bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10 p-6 min-w-[220px]">
                        <p class="text-sm text-slate-500">
                            Final Score
                        </p>

                        <h2 class="mt-2 text-6xl font-black {{ $scoreColor }}">
                            {{ $score }}
                        </h2>
                    </div>

                </div>

            </div>

        </section>

        <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="rounded-[30px] border border-slate-200 dark:border-white/10 bg-white/80 dark:bg-white/5 p-6">
                <p class="text-sm text-slate-500">
                    Status
                </p>

                <div class="mt-4">
                    <span class="inline-flex px-4 py-2 rounded-full text-sm font-black {{ $statusClass }}">
                        {{ ucfirst($submission->status) }}
                    </span>
                </div>
            </div>

            <div class="rounded-[30px] border border-slate-200 dark:border-white/10 bg-white/80 dark:bg-white/5 p-6">
                <p class="text-sm text-slate-500">
                    Submitted At
                </p>

                <h2 class="mt-4 text-lg font-black">
                    {{ $submission->submitted_at?->format('d M Y, H:i') ?? $submission->created_at->format('d M Y, H:i') }}
                </h2>
            </div>

            <div class="rounded-[30px] border border-slate-200 dark:border-white/10 bg-white/80 dark:bg-white/5 p-6">
                <p class="text-sm text-slate-500">
                    Total Answers
                </p>

                <h2 class="mt-3 text-5xl font-black text-cyan-400">
                    {{ $submission->answers->count() }}
                </h2>
            </div>

        </section>

        <section
            class="rounded-[32px]
            border border-slate-200 dark:border-white/10
            bg-white/80 dark:bg-white/5
            p-7">

            <h2 class="text-2xl font-black mb-4">
                Feedback
            </h2>

            <p class="whitespace-pre-line text-slate-600 dark:text-slate-300 leading-relaxed">
                {{ $submission->feedback ?? 'Belum ada feedback.' }}
            </p>

        </section>

        <section
            class="rounded-[32px]
            border border-slate-200 dark:border-white/10
            bg-white/80 dark:bg-white/5
            overflow-hidden">

            <div class="p-6 border-b border-slate-200 dark:border-white/10">
                <h2 class="text-2xl font-black">
                    Answer Details
                </h2>
            </div>

            <div class="divide-y divide-slate-200 dark:divide-white/10">

                @forelse ($submission->answers as $index => $answer)
                    <div class="p-6 space-y-4">

                        <div class="flex items-center justify-between gap-4">

                            <h3 class="text-lg font-black">
                                Question {{ $index + 1 }}
                            </h3>

                            <span
                                class="px-4 py-2 rounded-full
                                bg-cyan-100 text-cyan-700
                                dark:bg-cyan-500/10 dark:text-cyan-300
                                text-sm font-black">
                                {{ $answer->score }} / {{ $answer->max_score }}
                            </span>

                        </div>

                        @if ($answer->selected_option)
                            <div class="space-y-2">
                                <p class="text-slate-600 dark:text-slate-300">
                                    Selected Answer:
                                    <strong>{{ $answer->selected_option }}</strong>
                                </p>

                                <p class="text-slate-600 dark:text-slate-300">
                                    Result:
                                    @if ($answer->is_correct)
                                        <span class="font-black text-green-500">Correct</span>
                                    @else
                                        <span class="font-black text-red-500">Wrong</span>
                                    @endif
                                </p>
                            </div>
                        @else
                            <div>
                                <p class="mb-2 text-sm font-bold text-slate-500">
                                    Answer
                                </p>

                                <div
                                    class="p-4 rounded-2xl bg-slate-100 dark:bg-white/5 text-slate-700 dark:text-slate-300 whitespace-pre-line">
                                    {{ $answer->answer ?? '-' }}
                                </div>
                            </div>
                        @endif

                        @if ($answer->feedback)
                            <div
                                class="p-4 rounded-2xl
                                bg-blue-50 text-slate-700
                                dark:bg-white/5 dark:text-slate-300">

                                <p class="mb-1 text-sm font-black text-cyan-500">
                                    AI Feedback
                                </p>

                                <p>
                                    {{ $answer->feedback }}
                                </p>

                            </div>
                        @endif

                    </div>
                @empty
                    <div class="p-12 text-center">
                        <div class="text-6xl mb-4">
                            📭
                        </div>

                        <h3 class="text-xl font-black">
                            No Answer Details
                        </h3>

                        <p class="mt-2 text-slate-500">
                            Detail jawaban belum tersedia.
                        </p>
                    </div>
                @endforelse

            </div>

        </section>

        <div class="flex flex-col sm:flex-row gap-3">

            <a href="{{ route('missions.pretest') }}"
                class="px-6 py-3 rounded-2xl
                bg-gradient-to-r from-cyan-500 to-blue-600
                text-white font-black text-center">

                Back to Pretest

            </a>

            <a href="{{ route('progress') }}"
                class="px-6 py-3 rounded-2xl
                bg-slate-200 dark:bg-white/10
                text-slate-900 dark:text-white font-black text-center">

                Back to Progress

            </a>

            <a href="{{ route('missions') }}"
                class="px-6 py-3 rounded-2xl
                bg-slate-200 dark:bg-white/10
                text-slate-900 dark:text-white font-black text-center">

                Back to Missions

            </a>

        </div>

    </div>

    @else
    <div class="max-w-6xl mx-auto space-y-8">

        <!-- HEADER -->
        <section
            class="relative overflow-hidden rounded-[40px]
            border border-slate-200 dark:border-white/10
            bg-white/80 dark:bg-white/5
            backdrop-blur-2xl p-8 lg:p-10">

            <div class="absolute -top-24 -right-24 w-80 h-80 bg-cyan-400/20 rounded-full blur-3xl"></div>

            <div class="relative z-10">

                <p class="text-cyan-500 font-black mb-3">
                    {{ strtoupper($type) }} Assessment
                </p>

                <h1 class="text-4xl lg:text-5xl font-black">
                    {{ ucfirst($skill) }} Reading Test
                </h1>

                <p class="mt-3 text-slate-500">
                    {{ $lesson->title }} Assessment
                </p>

            </div>

        </section>

        @if (session('success'))
            <div class="p-4 rounded-2xl bg-green-100 text-green-700 font-bold">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 rounded-2xl bg-red-100 text-red-700 font-bold">
                {{ session('error') }}
            </div>
        @endif

        <!-- INFO -->
        <section
            class="rounded-[30px]
            border border-slate-200 dark:border-white/10
            bg-white/80 dark:bg-white/5
            p-6">

            <h2 class="text-xl font-black">
                Total Questions: {{ $questions->count() }}
            </h2>

            <p class="mt-2 text-slate-500">
                Answer all questions below, then submit your assessment.
            </p>

        </section>

        @if ($questions->count())

            <form action="{{ route('student.assessment.submit', ['type' => $type, 'skill' => $skill]) }}" method="POST"
                class="space-y-6">

                @csrf

                @foreach ($questions as $index => $question)
                    <section
                        class="rounded-[32px]
                        border border-slate-200 dark:border-white/10
                        bg-white/80 dark:bg-white/5
                        p-6 lg:p-8 space-y-6">

                        <div class="flex items-start gap-4">

                            <div
                                class="w-10 h-10 shrink-0 rounded-2xl
                                bg-cyan-500/10 text-cyan-500
                                flex items-center justify-center
                                font-black">
                                {{ $index + 1 }}
                            </div>

                            <div>
                                <p class="text-lg lg:text-xl font-black leading-relaxed">
                                    {{ $question->question }}
                                </p>

                                <p class="mt-2 text-sm text-slate-500">
                                    Question {{ $index + 1 }} of {{ $questions->count() }}
                                </p>

                            </div>

                        </div>

                        @if (!empty($question->image))
                            <img src="{{ asset('storage/' . $question->image) }}"
                                class="w-full max-w-xl rounded-3xl border border-slate-200 dark:border-white/10 shadow-sm">
                        @endif

                            <div class="space-y-3">

                                @foreach (['A', 'B', 'C', 'D', 'E'] as $option)
                                    @php
                                        $field = 'option_' . strtolower($option);
                                    @endphp

                                    @if (!empty($question->$field))
                                        <label
                                            class="group flex items-start gap-4
                                            p-4 rounded-2xl
                                            border border-slate-200 dark:border-white/10
                                            bg-slate-50 dark:bg-white/5
                                            hover:border-cyan-400
                                            hover:bg-cyan-500/5
                                            cursor-pointer transition">

                                            <input type="radio" name="answers[{{ $question->id }}]"
                                                value="{{ $option }}" required
                                                class="mt-1 text-cyan-500 focus:ring-cyan-500">

                                            <span>
                                                {{ $question->$field }}
                                            </span>

                                        </label>
                                    @endif
                                @endforeach

                            </div>

                    </section>
                @endforeach

                <!-- ACTION -->
                <div class="flex flex-col sm:flex-row gap-3">

                    <button type="submit"
                        class="px-7 py-4 rounded-2xl
                        bg-gradient-to-r from-cyan-500 to-blue-600
                        text-white font-black
                        hover:scale-[1.02] transition">

                        Submit Assessment

                    </button>

                    <a href="{{ route('missions.pretest') }}"
                        class="px-7 py-4 rounded-2xl
                        bg-slate-200 dark:bg-white/10
                        text-slate-900 dark:text-white
                        font-black text-center">

                        Back

                    </a>

                </div>

            </form>
        @else
            <section
                class="p-14 text-center rounded-[32px]
                border border-slate-200 dark:border-white/10
                bg-white/80 dark:bg-white/5">

                <div class="text-7xl mb-5">
                    ❓
                </div>

                <h3 class="text-2xl font-black">
                    No Questions Yet
                </h3>

                <p class="mt-3 text-slate-500">
                    Admin belum menambahkan soal untuk bagian ini.
                </p>

                <a href="{{ route('missions.pretest') }}"
                    class="inline-flex mt-6 px-6 py-3 rounded-2xl
                    bg-gradient-to-r from-cyan-500 to-blue-600
                    text-white font-black">

                    Back to Pretest

                </a>

            </section>

        @endif

    </div>

  @endif

</x-app-layout>
