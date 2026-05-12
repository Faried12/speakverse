@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-4 gap-6">

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200">

            <p class="text-slate-500 text-sm">
                Total Users
            </p>

            <h2 class="text-4xl font-black mt-3">
                120
            </h2>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200">

            <p class="text-slate-500 text-sm">
                Total Missions
            </p>

            <h2 class="text-4xl font-black mt-3">
                32
            </h2>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200">

            <p class="text-slate-500 text-sm">
                Practice Sessions
            </p>

            <h2 class="text-4xl font-black mt-3">
                890
            </h2>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200">

            <p class="text-slate-500 text-sm">
                Active Users
            </p>

            <h2 class="text-4xl font-black mt-3 text-green-500">
                87
            </h2>

        </div>

    </div>
@endsection
