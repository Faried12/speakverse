@php
$question = $material->questions->first();
@endphp

<x-app-layout>

<div class="space-y-8">

<!-- HEADER -->
<section
    class="rounded-[32px]
    border border-slate-200 dark:border-white/10
    bg-white/70 dark:bg-white/5
    backdrop-blur-xl
    p-8">

    <h1 class="text-4xl font-black">
        ✍️ Writing Quiz
    </h1>

    <p class="text-slate-500 mt-3">
        Read the passage carefully and write your answer.
    </p>

</section>

<!-- QUESTION -->
<section
    class="rounded-[32px]
    border border-slate-200 dark:border-white/10
    bg-white/70 dark:bg-white/5
    backdrop-blur-xl
    p-8">

    <div class="text-center mb-6">

        <h2 class="text-2xl font-bold mb-4">
            Writing Question
        </h2>

        <p
            class="text-lg md:text-xl
            font-medium
            text-slate-700 dark:text-slate-200
            leading-relaxed">

            {{ $question->question }}

        </p>

    </div>

    @if($question->image)

        <div class="flex justify-center">

            <img
                src="{{ asset('storage/'.$question->image) }}"
                class="w-full max-w-xl rounded-3xl shadow-lg">

        </div>

    @endif

</section>

<!-- ANSWER -->
<section
    class="rounded-[32px]
    border border-slate-200 dark:border-white/10
    bg-white/70 dark:bg-white/5
    backdrop-blur-xl
    p-8">

    <h2 class="text-2xl font-bold mb-6">
        Your Writing
    </h2>

    <form
        id="writingForm"
        action="{{ route('student.writing.submit', $question->id) }}"
        method="POST"
        class="space-y-6">

        @csrf

        <textarea
            name="answer"
            rows="12"
            required
            placeholder="Write your narrative text here..."
            class="w-full rounded-3xl
            border border-slate-300 dark:border-slate-700
            bg-white dark:bg-slate-900
            p-5
            text-slate-800 dark:text-white"></textarea>

        <button
            type="submit"
            class="w-full py-4 rounded-2xl
            bg-gradient-to-r
            from-green-500
            to-emerald-600
            text-white font-bold">

            Submit Writing

        </button>

    </form>

</section>


</div>
<!-- LOADING -->

<div
    id="loadingModal"
    class="hidden fixed inset-0 z-50
    bg-black/50
    flex items-center justify-center">


<div
    class="bg-white rounded-3xl p-8 text-center">

    <div class="text-5xl mb-4">
        🤖
    </div>

    <h2 class="text-2xl font-bold">
        AI is evaluating...
    </h2>

    <p class="text-slate-500 mt-2">
        Please wait...
    </p>

</div>


</div>

<!-- RESULT -->

<section
    id="resultSection"
    class="hidden">

<div
    class="rounded-[32px]
    border border-slate-200 dark:border-white/10
    bg-white/70 dark:bg-white/5
    backdrop-blur-xl
    p-10">

    <div class="text-center mb-8">

        <div class="text-6xl mb-4">
            🎉
        </div>

        <h2 class="text-4xl font-black">
            Writing Assessment
        </h2>

    </div>

    <div class="grid md:grid-cols-2 gap-4">

        <div class="p-4 rounded-2xl border">
            Orientation:
            <span id="orientationScore">0</span>/4
        </div>

        <div class="p-4 rounded-2xl border">
            Complication:
            <span id="complicationScore">0</span>/4
        </div>

        <div class="p-4 rounded-2xl border">
            Resolution:
            <span id="resolutionScore">0</span>/4
        </div>

        <div class="p-4 rounded-2xl border">
            Organization:
            <span id="organizationScore">0</span>/4
        </div>

        <div class="p-4 rounded-2xl border">
            Mechanics:
            <span id="mechanicsScore">0</span>/4
        </div>

    </div>

    <div class="text-center mt-10">

        <p class="text-slate-500">
            Final Score
        </p>

        <h2
            id="totalScore"
            class="text-7xl font-black text-green-500">

            0

        </h2>

    </div>

    <div class="mt-10">

        <h3 class="text-xl font-bold mb-3">
            AI Feedback
        </h3>

        <p id="feedbackText">
            -
        </p>

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

<script>

document.addEventListener(
    'DOMContentLoaded',
    () => {

        const writingForm =
            document.getElementById(
                'writingForm'
            );

        const loadingModal =
            document.getElementById(
                'loadingModal'
            );

        writingForm.addEventListener(
            'submit',
            async (e) => {

                e.preventDefault();

                loadingModal
                    .classList
                    .remove('hidden');

                const formData =
                    new FormData(
                        writingForm
                    );

                try {

                    const response =
                        await fetch(
                            writingForm.action,
                            {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'X-CSRF-TOKEN':
                                        document
                                        .querySelector(
                                            'input[name="_token"]'
                                        )
                                        .value,
                                    'Accept':
                                        'application/json'
                                }
                            }
                        );

                    const result =
                        await response.json();

                    loadingModal
                        .classList
                        .add('hidden');

                    showResult(result);

                }
                catch(error)
                {
                    loadingModal
                        .classList
                        .add('hidden');

                    console.error(error);
                }
            }
        );
    }
);

</script>
<script>

function showResult(result)
{
    document
        .querySelector('.space-y-8')
        .style.display = 'none';

    document
        .getElementById('resultSection')
        .classList.remove('hidden');

    document
        .getElementById('orientationScore')
        .innerText =
        result.orientation_score;

    document
        .getElementById('complicationScore')
        .innerText =
        result.complication_score;

    document
        .getElementById('resolutionScore')
        .innerText =
        result.resolution_score;

    document
        .getElementById('organizationScore')
        .innerText =
        result.organization_score;

    document
        .getElementById('mechanicsScore')
        .innerText =
        result.mechanics_score;

    document
        .getElementById('totalScore')
        .innerText =
        result.total_score;

    document
        .getElementById('feedbackText')
        .innerText =
        result.feedback;
}

</script>

</x-app-layout>
