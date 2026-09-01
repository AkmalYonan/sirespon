<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sirespon Auth') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-950 text-slate-100 min-h-screen selection:bg-blue-500 selection:text-white relative flex flex-col justify-center items-center p-4">
        <!-- Ambient Glow -->
        <div class="fixed inset-0 pointer-events-none overflow-hidden z-0">
            <div class="absolute -top-40 -left-40 w-96 h-96 bg-blue-600/20 rounded-full blur-[128px]"></div>
            <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-cyan-500/15 rounded-full blur-[128px]"></div>
        </div>

        <div class="w-full sm:max-w-md relative z-10">
            <div class="text-center mb-8">
                <a href="/" class="inline-flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl gradient-brand flex items-center justify-center shadow-lg shadow-blue-500/30 text-white font-extrabold text-2xl">
                        SR
                    </div>
                    <span class="text-2xl font-extrabold tracking-tight text-white">Sirespon</span>
                </a>
            </div>

            <div class="glass-card rounded-3xl p-8 border border-slate-800 shadow-2xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
