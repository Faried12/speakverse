<x-app-layout>

    <div class="max-w-5xl mx-auto space-y-8">

        <div>
            <h1 class="text-3xl md:text-4xl font-black">
                {{ strtoupper($type) }} - {{ ucfirst($skill) }}
            </h1>

            <p class="mt-2 text-slate-500">
                {{ $lesson->title }} Assessment
            </p>
        </div>

        @if (session('success'))
            <div class="p-4 rounded-2xl bg-green-100 text-green-700 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <div
            class="rounded-[28px]
        border border-slate-200 dark:border-white/10
        bg-white/70 dark:bg-white/5
        backdrop-blur-xl
        p-6">

            <h2 class="text-xl font-bold">
                Total Questions: {{ $questions->count() }}
            </h2>

            <p class="mt-2 text-slate-500">
                Answer all questions below.
            </p>

        </div>

        @if ($questions->count())

            <form action="{{ route('student.assessment.submit', ['type' => $type, 'skill' => $skill]) }}" method="POST"
                class="space-y-6">

                @csrf

                @foreach ($questions as $index => $question)
                    <div
                        class="rounded-[28px]
                    border border-slate-200 dark:border-white/10
                    bg-white/70 dark:bg-white/5
                    backdrop-blur-xl
                    p-6 space-y-5">

                        <div>
                            <p class="font-bold text-lg">
                                {{ $index + 1 }}. {{ $question->question }}
                            </p>
                        </div>

                        @if (!empty($question->image))
                            <img src="{{ asset('storage/' . $question->image) }}"
                                class="w-full max-w-md rounded-2xl border border-slate-200 dark:border-white/10">
                        @endif

                        @if ($skill === 'reading' || $skill === 'listening')
                            <div class="space-y-3">

                                @foreach (['A', 'B', 'C', 'D', 'E'] as $option)
                                    @php
                                        $field = 'option_' . strtolower($option);
                                    @endphp

                                    @if (!empty($question->$field))
                                        <label
                                            class="flex items-start gap-3
                                        p-4 rounded-2xl
                                        border border-slate-200 dark:border-white/10
                                        bg-slate-50 dark:bg-white/5
                                        cursor-pointer">

                                            <input type="radio" name="answers[{{ $question->id }}]"
                                                value="{{ $option }}" required class="mt-1">

                                            <span>
                                                <strong>{{ $option }}.</strong>
                                                {{ $question->$field }}
                                            </span>

                                        </label>
                                    @endif
                                @endforeach

                            </div>
                        @elseif ($skill === 'writing')
                            <textarea name="answers[{{ $question->id }}]" rows="8" required placeholder="Write your answer here..."
                                class="w-full rounded-2xl border-slate-300 dark:border-white/10 dark:bg-white/5 dark:text-white"></textarea>
                        @elseif ($skill === 'speaking')
                            <div
                                class="p-4 rounded-2xl
                            bg-yellow-100 text-yellow-800
                            dark:bg-yellow-500/10 dark:text-yellow-300">

                                Speaking recorder belum dibuat pada tahap ini. Untuk sementara soal sudah berhasil
                                tampil dari database.

                            </div>
                        @endif

                    </div>
                @endforeach

                <div class="flex gap-3">

                    <button type="submit"
                        class="px-6 py-3 rounded-2xl
                    bg-gradient-to-r from-cyan-500 to-blue-600
                    text-white font-bold">

                        Submit Assessment

                    </button>

                    <a href="{{ route('missions.pretest') }}"
                        class="px-6 py-3 rounded-2xl
                    bg-slate-200 dark:bg-white/10
                    text-slate-900 dark:text-white font-bold">

                        Back

                    </a>

                </div>

            </form>
        @else
            <div
                class="p-12 text-center rounded-[28px]
            border border-slate-200 dark:border-white/10
            bg-white/70 dark:bg-white/5">

                <div class="text-6xl mb-4">
                    ❓
                </div>

                <h3 class="text-xl font-black">
                    No Questions Yet
                </h3>

                <p class="mt-2 text-slate-500">
                    Admin belum menambahkan soal untuk bagian ini.
                </p>

            </div>

        @endif

    </div>

</x-app-layout>
