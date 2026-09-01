<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sirespon Admin') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-950 text-slate-100 min-h-screen">
    <div class="min-h-screen bg-slate-950 flex flex-col">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="flex-1 sm:ml-64 pt-16 transition-all duration-300">
            <div class="p-4 sm:p-6 lg:p-8 max-w-7xl mx-auto animate-fade-in">
                @if (session('success'))
                <div id="alert-success" class="flex items-center p-4 mb-6 text-emerald-300 bg-emerald-950/60 border border-emerald-500/30 rounded-2xl shadow-lg shadow-emerald-950/50 backdrop-blur-md animate-slide-up" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5 me-3 text-emerald-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <div class="text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-emerald-900/30 text-emerald-400 rounded-lg p-1.5 hover:bg-emerald-900/60 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                @endif

                @if (session('error'))
                <div id="alert-error" class="flex items-center p-4 mb-6 text-rose-300 bg-rose-950/60 border border-rose-500/30 rounded-2xl shadow-lg shadow-rose-950/50 backdrop-blur-md animate-slide-up" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5 me-3 text-rose-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                    </svg>
                    <div class="text-sm font-medium">
                        {{ session('error') }}
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-rose-900/30 text-rose-400 rounded-lg p-1.5 hover:bg-rose-900/60 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-error" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                @endif

                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>