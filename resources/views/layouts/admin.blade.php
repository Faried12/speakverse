<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ sidebar: true }">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SpeakVerse Admin</title>

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-[Outfit] bg-slate-100 text-slate-900 overflow-x-hidden">

    <div class="min-h-screen flex">

        <!-- SIDEBAR -->
        <aside class="w-[280px] bg-[#0f172a] text-white flex flex-col border-r border-white/10">

            <!-- LOGO -->
            <div class="h-20 px-6 flex items-center border-b border-white/10">

                <div
                    class="w-12 h-12 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center font-bold text-xl">

                    S

                </div>

                <div class="ml-4">

                    <h1 class="text-xl font-bold">
                        SpeakVerse
                    </h1>

                    <p class="text-xs text-slate-400">
                        Admin Panel
                    </p>

                </div>

            </div>

            <!-- MENU -->
            <nav class="flex-1 p-5 space-y-2">

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-cyan-500/10 text-cyan-400 font-semibold">

                    <span>📊</span>
                    <span>Dashboard</span>

                </a>

                <a href="{{ route('admin.users') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl transition
                    {{ request()->routeIs('admin.users') ? 'bg-cyan-500/10 text-cyan-400 font-semibold' : 'hover:bg-white/5' }}">

                    <span>👥</span>
                    <span>Users</span>

                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-white/5 transition">

                    <span>🎯</span>
                    <span>Missions</span>

                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-white/5 transition">

                    <span>🎤</span>
                    <span>Practice</span>

                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-white/5 transition">

                    <span>📈</span>
                    <span>Analytics</span>

                </a>

            </nav>

            <!-- FOOTER -->
            <div class="p-5 border-t border-white/10">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        class="w-full px-4 py-3 rounded-2xl bg-red-500/10 text-red-400 hover:bg-red-500/20 transition">

                        Logout

                    </button>

                </form>

            </div>

        </aside>

        <!-- CONTENT -->
        <div class="flex-1 flex flex-col">

            <!-- TOPBAR -->
            <header class="h-20 bg-white border-b border-slate-200 px-8 flex items-center justify-between">

                <div>

                    <h2 class="text-2xl font-black">
                        Admin Dashboard
                    </h2>

                    <p class="text-sm text-slate-500">
                        Manage SpeakVerse Platform
                    </p>

                </div>

                <div class="flex items-center gap-4">

                    <div class="text-right">

                        <h3 class="font-bold">
                            {{ Auth::user()->name }}
                        </h3>

                        <p class="text-sm text-slate-500">
                            Administrator
                        </p>

                    </div>

                    <div
                        class="w-12 h-12 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center text-white font-bold">

                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                    </div>

                </div>

            </header>

            <!-- PAGE -->
            <main class="flex-1 p-8">

                @yield('content')

            </main>

        </div>

    </div>

</body>

</html>
