@extends('layouts.admin')

@section('content')
    <div class="space-y-8">

        <!-- Header -->
        <div>
            <h1 class="text-3xl font-black text-slate-900 dark:text-white">
                Learning Content Management
            </h1>

            <p class="mt-2 text-slate-500 dark:text-slate-400">
                Manage Units, Lessons, and Learning Materials
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

            $route = '#';

            if ($lesson->skill_type === 'reading') {

                $route = route(
                    'admin.reading-materials.index',
                    $lesson->id
                );

            } elseif ($lesson->skill_type === 'speaking') {

                $route = route(
                    'admin.speaking-materials.index',
                    $lesson->id
                );

            }

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

            {{-- READING --}}
            @if ($lesson->skill_type === 'reading')

                <div class="mt-3">

                    <span class="text-sm text-slate-500 dark:text-slate-400">
                        Reading Materials
                    </span>

                    <div class="mt-1 text-xl font-bold text-blue-600 dark:text-blue-400">

                        {{ $lesson->readingMaterial->count() }}
                        Material

                    </div>

                </div>

            {{-- SPEAKING --}}
            @elseif ($lesson->skill_type === 'speaking')

                <div class="mt-3">

                    <span class="text-sm text-slate-500 dark:text-slate-400">
                        Speaking Materials
                    </span>

                    <div class="mt-1 text-xl font-bold text-purple-600 dark:text-purple-400">

                        {{ $lesson->speakingMaterials->count() }}
                        Material

                    </div>

                </div>

            {{-- OTHER --}}
            @else

                <div class="mt-3 text-sm text-slate-400">

                    Coming Soon

                </div>

            @endif

        </a>

    @endforeach

</div>

            </div>
        @endforeach

    </div>
@endsection
