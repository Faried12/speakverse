<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{
    darkMode: localStorage.getItem('darkMode') === 'true',
    mobileMenu: false,
    profileMenu: false
}" x-init="$watch('darkMode', value => {
    localStorage.setItem('darkMode', value)
    document.documentElement.classList.toggle('dark', value)
});

document.documentElement.classList.toggle('dark', darkMode)"
    :class="{ 'dark': darkMode }">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SpeakVerse</title>

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- VITE -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body
    class="font-[Outfit] bg-slate-100 dark:bg-[#050816] text-slate-900 dark:text-white transition-colors duration-300 overflow-x-hidden">

    <!-- BACKGROUND -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">

        <!-- GLOW -->
        <div class="absolute top-[-200px] left-[-200px] w-[450px] h-[450px] bg-cyan-500/10 rounded-full blur-3xl">
        </div>

        <div class="absolute bottom-[-200px] right-[-200px] w-[450px] h-[450px] bg-purple-500/10 rounded-full blur-3xl">
        </div>

    </div>

    <!-- APP -->
    <div class="relative z-10 min-h-screen flex flex-col">

        <!-- NAVBAR -->
        <header
            class="sticky top-0 z-50 border-b border-slate-200 dark:border-white/10 bg-white/80 dark:bg-[#050816]/80 backdrop-blur-xl">

            <div class="max-w-7xl mx-auto px-5 lg:px-10">

                <div class="h-20 flex items-center justify-between">

                    <!-- LEFT -->
                    <div class="flex items-center gap-12">

                        <!-- LOGO -->
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-4 group">

                            <div
                                class="w-12 h-12 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-cyan-500/20 group-hover:scale-105 transition">

                                S

                            </div>

                            <div class="hidden sm:block">

                                <h1 class="text-xl font-bold tracking-wide">
                                    SpeakVerse
                                </h1>

                                <p class="text-xs text-slate-500 dark:text-slate-400">
                                    English Learning Platform
                                </p>

                            </div>

                        </a>

                        <!-- DESKTOP MENU -->
                        <nav class="hidden lg:flex items-center gap-8">

                            <a href="{{ route('dashboard') }}"
                                class="text-sm font-semibold transition
                                {{ request()->routeIs('dashboard') ? 'text-cyan-400' : 'text-slate-600 dark:text-slate-300 hover:text-cyan-400' }}">

                                Dashboard

                            </a>

                            <a href="{{ route('missions') }}"
                                class="text-sm font-semibold transition
                                {{ request()->routeIs('missions') ? 'text-cyan-400' : 'text-slate-600 dark:text-slate-300 hover:text-cyan-400' }}">

                                Missions

                            </a>

                            <a href="{{ route('progress') }}"
                                class="text-sm font-semibold transition
                                {{ request()->routeIs('progress') ? 'text-cyan-400' : 'text-slate-600 dark:text-slate-300 hover:text-cyan-400' }}">

                                Progress

                            </a>

                            @if ((Auth::user()->role ?? 'user') === 'admin')
                                <a href="#"
                                    class="text-sm font-semibold text-red-400 hover:text-red-300 transition">

                                    Admin Panel

                                </a>
                            @endif

                        </nav>

                    </div>

                    <!-- RIGHT -->
                    <div class="flex items-center gap-3">

                        <!-- DARK MODE -->
                        <button @click="darkMode = !darkMode"
                            class="w-12 h-12 rounded-2xl border border-slate-200 dark:border-white/10 bg-white dark:bg-white/5 flex items-center justify-center hover:scale-105 transition shadow-sm">

                            <span x-show="darkMode">☀️</span>
                            <span x-show="!darkMode">🌙</span>

                        </button>

                        <!-- PROFILE -->
                        <div class="relative">

                            <!-- BUTTON -->
                            <button @click="profileMenu = !profileMenu"
                                class="flex items-center gap-3 pl-3 pr-2 py-2 rounded-2xl border border-slate-200 dark:border-white/10 bg-white dark:bg-white/5 hover:bg-slate-50 dark:hover:bg-white/10 transition shadow-sm">

                                <div class="hidden md:block text-right">

                                    <h3 class="text-sm font-semibold leading-none">
                                        {{ Auth::user()->name }}
                                    </h3>

                                    <p class="text-xs mt-1 text-slate-500 dark:text-slate-400 capitalize">
                                        {{ Auth::user()->role ?? 'student' }}
                                    </p>

                                </div>

                                <div
                                    class="w-11 h-11 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center text-white font-bold shadow-lg shadow-cyan-500/20">

                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                                </div>

                            </button>

                            <!-- DROPDOWN -->
                            <div x-show="profileMenu" @click.outside="profileMenu = false"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                                class="absolute right-0 mt-4 w-72 z-50 rounded-[28px] border border-slate-200 dark:border-white/10 bg-white dark:bg-[#0f172a] shadow-[0_20px_60px_rgba(0,0,0,0.18)] dark:shadow-[0_20px_60px_rgba(0,0,0,0.45)] overflow-hidden">

                                <!-- HEADER -->
                                <div
                                    class="p-5 border-b border-slate-200 dark:border-white/10 bg-slate-50 dark:bg-white/[0.03]">

                                    <div class="flex items-center gap-4">

                                        <div
                                            class="w-14 h-14 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center text-white font-bold text-lg shadow-lg shadow-cyan-500/20">

                                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                                        </div>

                                        <div>

                                            <h3 class="font-bold text-lg leading-none">
                                                {{ Auth::user()->name }}
                                            </h3>

                                            <p class="text-sm mt-2 text-slate-500 dark:text-slate-400">
                                                {{ Auth::user()->email }}
                                            </p>

                                        </div>

                                    </div>

                                </div>

                                <!-- MENU -->
                                <div class="p-3 flex flex-col gap-1">

                                    <a href="{{ route('profile.edit') }}"
                                        class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-slate-100 dark:hover:bg-white/[0.06] transition text-sm font-medium">

                                        <span>⚙️</span>
                                        <span>Profile Settings</span>

                                    </a>

                                    <a href="{{ route('progress') }}"
                                        class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-slate-100 dark:hover:bg-white/[0.06] transition text-sm font-medium">

                                        <span>📈</span>
                                        <span>My Progress</span>

                                    </a>

                                    <div class="my-2 border-t border-slate-200 dark:border-white/10"></div>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <button
                                            class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-red-500/10 text-red-400 transition text-sm font-medium">

                                            <span>🚪</span>
                                            <span>Logout</span>

                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                        <!-- MOBILE BUTTON -->
                        <button @click="mobileMenu = !mobileMenu"
                            class="lg:hidden w-12 h-12 rounded-2xl border border-slate-200 dark:border-white/10 bg-white dark:bg-white/5 flex items-center justify-center shadow-sm">

                            ☰

                        </button>

                    </div>

                </div>

            </div>

        </header>

        <!-- MOBILE OVERLAY -->
        <div x-show="mobileMenu" x-transition.opacity @click="mobileMenu = false"
            class="fixed inset-0 z-40 bg-black/30 lg:hidden">
        </div>

        <!-- MOBILE MENU -->
        <aside x-show="mobileMenu" x-transition:enter="transition duration-300"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition duration-300" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="fixed top-0 right-0 z-50 w-[300px] h-full bg-white dark:bg-[#0b1220] border-l border-slate-200 dark:border-white/10 p-6 lg:hidden">

            <div class="flex items-center justify-between mb-10">

                <h2 class="text-xl font-bold">
                    Menu
                </h2>

                <button @click="mobileMenu = false" class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-white/10">

                    ✕

                </button>

            </div>

            <nav class="flex flex-col gap-3">

                <a href="{{ route('dashboard') }}"
                    class="px-4 py-3 rounded-2xl transition
        {{ request()->routeIs('dashboard')
            ? 'bg-cyan-500/10 text-cyan-400 font-semibold'
            : 'hover:bg-slate-100 dark:hover:bg-white/10' }}">

                    Dashboard

                </a>

                <a href="{{ route('missions') }}"
                    class="px-4 py-3 rounded-2xl transition
        {{ request()->routeIs('missions')
            ? 'bg-cyan-500/10 text-cyan-400 font-semibold'
            : 'hover:bg-slate-100 dark:hover:bg-white/10' }}">

                    Missions

                </a>

                <a href="{{ route('progress') }}"
                    class="px-4 py-3 rounded-2xl transition
        {{ request()->routeIs('progress')
            ? 'bg-cyan-500/10 text-cyan-400 font-semibold'
            : 'hover:bg-slate-100 dark:hover:bg-white/10' }}">

                    Progress

                </a>

                <a href="{{ route('profile.edit') }}"
                    class="px-4 py-3 rounded-2xl transition
        {{ request()->routeIs('profile.edit')
            ? 'bg-cyan-500/10 text-cyan-400 font-semibold'
            : 'hover:bg-slate-100 dark:hover:bg-white/10' }}">

                    Profile Settings

                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="w-full text-left px-4 py-3 rounded-2xl text-red-400 hover:bg-red-500/10 transition">

                        Logout

                    </button>

                </form>

            </nav>

        </aside>

        <!-- CONTENT -->
        <main class="flex-1">

            <div class="max-w-7xl mx-auto px-5 lg:px-10 py-10">

                {{ $slot }}

            </div>

        </main>

    </div>

</body>

</html>
