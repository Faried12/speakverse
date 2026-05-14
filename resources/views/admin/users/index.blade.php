@extends('layouts.admin')

@section('content')
    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5 mb-8">

        <div>

            <h1 class="text-3xl lg:text-4xl font-black leading-tight">
                User Management
            </h1>

            <p class="mt-2 text-slate-500 dark:text-slate-400">
                Manage all registered users
            </p>

        </div>

        <button
            class="w-full sm:w-auto
            px-6 py-4 rounded-2xl
            bg-gradient-to-r from-cyan-500 to-blue-600
            text-white font-bold
            shadow-lg shadow-cyan-500/20
            hover:scale-[1.02]
            transition-all duration-200">

            + Add User

        </button>

    </div>

    <!-- MOBILE USERS -->
    <div class="grid grid-cols-1 gap-5 lg:hidden">

        @foreach ($users as $user)
            <div
                class="rounded-3xl
                bg-white dark:bg-white/[0.03]
                border border-slate-200 dark:border-white/10
                p-5 shadow-sm">

                <!-- TOP -->
                <div class="flex items-start justify-between gap-4">

                    <div class="flex items-center gap-4 min-w-0">

                        <!-- AVATAR -->
                        <div
                            class="w-14 h-14 shrink-0 rounded-2xl
                            bg-gradient-to-br from-cyan-400 to-blue-600
                            flex items-center justify-center
                            text-white text-lg font-black">

                            {{ strtoupper(substr($user->name, 0, 1)) }}

                        </div>

                        <!-- INFO -->
                        <div class="min-w-0">

                            <h3 class="font-black text-lg truncate">
                                {{ $user->name }}
                            </h3>

                            <p class="text-sm text-slate-500 dark:text-slate-400 truncate">
                                {{ $user->email }}
                            </p>

                            <p class="text-xs mt-1 text-slate-400">
                                ID: #{{ $user->id }}
                            </p>

                        </div>

                    </div>

                    <!-- ROLE -->
                    @if ($user->role === 'admin')
                        <span
                            class="px-3 py-2 rounded-xl
                            bg-red-500/10 text-red-400
                            text-xs font-bold shrink-0">

                            Admin

                        </span>
                    @else
                        <span
                            class="px-3 py-2 rounded-xl
                            bg-cyan-500/10 text-cyan-400
                            text-xs font-bold shrink-0">

                            Student

                        </span>
                    @endif

                </div>

                <!-- DATE -->
                <div class="mt-5 pt-5
                    border-t border-slate-200 dark:border-white/10">

                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        Joined
                    </p>

                    <h4 class="font-semibold mt-1">
                        {{ $user->created_at->format('d M Y') }}
                    </h4>

                </div>

                <!-- ACTION -->
                <div class="grid grid-cols-2 gap-3 mt-5">

                    <button
                        class="py-3 rounded-2xl
                        bg-slate-100 dark:bg-white/5
                        hover:bg-slate-200 dark:hover:bg-white/10
                        transition-all duration-200
                        font-semibold">

                        Edit

                    </button>

                    <button
                        class="py-3 rounded-2xl
                        bg-red-500/10
                        text-red-400
                        hover:bg-red-500/20
                        transition-all duration-200
                        font-semibold">

                        Delete

                    </button>

                </div>

            </div>
        @endforeach

    </div>

    <!-- DESKTOP TABLE -->
    <div
        class="hidden lg:block
        rounded-[32px]
        overflow-hidden
        bg-white dark:bg-white/[0.03]
        border border-slate-200 dark:border-white/10
        shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[900px]">

                <!-- HEAD -->
                <thead
                    class="bg-slate-50 dark:bg-white/[0.03]
                    border-b border-slate-200 dark:border-white/10">

                    <tr>

                        <th
                            class="text-left px-8 py-6
                            text-sm font-black
                            text-slate-500 dark:text-slate-400">

                            User

                        </th>

                        <th
                            class="text-left px-8 py-6
                            text-sm font-black
                            text-slate-500 dark:text-slate-400">

                            Email

                        </th>

                        <th
                            class="text-left px-8 py-6
                            text-sm font-black
                            text-slate-500 dark:text-slate-400">

                            Role

                        </th>

                        <th
                            class="text-left px-8 py-6
                            text-sm font-black
                            text-slate-500 dark:text-slate-400">

                            Joined

                        </th>

                        <th
                            class="text-right px-8 py-6
                            text-sm font-black
                            text-slate-500 dark:text-slate-400">

                            Actions

                        </th>

                    </tr>

                </thead>

                <!-- BODY -->
                <tbody>

                    @foreach ($users as $user)
                        <tr
                            class="border-b border-slate-100 dark:border-white/5
                            hover:bg-slate-50 dark:hover:bg-white/[0.02]
                            transition-all duration-200">

                            <!-- USER -->
                            <td class="px-8 py-6">

                                <div class="flex items-center gap-5">

                                    <div
                                        class="w-14 h-14 rounded-2xl
                                        bg-gradient-to-br from-cyan-400 to-blue-600
                                        flex items-center justify-center
                                        text-white text-lg font-black
                                        shadow-lg shadow-cyan-500/10">

                                        {{ strtoupper(substr($user->name, 0, 1)) }}

                                    </div>

                                    <div>

                                        <h3 class="font-black text-xl">
                                            {{ $user->name }}
                                        </h3>

                                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                                            ID: #{{ $user->id }}
                                        </p>

                                    </div>

                                </div>

                            </td>

                            <!-- EMAIL -->
                            <td
                                class="px-8 py-6
                                text-slate-600 dark:text-slate-300
                                font-medium">

                                {{ $user->email }}

                            </td>

                            <!-- ROLE -->
                            <td class="px-8 py-6">

                                @if ($user->role === 'admin')
                                    <span
                                        class="px-5 py-3 rounded-2xl
                                        bg-red-500/10
                                        text-red-400
                                        text-sm font-bold">

                                        Admin

                                    </span>
                                @else
                                    <span
                                        class="px-5 py-3 rounded-2xl
                                        bg-cyan-500/10
                                        text-cyan-400
                                        text-sm font-bold">

                                        Student

                                    </span>
                                @endif

                            </td>

                            <!-- DATE -->
                            <td
                                class="px-8 py-6
                                text-slate-500 dark:text-slate-400
                                font-medium">

                                {{ $user->created_at->format('d M Y') }}

                            </td>

                            <!-- ACTION -->
                            <td class="px-8 py-6">

                                <div class="flex items-center justify-end gap-3">

                                    <button
                                        class="px-5 py-3 rounded-2xl
                                        bg-slate-100 dark:bg-white/5
                                        hover:bg-slate-200 dark:hover:bg-white/10
                                        transition-all duration-200
                                        font-semibold">

                                        Edit

                                    </button>

                                    <button
                                        class="px-5 py-3 rounded-2xl
                                        bg-red-500/10
                                        text-red-400
                                        hover:bg-red-500/20
                                        transition-all duration-200
                                        font-semibold">

                                        Delete

                                    </button>

                                </div>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>
@endsection
