<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SpeakVerse</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-[Outfit] antialiased bg-slate-950 text-white">

    <div class="min-h-screen flex flex-col lg:flex-row">

        <!-- LEFT SIDE -->
        <div
            class="hidden lg:flex lg:w-1/2 relative overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-cyan-950">

            <!-- Glow -->
            <div class="absolute top-[-120px] left-[-120px] w-[350px] h-[350px] bg-cyan-500/20 rounded-full blur-3xl">
            </div>

            <div
                class="absolute bottom-[-120px] right-[-120px] w-[350px] h-[350px] bg-purple-500/20 rounded-full blur-3xl">
            </div>

            <!-- Grid -->
            <div class="absolute inset-0 opacity-[0.06]"
                style="background-image: linear-gradient(to right, white 1px, transparent 1px),
                       linear-gradient(to bottom, white 1px, transparent 1px);
                       background-size: 60px 60px;">
            </div>

            <!-- Content -->
            <div class="relative z-10 flex flex-col justify-center px-20 w-full">

                <div
                    class="w-20 h-20 rounded-3xl bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center text-4xl font-bold shadow-2xl shadow-cyan-500/20 mb-10">
                    S
                </div>

                <h1 class="text-6xl font-black leading-tight mb-8">
                    Learn English <br>
                    Smarter with <br>
                    <span class="text-cyan-400">SpeakVerse</span>
                </h1>

                <p class="text-slate-300 text-xl leading-relaxed max-w-xl">
                    Interactive English learning platform with speaking practice,
                    progress tracking, and adaptive learning experiences designed
                    for modern students.
                </p>

                <!-- Feature Pills -->
                <div class="flex flex-wrap gap-4 mt-10">

                    <div class="px-5 py-3 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-xl">
                        Speaking Practice
                    </div>

                    <div class="px-5 py-3 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-xl">
                        Progress Tracking
                    </div>

                    <div class="px-5 py-3 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-xl">
                        AI Feedback
                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div
            class="flex-1 flex items-center justify-center px-6 py-10 bg-slate-50 dark:bg-slate-950 relative overflow-hidden">

            <!-- Mobile Glow -->
            <div
                class="absolute top-[-100px] right-[-100px] w-[250px] h-[250px] bg-cyan-400/10 rounded-full blur-3xl lg:hidden">
            </div>

            <!-- Auth Card -->
            <div
                class="w-full max-w-md relative z-10 backdrop-blur-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 shadow-2xl rounded-[32px] p-8 md:p-10">

                <!-- Mobile Logo -->
                <div class="flex lg:hidden justify-center mb-8">

                    <div
                        class="w-16 h-16 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center text-3xl font-bold shadow-lg shadow-cyan-500/20">
                        S
                    </div>

                </div>

                <!-- Title -->
                <div class="mb-8 text-center lg:text-left">

                    <h2 class="text-4xl font-bold text-slate-900 dark:text-white mb-3">
                        Welcome Back
                    </h2>

                    <p class="text-slate-500 dark:text-slate-400">
                        Continue your English learning journey with SpeakVerse.
                    </p>

                </div>

                <!-- Slot -->
                {{ $slot }}

            </div>

        </div>

    </div>

</body>

</html>
