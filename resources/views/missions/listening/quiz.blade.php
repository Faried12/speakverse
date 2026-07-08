<x-app-layout>

    <div class="space-y-8">

        <section
            class="relative overflow-hidden rounded-[32px]
        border border-slate-200 dark:border-white/10
        bg-white/70 dark:bg-white/5
        backdrop-blur-2xl
        p-6 md:p-8 lg:p-10">

            <div class="absolute top-[-100px] right-[-100px] w-[250px] h-[250px] bg-purple-400/10 rounded-full blur-3xl">
            </div>

            <div class="relative z-10">
                <div class="flex justify-between items-center gap-6">
                    <div>
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-purple-500/10 border border-purple-400/20 text-purple-400 text-sm font-medium mb-5">
                            🎧 Listening Quiz
                        </div>

                        <h1 class="text-3xl md:text-4xl font-black">
                            {{ $lesson->title }} Quiz
                        </h1>

                        <p class="mt-3 text-slate-500">
                            Listen carefully and answer the questions.
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="text-sm font-medium text-slate-500 mb-1">
                            Question
                        </p>

                        <h2 id="questionCounter" class="text-3xl md:text-4xl font-black text-purple-500">
                            1 / {{ $questions->count() }}
                        </h2>
                    </div>
                </div>
            </div>
        </section>

        <section id="quizCard"
            class="rounded-[32px]
        border border-slate-200 dark:border-white/10
        bg-white/70 dark:bg-white/5
        backdrop-blur-xl
        p-8">

            @if ($questions->count())
                <form id="quizForm">
                    @csrf

                    @foreach ($questions as $index => $question)
                        <div class="question-slide {{ $index != 0 ? 'hidden' : '' }}" data-index="{{ $index }}"
                            data-correct="{{ $question->correct_answer }}" data-score="{{ $question->score }}">

                            @if ($material->instruction)
                                <div
                                    class="mb-8 p-5 rounded-2xl bg-purple-50 dark:bg-white/5 border border-purple-200 dark:border-white/10">
                                    <h3 class="font-bold text-purple-500 mb-2">
                                        Instruction
                                    </h3>

                                    <p>
                                        {{ $material->instruction }}
                                    </p>
                                </div>
                            @endif

                            @if ($material->audio_file)
                                <div
                                    class="rounded-3xl border border-purple-200 dark:border-white/10 bg-purple-50 dark:bg-white/5 p-8 mb-8">
                                    <div class="text-center">
                                        <div class="text-6xl mb-4">🎧</div>

                                        <h3 class="text-2xl font-bold mb-3">
                                            Listen Carefully
                                        </h3>

                                        <p class="text-slate-500 mb-6">
                                            Click play and listen to the audio.
                                        </p>

                                        <audio controls class="w-full">
                                            <source src="{{ asset('storage/' . $material->audio_file) }}"
                                                type="audio/mpeg">
                                            Your browser does not support audio.
                                        </audio>
                                    </div>
                                </div>
                            @endif

                            <h6 class="text-lg md:text-xl font-bold mb-8 leading-relaxed">
                                {{ $question->question }}
                            </h6>

                            <div class="space-y-4">
                                @foreach (['A', 'B', 'C', 'D', 'E'] as $option)
                                    @php
                                        $field = 'option_' . strtolower($option);
                                    @endphp

                                    @if (!empty($question->$field))
                                        <label
                                            class="block p-4 rounded-2xl
                                        border border-slate-200 dark:border-white/10
                                        cursor-pointer
                                        hover:bg-purple-500/5
                                        hover:border-purple-400
                                        transition">

                                            <input type="radio" name="question_{{ $question->id }}"
                                                value="{{ $option }}"
                                                class="mr-3 text-purple-500 focus:ring-purple-500">

                                            {{ $question->$field }}
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </form>
            @else
                <div class="text-center py-12">
                    <div class="text-6xl mb-4">❓</div>

                    <h2 class="text-2xl font-black">
                        No Questions Yet
                    </h2>

                    <p class="mt-2 text-slate-500">
                        Admin belum menambahkan soal untuk listening ini.
                    </p>
                </div>
            @endif

        </section>

        @if ($questions->count())
            <section id="navigationButtons" class="flex justify-between items-center">
                <button id="prevBtn" type="button"
                    class="hidden px-6 py-3 rounded-2xl border border-slate-200 dark:border-white/10">
                    ← Previous
                </button>

                <div></div>

                <button id="nextBtn" type="button"
                    class="px-6 py-3 rounded-2xl bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold">
                    Next →
                </button>

                <button id="submitBtn" type="button"
                    class="hidden px-6 py-3 rounded-2xl bg-gradient-to-r from-green-500 to-emerald-600 text-white font-semibold">
                    Submit Quiz
                </button>
            </section>

            <section id="resultSection" class="hidden space-y-6">
                <div
                    class="rounded-[32px]
                border border-slate-200 dark:border-white/10
                bg-white/70 dark:bg-white/5
                backdrop-blur-xl
                p-10">

                    <div class="text-center">
                        <div class="text-6xl mb-4">🎉</div>

                        <h2 class="text-4xl font-black">
                            Quiz Completed
                        </h2>

                        <p class="text-slate-500 mt-2">
                            Great job! Your listening progress has been saved.
                        </p>

                        <div class="mt-8">
                            <p class="text-slate-500">
                                Your Score
                            </p>

                            <h3 id="finalScore" class="text-8xl font-black text-purple-500">
                                0
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="{{ route('student.listening', $lesson) }}"
                        class="inline-flex items-center justify-center w-full py-4 rounded-2xl bg-slate-200 dark:bg-white/10 text-slate-900 dark:text-white font-semibold">
                        Back to Listening
                    </a>

                    <a href="{{ route('missions') }}"
                        class="inline-flex items-center justify-center w-full py-4 rounded-2xl bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold">
                        Back to Missions
                    </a>
                </div>
            </section>
        @endif

    </div>

    <script>
        let currentQuestion = 1;

        const totalQuestions = Number('{{ $questions->count() }}');
        const completeUrl = "{{ route('student.listening.complete', $lesson) }}";
        const csrfToken = "{{ csrf_token() }}";

        const slides = document.querySelectorAll('.question-slide');
        const counter = document.getElementById('questionCounter');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');

        function showQuestion(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('hidden', i !== index - 1);
            });
        }

        function updateUI() {
            if (!counter || totalQuestions === 0) {
                return;
            }

            counter.innerText = currentQuestion + ' / ' + totalQuestions;

            showQuestion(currentQuestion);

            prevBtn.classList.toggle('hidden', currentQuestion === 1);
            nextBtn.classList.toggle('hidden', currentQuestion === totalQuestions);
            submitBtn.classList.toggle('hidden', currentQuestion !== totalQuestions);
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                if (currentQuestion < totalQuestions) {
                    currentQuestion++;
                    updateUI();
                }
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                if (currentQuestion > 1) {
                    currentQuestion--;
                    updateUI();
                }
            });
        }

        if (submitBtn) {
            submitBtn.addEventListener('click', async () => {
                let totalScore = 0;
                let answers = {};

                for (const slide of slides) {
                    const correct = slide.dataset.correct;
                    const score = Number(slide.dataset.score);
                    const selected = slide.querySelector('input[type="radio"]:checked');

                    if (!selected) {
                        alert('Please answer all questions before submitting.');
                        return;
                    }

                    const questionId = selected.name.replace('question_', '');
                    answers[questionId] = selected.value;

                    if (selected.value === correct) {
                        totalScore += score;
                    }
                }

                try {
                    const response = await fetch(completeUrl, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            score: totalScore,
                            answers: answers
                        })
                    });

                    const result = await response.json();

                    document.getElementById('finalScore').innerText = result.score ?? totalScore;
                } catch (error) {
                    console.error(error);
                    document.getElementById('finalScore').innerText = totalScore;
                }

                document.getElementById('quizCard').classList.add('hidden');
                document.getElementById('navigationButtons').classList.add('hidden');
                document.getElementById('resultSection').classList.remove('hidden');

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }

        updateUI();
    </script>

</x-app-layout>
