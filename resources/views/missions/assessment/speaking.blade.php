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
                                    Details Scoring Criteria :
                                </p>

                                <table class="w-full">
                                  <tr>
                                    <td>Details</td>
                                    <td>{{ $answer->details_score }}/4</td>
                                  </tr>

                                  <tr>
                                    <td>Fluency</td>
                                    <td>{{ $answer->fluency_score }}/4</td>
                                  </tr>

                                  <tr>
                                    <td>Pronunciation</td>
                                    <td>{{ $answer->pronunciation_score }}/4</td>
                                  </tr>

                                  <tr>
                                    <td>Vocabulary</td>
                                    <td>{{ $answer->vocabulary_score }}/4</td>
                                  </tr>

                                  <tr>
                                    <td>Grammar</td>
                                    <td>{{ $answer->grammar_score }}/4</td>
                                  </tr>

                                </table>

                                <p class="mb-1 text-sm font-black text-cyan-500">
                                    AI Feedback :
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
                    {{ ucfirst($skill) }} Speaking Test
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
                Listen carefully to the question. Press <strong>Start Speaking</strong> to answer and <strong>Stop Speaking</strong> when you finish.
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

                            <div class="space-y-5">

                              <div class="mt-5 flex items-center gap-5">

                                <button
                                    type="button"
                                    class="record-btn
                                    flex items-center
                                    justify-center
                                    gap-4
                                    w-72
                                    py-3
                                    px-6
                                    rounded-2xl
                                    transition-all duration-300
                                    bg-cyan-500/10"
                                    data-id="{{ $question->id }}">

                                    <span
                                        class="record-icon
                                        text-cyan-500
                                        text-2xl">
                                        🎙
                                    </span>

                                    <span
                                        class="record-label
                                        text-xl
                                        font-bold">
                                        Start Speaking
                                    </span>

                                </button>

                                <div>
                                    <p
                                        id="info{{ $question->id }}"
                                        class="text-sm text-slate-500">

                                        Tap to start answering with your voice!

                                    </p>
                                </div>

                            </div>

                            <p
                            id="status{{ $question->id }}"
                            class="text-sm font-semibold text-slate-500">
                            Ready to record
                            </p>

                              <!-- Transcript -->

                              <label class="block text-lg font-bold">
                              Speech Transcript
                              </label>

                              <textarea
                                id="transcript{{ $question->id }}"
                                rows="6"
                                readonly
                                class="w-full
                                rounded-3xl
                                border
                                border-slate-300
                                dark:border-white/10
                                bg-white
                                dark:bg-white/5
                                p-5
                                resize-none"></textarea>

                              <input
                              type="hidden"
                              name="answers[{{ $question->id }}]"
                              id="answer{{ $question->id }}">
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

  <script>
    const SpeechRecognition =
        window.SpeechRecognition ||
        window.webkitSpeechRecognition;

    if (!SpeechRecognition) {
        alert("Your browser does not support Speech Recognition.");
    } else {
        const recognition = new SpeechRecognition();

        recognition.lang = "en-US";
        recognition.continuous = false;
        recognition.interimResults = false;

        let currentQuestion = null;
        let finalTranscript = "";
        let recording = false;

        document.querySelectorAll(".record-btn").forEach(button => {

            const icon = button.querySelector(".record-icon");
            const label = button.querySelector(".record-label");

            button.addEventListener("click", function () {
                currentQuestion = this.dataset.id;

                const transcript =
                    document.getElementById("transcript" + currentQuestion);
                const answer =
                    document.getElementById("answer" + currentQuestion);
                const status =
                    document.getElementById("status" + currentQuestion);
                const info =
                    document.getElementById("info" + currentQuestion);

                if (!recording) {

                    finalTranscript = "";
                    transcript.value = "";
                    answer.value = "";
                    recognition.start();
                    recording = true;

                    icon.innerHTML = "■";
                    label.innerHTML = "Stop Speaking";

                    button.classList.remove("bg-cyan-500/10");
                    button.classList.add("bg-red-500/10");

                    icon.classList.remove("text-cyan-500");
                    icon.classList.add("text-red-500");

                    status.innerHTML = "🎤 Recording...";
                    status.className =
                        "text-sm font-semibold text-red-500";

                    if(info){
                        info.innerHTML =
                        "Speak clearly into your microphone.";
                    }
                }
                else {
                    recognition.stop();
                }
            });
        });

        recognition.onresult = function (event) {

            let transcript = "";

            for (let i = event.resultIndex; i < event.results.length; i++) {
                transcript += event.results[i][0].transcript;
            }

            finalTranscript = transcript;
            document.getElementById(
                "transcript" + currentQuestion
            ).value = finalTranscript;
            document.getElementById(
                "answer" + currentQuestion
            ).value = finalTranscript;
        };

        recognition.onend = function () {

            recording = false;

            const button = document.querySelector(
                '.record-btn[data-id="' + currentQuestion + '"]'
            );
            const icon = button.querySelector(".record-icon");
            const label = button.querySelector(".record-label");
            const status =
                document.getElementById("status" + currentQuestion);
            const info =
                document.getElementById("info" + currentQuestion);
            icon.innerHTML = "↻";
            label.innerHTML = "Record Again";

            button.classList.remove("bg-red-500/10");
            button.classList.add("bg-green-500/10");

            icon.classList.remove("text-red-500");
            icon.classList.add("text-green-500");

            status.innerHTML = "✅ Recording Finished";
            status.className =
                "text-sm font-semibold text-green-500";
            if(info){
                info.innerHTML =
                "Your answer has been recorded. Tap Record Again if you want to retry.";
            }
        };

        recognition.onerror = function (event) {
            recording = false;
            alert("Speech Recognition Error : " + event.error);
        };

    }
  </script>

</x-app-layout>

