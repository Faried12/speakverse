<x-app-layout>

    <div class="space-y-8">

        <section
            class="relative overflow-hidden rounded-[32px]
        border border-slate-200 dark:border-white/10
        bg-white/70 dark:bg-white/5
        backdrop-blur-2xl
        p-6 md:p-8 lg:p-10">

            <div class="absolute top-[-100px] right-[-100px] w-[250px] h-[250px] bg-cyan-400/10 rounded-full blur-3xl">
            </div>

            <div class="relative z-10">
                <div class="flex justify-between items-center gap-6">
                    <div>
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-cyan-500/10 border border-cyan-400/20 text-cyan-400 text-sm font-medium mb-5">
                            📖 Reading Quiz
                        </div>

                        <h1 class="text-3xl md:text-4xl font-black">
                            {{ $lesson->title }} Quiz
                        </h1>

                        <p class="mt-3 text-slate-500">
                            Answer all questions based on the passage.
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="text-sm font-medium text-slate-500 mb-1">
                            Question
                        </p>

                        <h2 id="questionCounter" class="text-3xl md:text-4xl font-black text-cyan-500">
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
                                        hover:bg-cyan-500/5
                                        hover:border-cyan-400
                                        transition">

                                            <input type="radio" name="question_{{ $question->id }}"
                                                value="{{ $option }}"
                                                class="mr-3 text-cyan-500 focus:ring-cyan-500">

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
                        Admin belum menambahkan soal untuk reading ini.
                    </p>
                </div>
            @endif

        </section>

        @if ($questions->count())
            <section id="navigationButtons" class="flex justify-between items-center">
                <button id="prevBtn" type="button"
                    class="hidden px-6 py-3 rounded-2xl border border-slate-200 dark:border-white/10 hover:bg-slate-100 dark:hover:bg-white/5 transition-all">
                    ← Previous
                </button>

                <div></div>

                <button id="nextBtn" type="button"
                    class="px-6 py-3 rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-semibold hover:scale-[1.02] transition-all duration-300 shadow-lg shadow-cyan-500/20">
                    Next →
                </button>

                <button id="submitBtn" type="button"
                    class="hidden px-6 py-3 rounded-2xl bg-gradient-to-r from-green-500 to-emerald-600 text-white font-semibold hover:scale-[1.02] transition-all duration-300">
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

                    <div class="flex items-center justify-center gap-4 mb-3">
                        <div class="text-5xl">🎉</div>

                        <h2 class="text-4xl font-black">
                            Quiz Completed
                        </h2>
                    </div>

                    <p class="text-base text-slate-600 dark:text-slate-300 mb-10 text-center">
                        Great job! Your reading progress has been saved.
                    </p>

                    <div class="text-center">
                        <p class="text-base font-medium text-slate-500 mb-3">
                            Your Score
                        </p>

                        <h3 id="finalScore" class="text-8xl font-black text-cyan-400">
                            0
                        </h3>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="{{ route('student.reading', $lesson) }}"
                        class="inline-flex items-center justify-center w-full py-4 rounded-2xl bg-slate-200 dark:bg-white/10 text-slate-900 dark:text-white font-semibold">
                        Back to Reading
                    </a>

                    <a href="{{ route('missions') }}"
                        class="inline-flex items-center justify-center w-full py-4 rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-semibold">
                        Back to Missions
                    </a>
                </div>
            </section>
        @endif

    </div>

    <script>
        let currentQuestion = 1;

        const totalQuestions = Number('{{ $questions->count() }}');
        const completeUrl = "{{ route('student.reading.complete', $lesson) }}";
        const csrfToken = "{{ csrf_token() }}";

        const counter = document.getElementById('questionCounter');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        const slides = document.querySelectorAll('.question-slide');

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
                    const correctAnswer = slide.dataset.correct;
                    const questionScore = Number(slide.dataset.score);
                    const selected = slide.querySelector('input[type="radio"]:checked');

                    if (!selected) {
                        alert('Please answer all questions before submitting.');
                        return;
                    }

                    const questionId = selected.name.replace('question_', '');
                    answers[questionId] = selected.value;

                    if (selected.value === correctAnswer) {
                        totalScore += questionScore;
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
