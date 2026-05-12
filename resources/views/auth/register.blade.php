<x-guest-layout>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">

        @csrf

        <!-- TITLE -->
        <div class="mb-8">

            <h2 class="text-4xl font-bold text-white mb-3">
                Create Account
            </h2>

            <p class="text-slate-400">
                Start your English learning journey with SpeakVerse.
            </p>

        </div>

        <!-- NAME -->
        <div>

            <label for="name" class="block text-sm font-medium text-slate-300 mb-2">

                Full Name

            </label>

            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                autocomplete="name" placeholder="Enter your full name"
                class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-5 py-4 text-white placeholder:text-slate-500 focus:border-cyan-400 focus:ring-4 focus:ring-cyan-400/20 transition-all duration-300 outline-none" />

            @error('name')
                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- EMAIL -->
        <div>

            <label for="email" class="block text-sm font-medium text-slate-300 mb-2">

                Email Address

            </label>

            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                autocomplete="username" placeholder="Enter your email"
                class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-5 py-4 text-white placeholder:text-slate-500 focus:border-cyan-400 focus:ring-4 focus:ring-cyan-400/20 transition-all duration-300 outline-none" />

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

            <input id="password" type="password" name="password" required autocomplete="new-password"
                placeholder="Create your password"
                class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-5 py-4 text-white placeholder:text-slate-500 focus:border-cyan-400 focus:ring-4 focus:ring-cyan-400/20 transition-all duration-300 outline-none" />

            @error('password')
                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- CONFIRM PASSWORD -->
        <div>

            <label for="password_confirmation" class="block text-sm font-medium text-slate-300 mb-2">

                Confirm Password

            </label>

            <input id="password_confirmation" type="password" name="password_confirmation" required
                autocomplete="new-password" placeholder="Confirm your password"
                class="w-full rounded-2xl border border-slate-700 bg-slate-900/60 px-5 py-4 text-white placeholder:text-slate-500 focus:border-cyan-400 focus:ring-4 focus:ring-cyan-400/20 transition-all duration-300 outline-none" />

            @error('password_confirmation')
                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- REGISTER BUTTON -->
        <button type="submit"
            class="w-full py-4 rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-semibold text-lg hover:scale-[1.01] hover:shadow-xl hover:shadow-cyan-500/20 transition-all duration-300">

            Create Account

        </button>

        <!-- LOGIN LINK -->
        <div class="text-center pt-2">

            <p class="text-slate-400 text-sm">

                Already have an account?

                <a href="{{ route('login') }}" class="text-cyan-400 hover:text-cyan-300 font-medium transition">

                    Log In

                </a>

            </p>

        </div>

    </form>

</x-guest-layout>
