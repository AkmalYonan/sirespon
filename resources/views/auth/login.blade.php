<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-extrabold text-white">Masuk ke Sirespon</h2>
        <p class="text-xs text-slate-400 mt-1">Gunakan akun administrator atau staff Anda</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-xs font-semibold text-emerald-400" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                placeholder="admin@sirespon.test"
                class="w-full px-4 py-3 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-xs sm:text-sm text-white placeholder-slate-500 focus:ring-4 focus:ring-blue-500/15 transition-smooth" />
            <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-rose-400" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1">Kata Sandi</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                placeholder="••••••••"
                class="w-full px-4 py-3 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-xs sm:text-sm text-white placeholder-slate-500 focus:ring-4 focus:ring-blue-500/15 transition-smooth" />
            <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs text-rose-400" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="w-4 h-4 text-blue-600 bg-slate-900 border-slate-700 rounded focus:ring-blue-500 focus:ring-2" name="remember">
                <span class="ms-2 text-xs font-semibold text-slate-400">Ingat Saya</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-xs font-semibold text-blue-400 hover:text-blue-300 transition-smooth" href="{{ route('password.request') }}">
                    Lupa sandi?
                </a>
            @endif
        </div>

        <button type="submit"
            class="w-full py-3.5 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-extrabold text-sm rounded-xl shadow-lg shadow-blue-600/25 transition-smooth">
            Masuk Sekarang
        </button>

        <div class="mt-4 pt-4 border-t border-slate-800/80 text-center">
            <p class="text-[11px] text-slate-500">
                Akun demo bawaan: <span class="text-slate-300 font-mono">admin@sirespon.test</span> (sandi: <span class="text-slate-300 font-mono">password</span>)
            </p>
        </div>
    </form>
</x-guest-layout>
