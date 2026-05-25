@extends('layouts.admin')

@section('content')

<div>

    <div class="mb-8">

        <h1 class="text-3xl lg:text-4xl font-black">
            Pretest Management
        </h1>

        <p class="mt-2 text-slate-500 dark:text-slate-400">
            Create and manage pretest questions.
        </p>

    </div>

    <div
        class="rounded-[32px]
        bg-white dark:bg-white/[0.03]
        border border-slate-200 dark:border-white/10
        shadow-sm
        p-5 lg:p-8">

        <form
            action="{{ route('admin.vocabulary-pretests.store') }}"
            method="POST">

            @csrf

            <div class="grid md:grid-cols-2 gap-6">

                <!-- CATEGORY -->
                <div>

                    <label
                        class="block mb-3
                        text-sm font-bold
                        text-slate-700 dark:text-slate-300">
                        Category
                    </label>

                    <select
                        name="category"
                        class="w-full
                        px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none
                        focus:ring-2 focus:ring-cyan-500
                        transition-all duration-200">

                        <option value="vocabulary">
                            Vocabulary
                        </option>

                        <option value="reading">
                            Reading
                        </option>

                        <option value="speaking">
                            Speaking
                        </option>

                    </select>

                </div>

                <!-- ANSWER -->
                <div>

                    <label
                        class="block mb-3
                        text-sm font-bold
                        text-slate-700 dark:text-slate-300">
                        Correct Answer
                    </label>

                    <select
                        name="correct_answer"
                        class="w-full
                        px-5 py-4 rounded-2xl
                        bg-slate-50 dark:bg-white/[0.03]
                        border border-slate-200 dark:border-white/10
                        focus:outline-none
                        focus:ring-2 focus:ring-cyan-500
                        transition-all duration-200">

                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>

                    </select>

                </div>

            </div>

            <!-- QUESTION -->
            <div class="mt-6">

                <label 
                    class="block mb-3
                    text-sm font-bold
                    text-slate-700 dark:text-slate-300">

                    Question
                    
                </label>

                <textarea
                    name="question"
                    rows="5"
                    placeholder="Enter question..."
                    class="w-full
                    px-5 py-4 rounded-2xl
                    bg-slate-50 dark:bg-white/[0.03]
                    border border-slate-200 dark:border-white/10
                    focus:outline-none
                    focus:ring-2 focus:ring-cyan-500
                    transition-all duration-200"
                    required></textarea>

            </div>

            <!-- OPTIONS -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">

                <input
                    type="text"
                    name="option_a"
                    placeholder="Option A"
                    class="w-full
                    px-5 py-4 rounded-2xl
                    bg-slate-50 dark:bg-white/[0.03]
                    border border-slate-200 dark:border-white/10
                    focus:outline-none
                    focus:ring-2 focus:ring-cyan-500
                    transition-all duration-200">

                <input
                    type="text"
                    name="option_b"
                    placeholder="Option B"
                    class="w-full
                    px-5 py-4 rounded-2xl
                    bg-slate-50 dark:bg-white/[0.03]
                    border border-slate-200 dark:border-white/10
                    focus:outline-none
                    focus:ring-2 focus:ring-cyan-500
                    transition-all duration-200">

                <input
                    type="text"
                    name="option_c"
                    placeholder="Option C"
                    class="w-full
                    px-5 py-4 rounded-2xl
                    bg-slate-50 dark:bg-white/[0.03]
                    border border-slate-200 dark:border-white/10
                    focus:outline-none
                    focus:ring-2 focus:ring-cyan-500
                    transition-all duration-200">

                <input
                    type="text"
                    name="option_d"
                    placeholder="Option D"
                    class="w-full
                    px-5 py-4 rounded-2xl
                    bg-slate-50 dark:bg-white/[0.03]
                    border border-slate-200 dark:border-white/10
                    focus:outline-none
                    focus:ring-2 focus:ring-cyan-500
                    transition-all duration-200">

            </div>

            <div class="mt-6">

                <input
                    type="text"
                    name="option_e"
                    placeholder="Option E"
                    class="w-full
                    px-5 py-4 rounded-2xl
                    bg-slate-50 dark:bg-white/[0.03]
                    border border-slate-200 dark:border-white/10
                    focus:outline-none
                    focus:ring-2 focus:ring-cyan-500
                    transition-all duration-200">

            </div>

            <div class="mt-8">

                <button
                    type="submit"
                    class="w-full sm:w-auto
                    px-8 py-4 rounded-2xl
                    bg-gradient-to-r from-cyan-500 to-blue-600
                    text-white font-bold
                    shadow-lg shadow-cyan-500/20
                    hover:scale-[1.02]
                    transition-all duration-200">

                    Save Question

                </button>

            </div>

        </form>

    </div>

</div>

@endsection