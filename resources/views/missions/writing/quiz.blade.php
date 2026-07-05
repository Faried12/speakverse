<x-app-layout>

    @php
        $question = $material->questions->first();
    @endphp

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
            bg-green-400/10 rounded-full blur-3xl">
            </div>

            <div class="relative z-10">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                    <div class="flex-1">

                        <div
                            class="inline-flex items-center gap-2
                        px-4 py-2 rounded-full
                        bg-green-500/10 border border-green-400/20
                        text-green-400 text-sm font-medium mb-5">
                            ✍️ Writing Quiz
                        </div>

                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-black leading-tight">
                            {{ $lesson->title }}
                        </h1>

                        <p
                            class="mt-5 text-slate-600 dark:text-slate-400 text-base md:text-lg max-w-2xl leading-relaxed">
                            Write your answer carefully. Your response will be evaluated automatically.
                        </p>

                    </div>

                    <div
                        class="rounded-3xl
                    border border-slate-200 dark:border-white/10
                    bg-slate-50 dark:bg-white/5
                    p-6 w-full lg:w-64">

                        <p class="text-sm text-slate-500 mb-2">
                            Status
                        </p>

                        <h3 class="text-2xl font-black text-green-400">
                            Ready
                        </h3>

                    </div>

                </div>

            </div>

        </section>

        @if ($question)

            <!-- QUESTION -->
            <section
                class="rounded-[32px]
            border border-slate-200 dark:border-white/10
            bg-white/70 dark:bg-white/5
            backdrop-blur-xl
            p-8">

                <div class="flex items-center gap-3 mb-6">

                    <div
                        class="w-14 h-14 rounded-2xl
                    bg-green-500/10
                    flex items-center justify-center text-3xl">
                        ❓
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold">
                            Writing Question
                        </h2>

                        <p class="text-slate-500">
                            Read the question and write your best answer.
                        </p>
                    </div>

                </div>

                <div
                    class="rounded-3xl
                border border-green-200 dark:border-green-500/20
                bg-green-50 dark:bg-green-500/10
                p-6">

                    <p class="text-lg md:text-xl font-bold leading-relaxed text-slate-800 dark:text-slate-100">
                        {{ $question->question }}
                    </p>

                </div>

                @if ($question->image)
                    <div class="mt-8 flex justify-center">
                        <img src="{{ asset('storage/' . $question->image) }}"
                            class="w-full max-w-3xl rounded-3xl shadow-lg">
                    </div>
                @endif

            </section>

            <!-- ANSWER FORM -->
            <section id="writingSection"
                class="rounded-[32px]
            border border-slate-200 dark:border-white/10
            bg-white/70 dark:bg-white/5
            backdrop-blur-xl
            p-8">

                <h2 class="text-2xl font-bold mb-2">
                    Your Writing Answer
                </h2>

                <p class="text-slate-500 mb-6">
                    Minimum 20 characters. Write clearly and completely.
                </p>

                <form id="writingForm"
                    action="{{ route('student.writing.submit', [
                        'lesson' => $lesson,
                        'material' => $material,
                    ]) }}"
                    method="POST" class="space-y-6">

                    @csrf

                    <div>
                        <textarea id="answerInput" name="answer" rows="12" required minlength="20" placeholder="Write your answer here..."
                            class="w-full rounded-3xl
                        border border-slate-300 dark:border-white/10
                        bg-white dark:bg-white/5
                        text-slate-900 dark:text-white
                        p-5
                        resize-none
                        focus:ring-2
                        focus:ring-green-500
                        focus:border-green-500"></textarea>

                        <div class="mt-3 flex justify-between text-sm text-slate-500">
                            <span id="minStatus">
                                Minimum 20 characters
                            </span>

                            <span>
                                <span id="charCount">0</span> characters
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">

                        <button type="submit" id="submitBtn"
                            class="flex-1 py-4 rounded-2xl
                        bg-gradient-to-r from-green-500 to-emerald-600
                        text-white font-bold
                        hover:scale-[1.02]
                        transition-all duration-300
                        shadow-lg shadow-green-500/20">
                            Submit Writing
                        </button>

                        <a href="{{ route('student.writing', $lesson) }}"
                            class="px-6 py-4 rounded-2xl
                        bg-slate-200 dark:bg-white/10
                        text-slate-900 dark:text-white
                        font-bold text-center">
                            Back
                        </a>

                    </div>

                </form>

            </section>

            <!-- LOADING -->
            <div id="loadingModal"
                class="hidden fixed inset-0 z-50
            bg-black/60
            backdrop-blur-sm
            flex items-center justify-center p-6">

                <div
                    class="bg-white dark:bg-slate-900
                border border-slate-200 dark:border-white/10
                rounded-3xl p-8 text-center max-w-sm w-full">

                    <div class="text-5xl mb-4">
                        🤖
                    </div>

                    <h2 class="text-2xl font-bold">
                        AI is evaluating...
                    </h2>

                    <p class="text-slate-500 mt-2">
                        Please wait while your writing is being assessed.
                    </p>

                </div>

            </div>

            <!-- RESULT -->
            <section id="resultSection" class="hidden space-y-6">

                <div
                    class="rounded-[32px]
                border border-slate-200 dark:border-white/10
                bg-white/70 dark:bg-white/5
                backdrop-blur-xl
                p-8 lg:p-10">

                    <div class="text-center mb-8">

                        <div class="text-6xl mb-4">
                            🎉
                        </div>

                        <h2 class="text-4xl font-black">
                            Writing Assessment
                        </h2>

                        <p class="mt-3 text-slate-500">
                            Here is your writing evaluation result.
                        </p>

                    </div>

                    <div class="grid md:grid-cols-2 gap-4">

                        <div class="p-4 rounded-2xl border border-slate-200 dark:border-white/10">
                            Orientation:
                            <span class="font-black text-green-500" id="orientationScore">0</span>/4
                        </div>

                        <div class="p-4 rounded-2xl border border-slate-200 dark:border-white/10">
                            Complication:
                            <span class="font-black text-green-500" id="complicationScore">0</span>/4
                        </div>

                        <div class="p-4 rounded-2xl border border-slate-200 dark:border-white/10">
                            Resolution:
                            <span class="font-black text-green-500" id="resolutionScore">0</span>/4
                        </div>

                        <div class="p-4 rounded-2xl border border-slate-200 dark:border-white/10">
                            Organization:
                            <span class="font-black text-green-500" id="organizationScore">0</span>/4
                        </div>

                        <div class="p-4 rounded-2xl border border-slate-200 dark:border-white/10 md:col-span-2">
                            Mechanics:
                            <span class="font-black text-green-500" id="mechanicsScore">0</span>/4
                        </div>

                    </div>

                    <div class="text-center mt-10">

                        <p class="text-slate-500">
                            Final Score
                        </p>

                        <h2 id="totalScore" class="text-7xl font-black text-green-500">
                            0
                        </h2>

                    </div>

                    <div class="mt-10">

                        <h3 class="text-xl font-bold mb-3">
                            Feedback
                        </h3>

                        <div
                            class="rounded-3xl
                        bg-slate-100 dark:bg-white/5
                        border border-slate-200 dark:border-white/10
                        p-5">

                            <p id="feedbackText" class="text-slate-700 dark:text-slate-300 leading-relaxed">
                                -
                            </p>

                        </div>

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <a href="{{ route('student.writing', $lesson) }}"
                        class="inline-flex items-center justify-center
                    w-full py-4 rounded-2xl
                    bg-slate-200 dark:bg-white/10
                    text-slate-900 dark:text-white
                    font-semibold">
                        Back to Writing
                    </a>

                    <a href="{{ route('missions') }}"
                        class="inline-flex items-center justify-center
                    w-full py-4 rounded-2xl
                    bg-gradient-to-r from-green-500 to-emerald-600
                    text-white font-semibold">
                        Back to Missions
                    </a>

                </div>

            </section>
        @else
            <section
                class="p-14 text-center rounded-[32px]
            border border-slate-200 dark:border-white/10
            bg-white/80 dark:bg-white/5">

                <div class="text-7xl mb-5">
                    ❓
                </div>

                <h3 class="text-2xl font-black">
                    No Writing Question Yet
                </h3>

                <p class="mt-3 text-slate-500">
                    Admin belum menambahkan soal writing untuk lesson ini.
                </p>

                <a href="{{ route('student.writing', $lesson) }}"
                    class="inline-flex mt-6 px-6 py-3 rounded-2xl
                bg-gradient-to-r from-green-500 to-emerald-600
                text-white font-black">
                    Back
                </a>

            </section>

        @endif

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const writingForm = document.getElementById('writingForm');
            const loadingModal = document.getElementById('loadingModal');
            const writingSection = document.getElementById('writingSection');
            const resultSection = document.getElementById('resultSection');
            const answerInput = document.getElementById('answerInput');
            const charCount = document.getElementById('charCount');
            const minStatus = document.getElementById('minStatus');

            if (answerInput) {
                answerInput.addEventListener('input', () => {
                    const length = answerInput.value.length;
                    charCount.innerText = length;

                    if (length >= 20) {
                        minStatus.innerText = 'Ready to submit';
                        minStatus.classList.remove('text-slate-500');
                        minStatus.classList.add('text-green-500', 'font-bold');
                    } else {
                        minStatus.innerText = 'Minimum 20 characters';
                        minStatus.classList.remove('text-green-500', 'font-bold');
                        minStatus.classList.add('text-slate-500');
                    }
                });
            }

            if (!writingForm) {
                return;
            }

            writingForm.addEventListener('submit', async (e) => {
                e.preventDefault();

                loadingModal.classList.remove('hidden');

                const formData = new FormData(writingForm);

                try {
                    const response = await fetch(writingForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]')
                                .value,
                            'Accept': 'application/json'
                        }
                    });

                    const result = await response.json();

                    loadingModal.classList.add('hidden');

                    if (!response.ok) {
                        alert(result.message ?? 'Failed to submit writing.');
                        return;
                    }

                    showResult(result);

                } catch (error) {
                    loadingModal.classList.add('hidden');
                    console.error(error);
                    alert('Something went wrong while submitting your writing.');
                }
            });

            function showResult(result) {
                writingSection.classList.add('hidden');
                resultSection.classList.remove('hidden');

                document.getElementById('orientationScore').innerText =
                    result.orientation_score ?? 0;

                document.getElementById('complicationScore').innerText =
                    result.complication_score ?? 0;

                document.getElementById('resolutionScore').innerText =
                    result.resolution_score ?? 0;

                document.getElementById('organizationScore').innerText =
                    result.organization_score ?? 0;

                document.getElementById('mechanicsScore').innerText =
                    result.mechanics_score ?? 0;

                document.getElementById('totalScore').innerText =
                    result.total_score ?? 0;

                document.getElementById('feedbackText').innerText =
                    result.feedback ?? '-';

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        });
    </script>

</x-app-layout>
