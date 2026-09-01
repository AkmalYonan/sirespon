<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lacak Status Laporan — Sirespon</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-950 text-slate-100 min-h-screen">
    <!-- Header -->
    <header class="sticky top-0 z-40 bg-slate-950/80 backdrop-blur-xl border-b border-slate-800">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl gradient-brand flex items-center justify-center shadow-lg shadow-blue-500/25 text-white font-extrabold">
                    SR
                </div>
                <div class="flex flex-col">
                    <span class="text-lg font-bold text-white">Sirespon</span>
                    <span class="text-xs text-slate-400">Lacak Status Laporan</span>
                </div>
            </a>

            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-4 py-2 text-xs sm:text-sm font-semibold text-slate-300 hover:text-white bg-slate-900 border border-slate-800 rounded-xl transition-smooth">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Beranda
            </a>
        </nav>
    </header>

    <main class="py-12 max-w-4xl mx-auto px-4 sm:px-6">
        <!-- Search Card -->
        <div class="glass-card rounded-3xl p-6 sm:p-8 border border-slate-800 mb-8 shadow-2xl">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white mb-2">Pelacakan Status Laporan</h1>
            <p class="text-xs sm:text-sm text-slate-400 mb-6">Masukkan kode pelacakan yang Anda peroleh saat mengirimkan laporan.</p>

            <form action="{{ route('laporan.track') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
                <input type="text" name="id_lacak" value="{{ $idLacak ?? '' }}" placeholder="Contoh: RSP-202401-XXXX" required
                    class="flex-1 px-5 py-3.5 bg-slate-950/90 border border-slate-800 focus:border-blue-500 rounded-2xl text-sm sm:text-base text-white placeholder-slate-500 focus:ring-4 focus:ring-blue-500/20 transition-smooth">
                <button type="submit"
                    class="px-8 py-3.5 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-bold text-sm rounded-2xl shadow-lg shadow-blue-500/25 transition-smooth flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Cari Laporan
                </button>
            </form>
        </div>

        @if(!empty($idLacak) && !$laporan)
        <div class="glass-card rounded-3xl p-10 border border-rose-500/30 text-center animate-slide-up">
            <div class="w-16 h-16 rounded-full bg-rose-500/10 text-rose-400 border border-rose-500/20 flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Laporan Tidak Ditemukan</h3>
            <p class="text-sm text-slate-400 max-w-md mx-auto">
                Kode lacak <span class="font-mono text-rose-400 font-bold">"{{ $idLacak }}"</span> tidak terdaftar dalam sistem. Mohon pastikan kembali kode yang Anda masukkan sudah benar.
            </p>
        </div>
        @elseif($laporan)
        <!-- Report Found Details -->
        <div class="space-y-8 animate-slide-up">
            <!-- Timeline Status Indicator -->
            <div class="glass-card rounded-3xl p-6 sm:p-8 border border-slate-800">
                <h3 class="text-sm font-bold uppercase tracking-wider text-slate-400 mb-6">Tahapan Penanganan Laporan</h3>
                
                @php
                    $statusSteps = [
                        'menunggu' => 1,
                        'proses' => 2,
                        'selesai' => 3,
                        'ditolak' => -1,
                    ];
                    $currentStep = $statusSteps[$laporan->status_laporan] ?? 1;
                @endphp

                @if($laporan->status_laporan === 'ditolak')
                <div class="p-4 rounded-2xl bg-rose-950/40 border border-rose-500/30 text-rose-300 flex items-center gap-3">
                    <svg class="w-6 h-6 text-rose-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <p class="text-sm font-bold">Laporan Ditolak</p>
                        <p class="text-xs text-rose-400">Laporan tidak dapat diproses lebih lanjut. Periksa catatan tanggapan di bawah.</p>
                    </div>
                </div>
                @else
                <div class="relative flex items-center justify-between max-w-2xl mx-auto">
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-1 bg-slate-800 -z-0"></div>
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 h-1 bg-gradient-to-r from-blue-500 to-cyan-400 transition-all duration-500 -z-0"
                         style="width: {{ $currentStep == 1 ? '0%' : ($currentStep == 2 ? '50%' : '100%') }}"></div>

                    <!-- Step 1: Diterima / Menunggu -->
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-xs font-bold transition-smooth {{ $currentStep >= 1 ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/40 ring-4 ring-slate-950' : 'bg-slate-800 text-slate-400 ring-4 ring-slate-950' }}">
                            1
                        </div>
                        <span class="mt-2 text-xs font-bold {{ $currentStep >= 1 ? 'text-blue-400' : 'text-slate-500' }}">Terkirim</span>
                    </div>

                    <!-- Step 2: Sedang Diproses -->
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-xs font-bold transition-smooth {{ $currentStep >= 2 ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/40 ring-4 ring-slate-950' : 'bg-slate-800 text-slate-400 ring-4 ring-slate-950' }}">
                            2
                        </div>
                        <span class="mt-2 text-xs font-bold {{ $currentStep >= 2 ? 'text-blue-400' : 'text-slate-500' }}">Diproses</span>
                    </div>

                    <!-- Step 3: Selesai -->
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-xs font-bold transition-smooth {{ $currentStep >= 3 ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-500/40 ring-4 ring-slate-950' : 'bg-slate-800 text-slate-400 ring-4 ring-slate-950' }}">
                            3
                        </div>
                        <span class="mt-2 text-xs font-bold {{ $currentStep >= 3 ? 'text-emerald-400' : 'text-slate-500' }}">Selesai</span>
                    </div>
                </div>
                @endif
            </div>

            <!-- Detail Laporan Card -->
            <div class="glass-card rounded-3xl p-6 sm:p-8 border border-slate-800">
                <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-800 pb-5 mb-6">
                    <div>
                        <span class="font-mono text-blue-400 font-bold text-sm">{{ $laporan->id_lacak }}</span>
                        <h2 class="text-2xl font-extrabold text-white mt-1">{{ $laporan->judul }}</h2>
                    </div>
                    @php $badge = $laporan->status_laporan_badge; @endphp
                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-bold {{ $badge['class'] }}">
                        <span class="w-2 h-2 rounded-full {{ $badge['dot'] }}"></span>
                        {{ $badge['label'] }}
                    </span>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 p-4 rounded-2xl bg-slate-950/60 border border-slate-800/80 mb-6 text-xs">
                    <div>
                        <span class="text-slate-400 block mb-1">Klasifikasi</span>
                        <span class="font-bold text-white capitalize">{{ $laporan->klasifikasi }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block mb-1">Kategori</span>
                        <span class="font-bold text-white">{{ $laporan->kategori?->nama_kategori ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block mb-1">Instansi Tujuan</span>
                        <span class="font-bold text-white">{{ $laporan->instansi?->nama ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block mb-1">Tanggal Lapor</span>
                        <span class="font-bold text-white">{{ $laporan->date?->format('d F Y') ?? '-' }}</span>
                    </div>
                </div>

                <div class="mb-6">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Rincian Deskripsi</h4>
                    <div class="p-4 rounded-2xl bg-slate-950/40 border border-slate-800/60 text-sm text-slate-200 leading-relaxed whitespace-pre-line">
                        {{ $laporan->desc }}
                    </div>
                </div>

                @if($laporan->lokasi)
                <div class="mb-6">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Lokasi Kejadian</h4>
                    <p class="text-sm text-slate-300 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $laporan->lokasi }}
                    </p>
                </div>
                @endif

                @if($laporan->lampiran)
                <div class="mb-6">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Lampiran Bukti</h4>
                    <a href="{{ asset('storage/' . $laporan->lampiran) }}" target="_blank"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-slate-900 hover:bg-slate-800 border border-slate-700 rounded-xl text-xs font-semibold text-blue-400 transition-smooth">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                        </svg>
                        Buka / Unduh Berkas Lampiran
                    </a>
                </div>
                @endif
            </div>

            <!-- Responses Stream -->
            <div class="glass-card rounded-3xl p-6 sm:p-8 border border-slate-800">
                <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                    Tanggapan & Tindak Lanjut Petugas
                </h3>

                @if($laporan->comments->count() === 0)
                <div class="p-6 text-center rounded-2xl bg-slate-950/40 border border-slate-800 text-slate-400 text-xs">
                    Belum ada tanggapan atau catatan baru dari petugas terkait laporan ini.
                </div>
                @else
                <div class="space-y-4">
                    @foreach($laporan->comments as $comment)
                    <div class="p-4 rounded-2xl bg-slate-950/60 border border-slate-800/80 text-xs sm:text-sm">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-lg bg-blue-600 text-white flex items-center justify-center font-bold text-[10px]">
                                    {{ substr($comment->author_name ?? 'P', 0, 1) }}
                                </div>
                                <span class="font-bold text-white">{{ $comment->author_name ?? 'Petugas / Admin' }}</span>
                            </div>
                            <span class="text-slate-500 text-xs">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-slate-300 leading-relaxed pl-8">
                            {{ $comment->desc }}
                        </p>
                        @if($comment->lampiran)
                        <div class="pl-8 mt-2">
                            <a href="{{ asset('storage/' . $comment->lampiran) }}" target="_blank" class="text-blue-400 hover:underline text-xs inline-flex items-center gap-1">
                                📎 Berkas lampiran balasan
                            </a>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        @endif
    </main>
</body>

</html>
