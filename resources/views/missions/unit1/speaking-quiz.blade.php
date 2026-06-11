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
            🎤 Speaking Quiz
        </h1>

        <p class="text-slate-500 mt-3">
            Listen to the question and answer by speaking.
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

            <h6
                id="questionText"
                class="text-lg md:text-xl
                font-medium
                text-slate-700 dark:text-slate-200
                leading-relaxed">

                {{ $question->question }}

            </h6>

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
            Your Answer
        </h2>

        <div class="flex flex-wrap gap-4">

            <button
                id="playQuestion"
                type="button"
                class="px-6 py-3 rounded-2xl bg-blue-500 text-white">

                🔊 Replay Question

            </button>

            <button
                id="startBtn"
                type="button"
                class="px-6 py-3 rounded-2xl bg-green-500 text-white">

                🎙 Start Recording

            </button>

            <button
                id="stopBtn"
                type="button"
                disabled
                class="px-6 py-3 rounded-2xl bg-red-500 text-white">

                ⏹ Stop Recording

            </button>

        </div>

        <form
            id="speakingForm"
            action="{{ route('student.speaking.submit', $material->id) }}"
            method="POST"
            enctype="multipart/form-data"
            class="mt-8">

            @csrf

            <input
              type="file"
              id="audioInput"
              name="audio_file"
              hidden>

            <audio
                id="audioPreview"
                controls
                class="hidden w-full mt-6">
            </audio>

            <button
                type="submit"
                id="submitBtn"
                class="mt-6 w-full py-4 rounded-2xl
                bg-gradient-to-r
                from-purple-500
                to-indigo-600
                text-white font-bold">

                Submit Answer

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
                Speaking Assessment
            </h2>

        </div>

        <div class="grid md:grid-cols-2 gap-4">

            <div class="p-4 rounded-2xl border">
                Details:
                <span id="detailsScore">0</span>/4
            </div>

            <div class="p-4 rounded-2xl border">
                Fluency:
                <span id="fluencyScore">0</span>/4
            </div>

            <div class="p-4 rounded-2xl border">
                Pronunciation:
                <span id="pronunciationScore">0</span>/4
            </div>

            <div class="p-4 rounded-2xl border">
                Vocabulary:
                <span id="vocabularyScore">0</span>/4
            </div>

            <div class="p-4 rounded-2xl border">
                Grammar:
                <span id="grammarScore">0</span>/4
            </div>

        </div>

        <div class="text-center mt-10">

            <p class="text-slate-500">
                Final Score
            </p>

            <h2
                id="totalScore"
                class="text-7xl font-black text-cyan-500">

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

let mediaRecorder;
let audioChunks = [];

const questionText =
    document.getElementById('questionText');

const playQuestion =
    document.getElementById('playQuestion');

const startBtn =
    document.getElementById('startBtn');

const stopBtn =
    document.getElementById('stopBtn');

const audioPreview =
    document.getElementById('audioPreview');

const audioInput =
    document.getElementById('audioInput');

const speakingForm =
    document.getElementById('speakingForm');

const loadingModal =
    document.getElementById('loadingModal');

/*
|--------------------------------------------------------------------------
| AUTO PLAY QUESTION
|--------------------------------------------------------------------------
*/

function speakQuestion()
{
    window.speechSynthesis.cancel();

    const speech =
        new SpeechSynthesisUtterance(
            questionText.innerText
        );

    speech.lang = 'en-US';
    speech.rate = 0.9;
    speech.pitch = 1;

    window.speechSynthesis.speak(
        speech
    );
}

document.addEventListener(
    'DOMContentLoaded',
    speakQuestion
);

/*
|--------------------------------------------------------------------------
| REPLAY QUESTION
|--------------------------------------------------------------------------
*/

playQuestion.addEventListener(
    'click',
    speakQuestion
);

/*
|--------------------------------------------------------------------------
| STOP VOICE WHEN LEAVING PAGE
|--------------------------------------------------------------------------
*/

window.addEventListener(
    'beforeunload',
    () => {
        window.speechSynthesis.cancel();
    }
);

document.addEventListener(
    'visibilitychange',
    () => {

        if(document.hidden)
        {
            window.speechSynthesis.cancel();
        }

    }
);

/*
|--------------------------------------------------------------------------
| START RECORDING
|--------------------------------------------------------------------------
*/

startBtn.addEventListener(
    'click',
    async () => {

        try {

            const stream =
                await navigator
                .mediaDevices
                .getUserMedia({
                    audio: true
                });

            mediaRecorder =
                new MediaRecorder(
                    stream
                );

            audioChunks = [];

            mediaRecorder.ondataavailable =
                event => {

                    audioChunks.push(
                        event.data
                    );

                };

            mediaRecorder.onstop =
                () => {

                    const audioBlob =
                        new Blob(
                            audioChunks,
                            {
                                type:
                                'audio/webm'
                            }
                        );

                    const file =
                        new File(
                            [audioBlob],
                            'recording.webm',
                            {
                                type:
                                'audio/webm'
                            }
                        );

                    const dt =
                        new DataTransfer();

                    dt.items.add(file);

                    audioInput.files =
                        dt.files;

                    audioPreview.src =
                        URL.createObjectURL(
                            audioBlob
                        );

                    audioPreview
                        .classList
                        .remove('hidden');

                };

            window.speechSynthesis.cancel();

            mediaRecorder.start();

            startBtn.disabled = true;
            stopBtn.disabled = false;

        }
        catch(error)
        {
            alert(
                'Please allow microphone access.'
            );
        }

    }
);

/*
|--------------------------------------------------------------------------
| STOP RECORDING
|--------------------------------------------------------------------------
*/

stopBtn.addEventListener(
    'click',
    () => {

        if(mediaRecorder)
        {
            mediaRecorder.stop();

            startBtn.disabled = false;
            stopBtn.disabled = true;
        }

    }
);

/*
|--------------------------------------------------------------------------
| SUBMIT
|--------------------------------------------------------------------------
*/

speakingForm.addEventListener(
    'submit',
    async (e) => {

        e.preventDefault();

        if(audioInput.files.length === 0)
        {
            alert(
                'Please record your answer first.'
            );

            return;
        }

        loadingModal
            .classList
            .remove('hidden');

        const formData =
            new FormData(
                speakingForm
            );

        try {

            const response =
                await fetch(
                    speakingForm.action,
                    {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN':
                                document
                                .querySelector(
                                    'input[name="_token"]'
                                )
                                .value
                        }
                    }
                );

            
            // const result = await response.json();

            //   console.log(result);

            //   alert(result.ai_response);

            //   loadingModal.classList.add('hidden');



// showResult(result);
        const result = await response.json();

console.log(result);

loadingModal.classList.add('hidden');

showResult(result);

        }
        
        catch(error)
        {
            loadingModal
                .classList
                .add('hidden');

            console.error(error);

            alert(error);
        }

    }
);

function showResult(result)
{
    document
        .querySelector('.space-y-8')
        .style.display = 'none';

    document
        .getElementById(
            'resultSection'
        )
        .classList
        .remove('hidden');

    document
        .getElementById(
            'detailsScore'
        )
        .innerText =
        result.details_score;

    document
        .getElementById(
            'fluencyScore'
        )
        .innerText =
        result.fluency_score;

    document
        .getElementById(
            'pronunciationScore'
        )
        .innerText =
        result.pronunciation_score;

    document
        .getElementById(
            'vocabularyScore'
        )
        .innerText =
        result.vocabulary_score;

    document
        .getElementById(
            'grammarScore'
        )
        .innerText =
        result.grammar_score;

    document
        .getElementById(
            'totalScore'
        )
        .innerText =
        result.total_score;

    document
        .getElementById(
            'feedbackText'
        )
        .innerText =
        result.feedback;
}

</script>



</x-app-layout>