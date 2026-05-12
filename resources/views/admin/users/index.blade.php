@extends('layouts.admin')

@section('content')
    <!-- HEADER -->
    <div class="flex items-center justify-between mb-8">

        <div>

            <h1 class="text-3xl font-black">
                User Management
            </h1>

            <p class="text-slate-500 mt-1">
                Manage all registered users
            </p>

        </div>

        <button
            class="px-5 py-3 rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-semibold shadow-lg shadow-cyan-500/20">

            + Add User

        </button>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-200">

                    <tr>

                        <th class="text-left px-6 py-4 text-sm font-bold text-slate-500">
                            User
                        </th>

                        <th class="text-left px-6 py-4 text-sm font-bold text-slate-500">
                            Email
                        </th>

                        <th class="text-left px-6 py-4 text-sm font-bold text-slate-500">
                            Role
                        </th>

                        <th class="text-left px-6 py-4 text-sm font-bold text-slate-500">
                            Joined
                        </th>

                        <th class="text-right px-6 py-4 text-sm font-bold text-slate-500">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($users as $user)
                        <tr class="border-b border-slate-100 hover:bg-slate-50 transition">

                            <!-- USER -->
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-4">

                                    <div
                                        class="w-12 h-12 rounded-2xl bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center text-white font-bold">

                                        {{ strtoupper(substr($user->name, 0, 1)) }}

                                    </div>

                                    <div>

                                        <h3 class="font-bold">
                                            {{ $user->name }}
                                        </h3>

                                        <p class="text-sm text-slate-500">
                                            ID: #{{ $user->id }}
                                        </p>

                                    </div>

                                </div>

                            </td>

                            <!-- EMAIL -->
                            <td class="px-6 py-5 text-slate-600">

                                {{ $user->email }}

                            </td>

                            <!-- ROLE -->
                            <td class="px-6 py-5">

                                @if ($user->role === 'admin')
                                    <span class="px-4 py-2 rounded-xl bg-red-500/10 text-red-500 text-sm font-semibold">

                                        Admin

                                    </span>
                                @else
                                    <span class="px-4 py-2 rounded-xl bg-cyan-500/10 text-cyan-500 text-sm font-semibold">

                                        Student

                                    </span>
                                @endif

                            </td>

                            <!-- DATE -->
                            <td class="px-6 py-5 text-slate-500 text-sm">

                                {{ $user->created_at->format('d M Y') }}

                            </td>

                            <!-- ACTION -->
                            <td class="px-6 py-5">

                                <div class="flex items-center justify-end gap-3">

                                    <button
                                        class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 transition text-sm font-medium">

                                        Edit

                                    </button>

                                    <button
                                        class="px-4 py-2 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-500 transition text-sm font-medium">

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
