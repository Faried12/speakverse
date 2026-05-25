<x-app-layout>

<div class="max-w-5xl mx-auto py-10 px-4">

    <div class="mb-8">

        <h1 class="text-4xl font-black text-slate-900 dark:text-white">
            Vocabulary Pre-Test
        </h1>

        <p class="mt-2 text-slate-500 dark:text-slate-400">
            Answer all questions before starting the learning mission.
        </p>

    </div>

    <form action="{{ route('vocabulary.pretest.submit') }}"
        method="POST">

        @csrf

        @foreach($questions as $question)

        <div
            class="question-slide {{ $loop->first ? '' : 'hidden' }}
            mb-8 p-6 lg:p-8 rounded-[32px]
            border border-slate-200 dark:border-white/10
            bg-white dark:bg-white/[0.03]
            shadow-sm">

            <h3
                class="font-bold text-xl mb-6
                text-slate-900 dark:text-white">

                {{ $loop->iteration }}.
                {{ $question->question }}

            </h3>

            <div class="space-y-4">

            <!-- OPTION A -->
            <label
                class="flex items-center gap-4
                p-4 rounded-2xl
                border border-slate-200 dark:border-white/10
                bg-slate-50 dark:bg-white/[0.03]
                hover:border-cyan-500
                cursor-pointer transition-all duration-200">

                <input
                    type="radio"
                    name="answers[{{ $question->id }}]"
                    value="A"
                    class="w-5 h-5">

                <span class="text-slate-700 dark:text-slate-200">
                    {{ $question->option_a }}
                </span>

            </label>

            <!-- OPTION B -->
            <label
                class="flex items-center gap-4
                p-4 rounded-2xl
                border border-slate-200 dark:border-white/10
                bg-slate-50 dark:bg-white/[0.03]
                hover:border-cyan-500
                cursor-pointer transition-all duration-200">

                <input
                    type="radio"
                    name="answers[{{ $question->id }}]"
                    value="B"
                    class="w-5 h-5">

                <span class="text-slate-700 dark:text-slate-200">
                    {{ $question->option_b }}
                </span>

            </label>

            <!-- OPTION C -->
            <label
                class="flex items-center gap-4
                p-4 rounded-2xl
                border border-slate-200 dark:border-white/10
                bg-slate-50 dark:bg-white/[0.03]
                hover:border-cyan-500
                cursor-pointer transition-all duration-200">

                <input
                    type="radio"
                    name="answers[{{ $question->id }}]"
                    value="C"
                    class="w-5 h-5">

                <span class="text-slate-700 dark:text-slate-200">
                    {{ $question->option_c }}
                </span>

            </label>

            <!-- OPTION D -->
            <label
                class="flex items-center gap-4
                p-4 rounded-2xl
                border border-slate-200 dark:border-white/10
                bg-slate-50 dark:bg-white/[0.03]
                hover:border-cyan-500
                cursor-pointer transition-all duration-200">

                <input
                    type="radio"
                    name="answers[{{ $question->id }}]"
                    value="D"
                    class="w-5 h-5">

                <span class="text-slate-700 dark:text-slate-200">
                    {{ $question->option_d }}
                </span>

            </label>

            <!-- OPTION E -->
            <label
                class="flex items-center gap-4
                p-4 rounded-2xl
                border border-slate-200 dark:border-white/10
                bg-slate-50 dark:bg-white/[0.03]
                hover:border-cyan-500
                cursor-pointer transition-all duration-200">

                <input
                    type="radio"
                    name="answers[{{ $question->id }}]"
                    value="E"
                    class="w-5 h-5">

                <span class="text-slate-700 dark:text-slate-200">
                    {{ $question->option_e }}
                </span>

            </label>

        </div>

        </div>

        @endforeach

        <div class="flex justify-between mt-8">

            <button
                type="button"
                id="prevBtn"
                class="hidden
                px-6 py-3 rounded-2xl
                bg-slate-100 dark:bg-white/5
                border border-slate-200 dark:border-white/10
                hover:bg-slate-200 dark:hover:bg-white/10
                transition-all duration-200">

                Previous

            </button>

            <button
                type="button"
                id="nextBtn"
                class="ml-auto
                px-6 py-3 rounded-2xl
                bg-gradient-to-r
                from-cyan-500
                to-blue-600
                text-white font-bold">

                Next

            </button>

            <button
                type="submit"
                id="submitBtn"
                class="hidden
                px-8 py-3 rounded-2xl
                bg-gradient-to-r
                from-green-500
                to-emerald-600
                text-white font-bold">

                Submit Test

            </button>

        </div>

    </form>

</div>

</x-app-layout>
<script>

let current = 0;

const slides =
document.querySelectorAll('.question-slide');

const prevBtn =
document.getElementById('prevBtn');

const nextBtn =
document.getElementById('nextBtn');

const submitBtn =
document.getElementById('submitBtn');

if (slides.length === 0)
{
    console.error('No questions found');
}

function showSlide(index)
{
    slides.forEach(slide =>
        slide.classList.add('hidden')
    );

    slides[index]
        .classList.remove('hidden');

    prevBtn.classList.toggle(
        'hidden',
        index === 0
    );

    nextBtn.classList.toggle(
        'hidden',
        index === slides.length - 1
    );

    submitBtn.classList.toggle(
        'hidden',
        index !== slides.length - 1
    );
}

nextBtn.addEventListener('click', () =>
{
    const checked =
    slides[current].querySelector(
        'input[type="radio"]:checked'
    );

    if(!checked)
    {
        alert('Please select an answer first.');
        return;
    }

    if(current < slides.length - 1)
    {
        current++;
        showSlide(current);
    }
});

prevBtn.addEventListener('click', () =>
{
    if(current > 0)
    {
        current--;
        showSlide(current);
    }
});

submitBtn.addEventListener('click', (e) =>
{
    const checked =
    slides[current].querySelector(
        'input[type="radio"]:checked'
    );

    if(!checked)
    {
        e.preventDefault();

        alert(
            'Please select an answer before submitting.'
        );
    }
});

if(slides.length > 0)
{
    showSlide(current);
}

</script>