<x-app-layout>

<div class="space-y-8">

<!-- HEADER -->
<section
    class="relative overflow-hidden rounded-[32px]
    border border-slate-200 dark:border-white/10
    bg-white/70 dark:bg-white/5
    backdrop-blur-2xl
    p-6 md:p-8 lg:p-10">

    <div
        class="absolute top-[-100px] right-[-100px]
        w-[250px] h-[250px]
        bg-cyan-400/10 rounded-full blur-3xl">
    </div>

    <div class="relative z-10">

        <div class="flex justify-between items-center">

            <div>

                <div
                    class="inline-flex items-center gap-2
                    px-4 py-2 rounded-full
                    bg-cyan-500/10 border border-cyan-400/20
                    text-cyan-400 text-sm font-medium mb-5">

                    📖 Reading Quiz

                </div>

                <h1
                    class="text-3xl md:text-4xl
                    font-black">

                    Unit 1 Reading Quiz

                </h1>

                <p class="mt-3 text-slate-500">

                    Answer all questions based on the passage.

                </p>

            </div>

            <div class="text-right">

                <p class="text-sm font-medium text-slate-500 mb-1">
                    Question
                </p>

                <h2
                    id="questionCounter"
                    class="text-3xl md:text-4xl font-black text-cyan-500">
                    1 / {{ $questions->count() }}
                </h2>

            </div>

        </div>

    </div>

</section>

<!-- QUIZ -->
<section
    id="quizCard"
    class="rounded-[32px]
    border border-slate-200 dark:border-white/10
    bg-white/70 dark:bg-white/5
    backdrop-blur-xl
    p-8">

    <form id="quizForm">

        @foreach($questions as $index => $question)

            <div
              class="question-slide {{ $index != 0 ? 'hidden' : '' }}"
              data-index="{{ $index }}"
              data-correct="{{ $question->correct_answer }}"
              data-score="{{ $question->score }}">

                <h6 class="text-lg mb-8">
                    {{ $question->question }}
                </h6>

                <div class="space-y-4">

                    <label class="block p-4 rounded-2xl border cursor-pointer">
                        <input
                            type="radio"
                            name="question_{{ $question->id }}"
                            value="A">

                        A. {{ $question->option_a }}
                    </label>

                    <label class="block p-4 rounded-2xl border cursor-pointer">
                        <input
                            type="radio"
                            name="question_{{ $question->id }}"
                            value="B">

                        B. {{ $question->option_b }}
                    </label>

                    <label class="block p-4 rounded-2xl border cursor-pointer">
                        <input
                            type="radio"
                            name="question_{{ $question->id }}"
                            value="C">

                        C. {{ $question->option_c }}
                    </label>

                    <label class="block p-4 rounded-2xl border cursor-pointer">
                        <input
                            type="radio"
                            name="question_{{ $question->id }}"
                            value="D">

                        D. {{ $question->option_d }}
                    </label>

                    <label class="block p-4 rounded-2xl border cursor-pointer">
                        <input
                            type="radio"
                            name="question_{{ $question->id }}"
                            value="E">

                        E. {{ $question->option_e }}
                    </label>

                </div>

            </div>

        @endforeach

    </form>

</section>

<!-- NAVIGATION -->
<section
    id="navigationButtons"
    class="flex justify-between items-center">

    <button
        id="prevBtn"
        class="hidden px-6 py-3 rounded-2xl
        border border-slate-200 dark:border-white/10

        hover:bg-slate-100
        dark:hover:bg-white/5
        transition-all">

        ← Previous

    </button>

    <div></div>

    <button
        id="nextBtn"
        class="px-6 py-3 rounded-2xl

        bg-gradient-to-r
        from-cyan-500
        to-blue-600

        text-white font-semibold

        hover:scale-[1.02]
        transition-all duration-300
        shadow-lg shadow-cyan-500/20">

        Next →

    </button>

    <button
        id="submitBtn"
        class="hidden px-6 py-3 rounded-2xl

        bg-gradient-to-r
        from-green-500
        to-emerald-600

        text-white font-semibold

        hover:scale-[1.02]
        transition-all duration-300">

        Submit Quiz
    </button>

</section>

<!-- RESULT -->
<section
    id="resultSection"
    class="hidden space-y-6">

    <div
        class="rounded-[32px]
        border border-slate-200 dark:border-white/10
        bg-white/70 dark:bg-white/5
        backdrop-blur-xl
        p-10">

        <div class="flex items-center justify-center gap-4 mb-3">

            <div class="text-5xl">
                🎉
            </div>

            <h2 class="text-4xl font-black">
                Quiz Completed
            </h2>

        </div>

        <p class="text-base text-slate-600 dark:text-slate-300 mb-10 text-center">
            Great job! Here is your result.
        </p>

        <div class="text-center">

            <p class="text-base font-medium text-slate-500 mb-3">
                Your Score
            </p>

            <h3
                id="finalScore"
                class="text-8xl font-black text-cyan-400">

                0

            </h3>

        </div>

    </div>


    <a
        href="{{ route('missions') }}"
        class="inline-flex items-center justify-center
        w-full py-4 rounded-2xl

        bg-gradient-to-r
        from-cyan-500
        to-blue-600

        text-white font-semibold">

        Back to Unit 1

    </a>

</section>


</div>

<script>

let currentQuestion = 1;
const totalQuestions = Number('{{ $questions->count() }}');

const counter = document.getElementById('questionCounter');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const submitBtn = document.getElementById('submitBtn');

const slides =
    document.querySelectorAll('.question-slide');

function showQuestion(index) {

    slides.forEach((slide, i) => {

        if (i === index - 1) {
            slide.classList.remove('hidden');
        } else {
            slide.classList.add('hidden');
        }

    });

}

function updateUI() {

    counter.innerText =
        currentQuestion + ' / ' + totalQuestions;

    showQuestion(currentQuestion);

    if (currentQuestion <= 1) {

        prevBtn.classList.add('hidden');

    } else {

        prevBtn.classList.remove('hidden');

    }

    if (currentQuestion >= totalQuestions) {

        nextBtn.classList.add('hidden');
        submitBtn.classList.remove('hidden');

    } else {

        nextBtn.classList.remove('hidden');
        submitBtn.classList.add('hidden');

    }

}

nextBtn.addEventListener('click', () => {

    if (currentQuestion < totalQuestions) {

        currentQuestion++;
        updateUI();

    }

});

prevBtn.addEventListener('click', () => {

    if (currentQuestion > 1) {

        currentQuestion--;
        updateUI();

    }

});

submitBtn.addEventListener('click', () => {

    let totalScore = 0;

    slides.forEach(slide => {

        const correctAnswer =
            slide.dataset.correct;

        const questionScore =
            Number(slide.dataset.score);

        const selected =
            slide.querySelector(
                'input[type="radio"]:checked'
            );

        if (selected &&
            selected.value === correctAnswer) {

            totalScore += questionScore;

        }

    });

    document.getElementById('finalScore')
        .innerText = totalScore;

    document.getElementById('quizCard')
        .classList.add('hidden');

    document.getElementById('navigationButtons')
        .classList.add('hidden');

    document.getElementById('resultSection')
        .classList.remove('hidden');

});

updateUI();

</script>

</x-app-layout>
