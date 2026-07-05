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
            bg-purple-400/10 rounded-full blur-3xl">
            </div>

            <div class="relative z-10">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                    <div class="flex-1">
                        <div
                            class="inline-flex items-center gap-2
                        px-4 py-2 rounded-full
                        bg-purple-500/10 border border-purple-400/20
                        text-purple-400 text-sm font-medium mb-5">
                            🎙️ Speaking Quiz
                        </div>

                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-black leading-tight">
                            {{ $lesson->title }}
                        </h1>

                        <p
                            class="mt-5 text-slate-600 dark:text-slate-400 text-base md:text-lg max-w-2xl leading-relaxed">
                            Listen to the question, record your answer, then submit it for assessment.
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
                    bg-purple-500/10
                    flex items-center justify-center text-3xl">
                        ❓
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold">
                            Speaking Question
                        </h2>

                        <p class="text-slate-500">
                            Listen carefully and answer clearly.
                        </p>
                    </div>

                </div>

                <div
                    class="rounded-3xl
                border border-purple-200 dark:border-purple-500/20
                bg-purple-50 dark:bg-purple-500/10
                p-6">

                    <p id="questionText"
                        class="text-lg md:text-xl font-bold leading-relaxed text-slate-800 dark:text-slate-100">
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

            <!-- ANSWER -->
            <section id="speakingSection"
                class="rounded-[32px]
            border border-slate-200 dark:border-white/10
            bg-white/70 dark:bg-white/5
            backdrop-blur-xl
            p-8">

                <h2 class="text-2xl font-bold mb-2">
                    Your Speaking Answer
                </h2>

                <p class="text-slate-500 mb-6">
                    Replay the question, record your answer, then submit it.
                </p>

                <div class="flex flex-col sm:flex-row gap-3 mb-6">

                    <button id="playQuestion" type="button"
                        class="px-6 py-4 rounded-2xl
                    bg-blue-500 text-white font-bold
                    hover:scale-[1.02]
                    transition-all">
                        🔊 Replay Question
                    </button>

                    <button id="startBtn" type="button"
                        class="px-6 py-4 rounded-2xl
                    bg-green-500 text-white font-bold
                    hover:scale-[1.02]
                    transition-all">
                        🎙 Start Recording
                    </button>

                    <button id="stopBtn" type="button" disabled
                        class="px-6 py-4 rounded-2xl
                    bg-red-500 text-white font-bold
                    disabled:opacity-50">
                        ⏹ Stop Recording
                    </button>

                </div>

                <p id="recordStatus" class="mb-6 text-sm font-bold text-slate-500">
                    Ready to record.
                </p>

                <form id="speakingForm"
                    action="{{ route('student.speaking.submit', [
                        'lesson' => $lesson,
                        'material' => $material,
                    ]) }}"
                    method="POST" enctype="multipart/form-data" class="space-y-6">

                    @csrf

                    <input type="file" id="audioInput" name="audio_file" hidden>

                    <audio id="audioPreview" controls class="hidden w-full rounded-2xl">
                    </audio>

                    <div class="flex flex-col sm:flex-row gap-3">

                        <button type="submit" id="submitBtn"
                            class="flex-1 py-4 rounded-2xl
                        bg-gradient-to-r from-purple-500 to-indigo-600
                        text-white font-bold
                        hover:scale-[1.02]
                        transition-all duration-300
                        shadow-lg shadow-purple-500/20">
                            Submit Speaking
                        </button>

                        <a href="{{ route('student.speaking', $lesson) }}"
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
            bg-black/60 backdrop-blur-sm
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
                        Please wait while your speaking answer is being assessed.
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
                            Speaking Assessment
                        </h2>

                        <p class="mt-3 text-slate-500">
                            Here is your speaking evaluation result.
                        </p>

                    </div>

                    <div class="grid md:grid-cols-2 gap-4">

                        <div class="p-4 rounded-2xl border border-slate-200 dark:border-white/10">
                            Details:
                            <span class="font-black text-purple-500" id="detailsScore">0</span>/4
                        </div>

                        <div class="p-4 rounded-2xl border border-slate-200 dark:border-white/10">
                            Fluency:
                            <span class="font-black text-purple-500" id="fluencyScore">0</span>/4
                        </div>

                        <div class="p-4 rounded-2xl border border-slate-200 dark:border-white/10">
                            Pronunciation:
                            <span class="font-black text-purple-500" id="pronunciationScore">0</span>/4
                        </div>

                        <div class="p-4 rounded-2xl border border-slate-200 dark:border-white/10">
                            Vocabulary:
                            <span class="font-black text-purple-500" id="vocabularyScore">0</span>/4
                        </div>

                        <div class="p-4 rounded-2xl border border-slate-200 dark:border-white/10 md:col-span-2">
                            Grammar:
                            <span class="font-black text-purple-500" id="grammarScore">0</span>/4
                        </div>

                    </div>

                    <div class="text-center mt-10">

                        <p class="text-slate-500">
                            Final Score
                        </p>

                        <h2 id="totalScore" class="text-7xl font-black text-purple-500">
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

                    <a href="{{ route('student.speaking', $lesson) }}"
                        class="inline-flex items-center justify-center
                    w-full py-4 rounded-2xl
                    bg-slate-200 dark:bg-white/10
                    text-slate-900 dark:text-white
                    font-semibold">
                        Back to Speaking
                    </a>

                    <a href="{{ route('missions') }}"
                        class="inline-flex items-center justify-center
                    w-full py-4 rounded-2xl
                    bg-gradient-to-r from-purple-500 to-indigo-600
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
                    No Speaking Question Yet
                </h3>

                <p class="mt-3 text-slate-500">
                    Admin belum menambahkan soal speaking untuk lesson ini.
                </p>

                <a href="{{ route('student.speaking', $lesson) }}"
                    class="inline-flex mt-6 px-6 py-3 rounded-2xl
                bg-gradient-to-r from-purple-500 to-indigo-600
                text-white font-black">
                    Back
                </a>

            </section>

        @endif

    </div>

    <script>
        let mediaRecorder;
        let audioChunks = [];

        const questionText = document.getElementById('questionText');
        const playQuestion = document.getElementById('playQuestion');
        const startBtn = document.getElementById('startBtn');
        const stopBtn = document.getElementById('stopBtn');
        const audioPreview = document.getElementById('audioPreview');
        const audioInput = document.getElementById('audioInput');
        const speakingForm = document.getElementById('speakingForm');
        const loadingModal = document.getElementById('loadingModal');
        const speakingSection = document.getElementById('speakingSection');
        const resultSection = document.getElementById('resultSection');
        const recordStatus = document.getElementById('recordStatus');

        function speakQuestion() {
            if (!questionText) {
                return;
            }

            window.speechSynthesis.cancel();

            const speech = new SpeechSynthesisUtterance(questionText.innerText);

            speech.lang = 'en-US';
            speech.rate = 0.9;
            speech.pitch = 1;

            window.speechSynthesis.speak(speech);
        }

        if (playQuestion) {
            playQuestion.addEventListener('click', speakQuestion);
        }

        document.addEventListener('DOMContentLoaded', () => {
            speakQuestion();
        });

        window.addEventListener('beforeunload', () => {
            window.speechSynthesis.cancel();
        });

        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                window.speechSynthesis.cancel();
            }
        });

        if (startBtn) {
            startBtn.addEventListener('click', async () => {
                try {
                    const stream = await navigator.mediaDevices.getUserMedia({
                        audio: true
                    });

                    mediaRecorder = new MediaRecorder(stream);
                    audioChunks = [];

                    mediaRecorder.ondataavailable = event => {
                        audioChunks.push(event.data);
                    };

                    mediaRecorder.onstop = () => {
                        const audioBlob = new Blob(audioChunks, {
                            type: 'audio/webm'
                        });

                        const file = new File([audioBlob], 'recording.webm', {
                            type: 'audio/webm'
                        });

                        const dt = new DataTransfer();
                        dt.items.add(file);
                        audioInput.files = dt.files;

                        audioPreview.src = URL.createObjectURL(audioBlob);
                        audioPreview.classList.remove('hidden');

                        recordStatus.innerText =
                            'Recording finished. You can play it back or submit your answer.';
                        recordStatus.className = 'mb-6 text-sm font-bold text-green-500';
                    };

                    window.speechSynthesis.cancel();

                    mediaRecorder.start();

                    startBtn.disabled = true;
                    stopBtn.disabled = false;

                    recordStatus.innerText = 'Recording... speak clearly into your microphone.';
                    recordStatus.className = 'mb-6 text-sm font-bold text-red-500';

                } catch (error) {
                    alert('Please allow microphone access.');
                }
            });
        }

        if (stopBtn) {
            stopBtn.addEventListener('click', () => {
                if (mediaRecorder) {
                    mediaRecorder.stop();

                    startBtn.disabled = false;
                    stopBtn.disabled = true;
                }
            });
        }

        if (speakingForm) {
            speakingForm.addEventListener('submit', async (e) => {
                e.preventDefault();

                if (audioInput.files.length === 0) {
                    alert('Please record your answer first.');
                    return;
                }

                loadingModal.classList.remove('hidden');

                const formData = new FormData(speakingForm);

                try {
                    const response = await fetch(speakingForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json'
                        }
                    });

                    const result = await response.json();

                    loadingModal.classList.add('hidden');

                    if (!response.ok) {
                        alert(result.message ?? 'Failed to submit speaking answer.');
                        return;
                    }

                    showResult(result);

                } catch (error) {
                    loadingModal.classList.add('hidden');
                    console.error(error);
                    alert('Something went wrong while submitting your speaking answer.');
                }
            });
        }

        function showResult(result) {
            speakingSection.classList.add('hidden');
            resultSection.classList.remove('hidden');

            document.getElementById('detailsScore').innerText =
                result.details_score ?? 0;

            document.getElementById('fluencyScore').innerText =
                result.fluency_score ?? 0;

            document.getElementById('pronunciationScore').innerText =
                result.pronunciation_score ?? 0;

            document.getElementById('vocabularyScore').innerText =
                result.vocabulary_score ?? 0;

            document.getElementById('grammarScore').innerText =
                result.grammar_score ?? 0;

            document.getElementById('totalScore').innerText =
                result.total_score ?? 0;

            document.getElementById('feedbackText').innerText =
                result.feedback ?? '-';

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>

</x-app-layout>
