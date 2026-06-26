@extends('layouts.admin')

@section('content')
    <div class="space-y-8">

        <!-- Header -->
        <div>
            <h1 class="text-3xl font-black text-slate-900 dark:text-white">
                Learning Content Management
            </h1>

            <p class="mt-2 text-slate-500 dark:text-slate-400">
                Manage Units, Lessons, Learning Materials, and Test Questions
            </p>
        </div>

        @foreach ($units as $unit)
            <div
                class="bg-white dark:bg-slate-800
                   rounded-3xl shadow-sm
                   border border-slate-200 dark:border-slate-700
                   p-6">

                <!-- Unit Header -->
                <div class="mb-6">

                    <h2 class="text-2xl font-black text-slate-900 dark:text-white">
                        {{ $unit->title }}
                    </h2>

                    <p class="mt-1 text-slate-500 dark:text-slate-400">
                        {{ $unit->subtitle }}
                    </p>

                </div>

                <!-- Lessons -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">

                    @foreach ($unit->lessons as $lesson)
                        @php
                            $isTest = in_array($unit->type, ['pretest', 'posttest']);

                            $route = '#';
                            $label = 'Materials';
                            $count = 0;
                            $colorClass = 'text-blue-600 dark:text-blue-400';

                            if ($lesson->skill_type === 'reading') {
                                if ($isTest) {
                                    $route = route('admin.reading-lesson-questions.index', $lesson->id);
                                    $label = 'Reading Questions';
                                    $count = $lesson->readingQuestions->count();
                                } else {
                                    $route = route('admin.reading-materials.index', $lesson->id);
                                    $label = 'Reading Materials';
                                    $count = $lesson->readingMaterial->count();
                                }

                                $colorClass = 'text-blue-600 dark:text-blue-400';
                            } elseif ($lesson->skill_type === 'listening') {
                                if ($isTest) {
                                    $route = route('admin.listening-lesson-questions.index', $lesson->id);
                                    $label = 'Listening Questions';
                                    $count = $lesson->listeningQuestions->count();
                                } else {
                                    $route = route('admin.listening-materials.index', $lesson->id);
                                    $label = 'Listening Materials';
                                    $count = $lesson->listeningMaterials->count();
                                }

                                $colorClass = 'text-orange-600 dark:text-orange-400';
                            } elseif ($lesson->skill_type === 'writing') {
                                if ($isTest) {
                                    $route = '#';
                                    $label = 'Writing Questions';
                                    $count = $lesson->writingQuestions->count();
                                } else {
                                    $route = route('admin.writing-materials.index', $lesson->id);
                                    $label = 'Writing Materials';
                                    $count = $lesson->writingMaterials->count();
                                }

                                $colorClass = 'text-green-600 dark:text-green-400';
                            } elseif ($lesson->skill_type === 'speaking') {
                                if ($isTest) {
                                    $route = '#';
                                    $label = 'Speaking Questions';
                                    $count = $lesson->speakingQuestions->count();
                                } else {
                                    $route = route('admin.speaking-materials.index', $lesson->id);
                                    $label = 'Speaking Materials';
                                    $count = $lesson->speakingMaterials->count();
                                }

                                $colorClass = 'text-purple-600 dark:text-purple-400';
                            }

                            $itemText = $isTest ? 'Question' : 'Material';
                        @endphp

                        <a href="{{ $route }}"
                            class="group
                                p-5
                                rounded-2xl
                                border border-slate-200 dark:border-slate-700
                                bg-slate-50 dark:bg-slate-900
                                hover:border-blue-500
                                hover:shadow-lg
                                transition-all duration-300">

                            <div class="flex items-center justify-between">

                                <h3 class="font-bold text-lg text-slate-900 dark:text-white">
                                    {{ ucfirst($lesson->skill_type) }}
                                </h3>

                                <span
                                    class="px-2 py-1 text-xs font-semibold rounded-full
                                    bg-blue-100 text-blue-700
                                    dark:bg-blue-900/40 dark:text-blue-300">

                                    {{ strtoupper(substr($lesson->skill_type, 0, 1)) }}

                                </span>

                            </div>

                            <div class="mt-3">

                                <span class="text-sm text-slate-500 dark:text-slate-400">
                                    {{ $label }}
                                </span>

                                <div class="mt-1 text-xl font-bold {{ $colorClass }}">
                                    {{ $count }}
                                    {{ $itemText }}
                                </div>

                            </div>

                        </a>
                    @endforeach

                </div>

            </div>
        @endforeach

    </div>
@endsection
