<x-app-layout>

<div class="space-y-8">

```
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
        bg-purple-400/10 rounded-full blur-3xl">
    </div>

    <div class="relative z-10">

        <div class="flex justify-between items-center">

            <div>

                <div
                    class="inline-flex items-center gap-2
                    px-4 py-2 rounded-full
                    bg-purple-500/10 border border-purple-400/20
                    text-purple-400 text-sm font-medium mb-5">

                    🎧 Listening Quiz

                </div>

                <h1
                    class="text-3xl md:text-4xl
                    font-black">

                    Unit 1 Listening Quiz

                </h1>

                <p class="mt-3 text-slate-500">

                    Listen carefully and answer the questions.

                </p>

            </div>

            <div class="text-right">

                <p class="text-sm font-medium text-slate-500 mb-1">
                    Question
                </p>

                <h2
                    id="questionCounter"
                    class="text-3xl md:text-4xl font-black text-purple-500">

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

                <!-- INSTRUCTION -->

                @if($material->instruction)

                    <div
                        class="mb-8 p-5 rounded-2xl
                        bg-purple-50 dark:bg-white/5
                        border border-purple-200 dark:border-white/10">

                        <h3
                            class="font-bold text-purple-500 mb-2">

                            Instruction

                        </h3>

                        <p>

                            {{ $material->instruction }}

                        </p>

                    </div>

                @endif

                <!-- AUDIO -->

                <div
                    class="rounded-3xl
                    border border-purple-200 dark:border-white/10
                    bg-purple-50 dark:bg-white/5
                    p-8 mb-8">

                    <div class="text-center">

                        <div class="text-6xl mb-4">
                            🎧
                        </div>

                        <h3 class="text-2xl font-bold mb-3">
                            Listen Carefully
                        </h3>

                        <p class="text-slate-500 mb-6">
                            Click play and listen to the audio.
                        </p>

                        <audio
                            controls
                            class="w-full">

                            <source
                                src="{{ asset('storage/'.$question->audio_file) }}"
                                type="audio/mpeg">

                            Your browser does not support audio.

                        </audio>

                    </div>

                </div>

                <!-- OPTIONS -->

                <div class="space-y-4">

                    <label
                        class="block p-4 rounded-2xl border cursor-pointer hover:bg-slate-50 dark:hover:bg-white/5">

                        <input
                            type="radio"
                            name="question_{{ $question->id }}"
                            value="A">

                        A. {{ $question->option_a }}

                    </label>

                    <label
                        class="block p-4 rounded-2xl border cursor-pointer hover:bg-slate-50 dark:hover:bg-white/5">

                        <input
                            type="radio"
                            name="question_{{ $question->id }}"
                            value="B">

                        B. {{ $question->option_b }}

                    </label>

                    <label
                        class="block p-4 rounded-2xl border cursor-pointer hover:bg-slate-50 dark:hover:bg-white/5">

                        <input
                            type="radio"
                            name="question_{{ $question->id }}"
                            value="C">

                        C. {{ $question->option_c }}

                    </label>

                    <label
                        class="block p-4 rounded-2xl border cursor-pointer hover:bg-slate-50 dark:hover:bg-white/5">

                        <input
                            type="radio"
                            name="question_{{ $question->id }}"
                            value="D">

                        D. {{ $question->option_d }}

                    </label>

                    @if($question->option_e)

                        <label
                            class="block p-4 rounded-2xl border cursor-pointer hover:bg-slate-50 dark:hover:bg-white/5">

                            <input
                                type="radio"
                                name="question_{{ $question->id }}"
                                value="E">

                            E. {{ $question->option_e }}

                        </label>

                    @endif

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
        border border-slate-200 dark:border-white/10">

        ← Previous

    </button>

    <div></div>

    <button
        id="nextBtn"
        class="px-6 py-3 rounded-2xl
        bg-gradient-to-r
        from-purple-500
        to-indigo-600
        text-white font-semibold">

        Next →

    </button>

    <button
        id="submitBtn"
        class="hidden px-6 py-3 rounded-2xl
        bg-gradient-to-r
        from-green-500
        to-emerald-600
        text-white font-semibold">

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

        <div class="text-center">

            <div class="text-6xl mb-4">
                🎉
            </div>

            <h2 class="text-4xl font-black">
                Quiz Completed
            </h2>

            <p class="text-slate-500 mt-2">
                Great job!
            </p>

            <div class="mt-8">

                <p class="text-slate-500">
                    Your Score
                </p>

                <h3
                    id="finalScore"
                    class="text-8xl font-black text-purple-500">

                    0

                </h3>

            </div>

        </div>

    </div>

    <a
        href="{{ route('missions') }}"
        class="inline-flex items-center justify-center
        w-full py-4 rounded-2xl
        bg-gradient-to-r
        from-purple-500
        to-indigo-600
        text-white font-semibold">

        Back to Unit 1

    </a>

</section>
```

</div>

<script>

let currentQuestion = 1;

const totalQuestions =
    Number('{{ $questions->count() }}');

const slides =
    document.querySelectorAll('.question-slide');

const counter =
    document.getElementById('questionCounter');

const prevBtn =
    document.getElementById('prevBtn');

const nextBtn =
    document.getElementById('nextBtn');

const submitBtn =
    document.getElementById('submitBtn');

function showQuestion(index)
{
    slides.forEach((slide,i) => {

        slide.classList.toggle(
            'hidden',
            i !== index - 1
        );

    });
}

function updateUI()
{
    counter.innerText =
        currentQuestion +
        ' / ' +
        totalQuestions;

    showQuestion(currentQuestion);

    prevBtn.classList.toggle(
        'hidden',
        currentQuestion === 1
    );

    nextBtn.classList.toggle(
        'hidden',
        currentQuestion === totalQuestions
    );

    submitBtn.classList.toggle(
        'hidden',
        currentQuestion !== totalQuestions
    );
}

nextBtn.addEventListener('click', () => {

    if(currentQuestion < totalQuestions)
    {
        currentQuestion++;
        updateUI();
    }

});

prevBtn.addEventListener('click', () => {

    if(currentQuestion > 1)
    {
        currentQuestion--;
        updateUI();
    }

});

submitBtn.addEventListener('click', () => {

    let totalScore = 0;

    slides.forEach(slide => {

        const correct =
            slide.dataset.correct;

        const score =
            Number(slide.dataset.score);

        const selected =
            slide.querySelector(
                'input[type="radio"]:checked'
            );

        if(selected &&
           selected.value === correct)
        {
            totalScore += score;
        }

    });

    document.getElementById(
        'finalScore'
    ).innerText = totalScore;

    document.getElementById(
        'quizCard'
    ).classList.add('hidden');

    document.getElementById(
        'navigationButtons'
    ).classList.add('hidden');

    document.getElementById(
        'resultSection'
    ).classList.remove('hidden');

});

updateUI();

</script>

</x-app-layout>
