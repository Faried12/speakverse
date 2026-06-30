<x-app-layout>

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
                    {{ ucfirst($skill) }} Test
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

                                @if(!empty($question->instruction))

                                    <p class="text-lg lg:text-xl font-black leading-relaxed mb-2">
                                        {{ $question->instruction }}
                                    </p>

                                @endif

                                <div class="mt-5 flex items-center gap-5">

                                    <!-- BUTTON -->

                                    <button
                                        type="button"
                                        class="tts-btn
                                        flex items-center
                                        justify-center
                                        gap-4
                                        w-72
                                        py-3
                                        px-6
                                        rounded-2xl
                                        transition-all duration-300
                                        bg-cyan-500/10"
                                        data-question="{{ $question->question }}">

                                        <span
                                            class="tts-icon
                                            text-cyan-500
                                            text-2xl">

                                            ▶

                                        </span>

                                        <span
                                            class="tts-label
                                            text-xl
                                            font-bold">

                                            Play

                                        </span>

                                    </button>

                                    <!-- TEXT -->

                                    <div>

                                        <p class="text-sm text-slate-500">

                                            Tap to hear the AI voice!

                                        </p>

                                    </div>

                                </div>
                                
                                <p class="mt-2 text-sm text-slate-500">
                                    Question {{ $index + 1 }} of {{ $questions->count() }}
                                </p>

                            </div>

                        </div>

                        @if (!empty($question->image))
                            <img src="{{ asset('storage/' . $question->image) }}"
                                class="w-full max-w-xl rounded-3xl border border-slate-200 dark:border-white/10 shadow-sm">
                        @endif


                        @if ($skill === 'reading' || $skill === 'listening')
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
                        @elseif ($skill === 'writing')
                            <div class="space-y-3">

                                <label class="font-black">
                                    Your Writing Answer
                                </label>

                                <textarea name="answers[{{ $question->id }}]" rows="9" required placeholder="Write your answer here..."
                                    class="w-full rounded-3xl
                                    border border-slate-300 dark:border-white/10
                                    bg-white dark:bg-white/5
                                    text-slate-900 dark:text-white
                                    p-5 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500"></textarea>

                                <p class="text-sm text-slate-500">
                                    Your answer will be assessed using AI based on content, organization, grammar,
                                    vocabulary, and mechanics.
                                </p>

                            </div>
                        @elseif ($skill === 'speaking')
                            <div class="space-y-3">

                                <label class="font-black">
                                    Your Speaking Response
                                </label>

                                <textarea name="answers[{{ $question->id }}]" rows="7" required
                                    placeholder="Type your speaking response here temporarily..."
                                    class="w-full rounded-3xl
                                    border border-slate-300 dark:border-white/10
                                    bg-white dark:bg-white/5
                                    text-slate-900 dark:text-white
                                    p-5 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500"></textarea>

                                <div
                                    class="p-4 rounded-2xl
                                    bg-yellow-100 text-yellow-800
                                    dark:bg-yellow-500/10 dark:text-yellow-300
                                    text-sm font-semibold">

                                    Saat ini jawaban speaking masih diketik sebagai transcript sementara.
                                    Nanti bagian ini bisa diganti menjadi fitur recorder audio.

                                </div>

                            </div>
                        @endif

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

    <script>
        document.querySelectorAll(".tts-btn").forEach(button => {

            const icon = button.querySelector(".tts-icon");
            const label = button.querySelector(".tts-label");

            let utterance = null;
            let state = "play";

            function setPlay() {

                state = "play";

                icon.innerHTML = "▶";
                label.innerHTML = "Play";

                button.classList.remove(
                    "bg-red-500/10",
                    "bg-green-500/10",
                    "bg-yellow-500/10"
                );
                button.classList.add("bg-cyan-500/10");

                icon.classList.remove(
                    "text-red-500",
                    "text-green-500",
                    "text-yellow-500"
                );
                icon.classList.add("text-cyan-500");

            }

            function setStop() {

                state = "stop";

                icon.innerHTML = "■";
                label.innerHTML = "Stop";

                button.classList.remove(
                    "bg-cyan-500/10",
                    "bg-green-500/10",
                    "bg-yellow-500/10"
                );
                button.classList.add("bg-red-500/10");

                icon.classList.remove(
                    "text-cyan-500",
                    "text-green-500",
                    "text-yellow-500"
                );
                icon.classList.add("text-red-500");

            }

            function setContinue() {

                state = "pause";

                icon.innerHTML = "▶";
                label.innerHTML = "Continue";

                button.classList.remove(
                    "bg-cyan-500/10",
                    "bg-red-500/10",
                    "bg-green-500/10"
                );
                button.classList.add("bg-yellow-500/10");

                icon.classList.remove(
                    "text-cyan-500",
                    "text-red-500",
                    "text-green-500"
                );
                icon.classList.add("text-yellow-500");

            }

            function setReplay() {

                state = "replay";

                icon.innerHTML = "↻";
                label.innerHTML = "Replay";

                button.classList.remove(
                    "bg-cyan-500/10",
                    "bg-red-500/10",
                    "bg-yellow-500/10"
                );
                button.classList.add("bg-green-500/10");

                icon.classList.remove(
                    "text-cyan-500",
                    "text-red-500",
                    "text-yellow-500"
                );
                icon.classList.add("text-green-500");

            }

            button.addEventListener("click", () => {

                // PLAY atau REPLAY
                if (state === "play" || state === "replay") {

                    speechSynthesis.cancel();

                    utterance = new SpeechSynthesisUtterance(
                        button.dataset.question
                    );

                    utterance.lang = "en-US";
                    utterance.rate = 0.9;

                    utterance.onend = () => {
                        setReplay();
                    };

                    speechSynthesis.speak(utterance);

                    setStop();
                }

                // STOP -> PAUSE
                else if (state === "stop") {

                    speechSynthesis.pause();

                    setContinue();

                }

                // CONTINUE -> RESUME
                else if (state === "pause") {

                    speechSynthesis.resume();

                    setStop();

                }

            });

        });
    </script>

</x-app-layout>
