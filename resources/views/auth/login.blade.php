<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6 text-sm text-green-400" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">

        @csrf

        <!-- EMAIL -->
        <div>

            <label for="email" class="block text-sm font-medium text-slate-300 mb-2">

                Email Address

            </label>

            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                autocomplete="username"
                class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-5 py-4 text-white placeholder:text-slate-500 focus:border-cyan-400 focus:ring-4 focus:ring-cyan-400/20 transition-all duration-300 outline-none"
                placeholder="Enter your email" />

            @error('email')
                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- PASSWORD -->
        <div>

            <label for="password" class="block text-sm font-medium text-slate-300 mb-2">

                Password

            </label>

            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-5 py-4 text-white placeholder:text-slate-500 focus:border-cyan-400 focus:ring-4 focus:ring-cyan-400/20 transition-all duration-300 outline-none"
                placeholder="Enter your password" />

            @error('password')
                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- REMEMBER + FORGOT -->
        <div class="flex items-center justify-between gap-4 flex-wrap">

            <label class="flex items-center gap-3 cursor-pointer">

                <input type="checkbox" name="remember"
                    class="w-5 h-5 rounded border-slate-600 bg-slate-800 text-cyan-400 focus:ring-cyan-400/30">

                <span class="text-sm text-slate-400">
                    Remember me
                </span>

            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-cyan-400 hover:text-cyan-300 transition">

                    Forgot password?

                </a>
            @endif

        </div>

        <!-- LOGIN BUTTON -->
        <button type="submit"
            class="w-full py-4 rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-semibold text-lg hover:scale-[1.01] hover:shadow-xl hover:shadow-cyan-500/20 transition-all duration-300">

            Log In

        </button>

        <!-- REGISTER -->
        <div class="text-center pt-2">

            <p class="text-slate-400 text-sm">

                Don’t have an account?

                <a href="{{ route('register') }}" class="text-cyan-400 hover:text-cyan-300 font-medium transition">

                    Create Account

                </a>

            </p>

        </div>

    </form>

</x-guest-layout>
