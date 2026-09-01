<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sirespon — Layanan Aspirasi & Pengaduan Cepat Tanggap</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-950 text-slate-100 min-h-screen selection:bg-blue-500 selection:text-white">
    <!-- Ambient Background Glow -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-blue-600/20 rounded-full blur-[128px] animate-pulse-slow"></div>
        <div class="absolute top-1/3 -right-40 w-96 h-96 bg-cyan-500/15 rounded-full blur-[128px]"></div>
        <div class="absolute -bottom-40 left-1/3 w-96 h-96 bg-indigo-600/15 rounded-full blur-[128px]"></div>
    </div>

    <!-- Header Navigation -->
    <header class="sticky top-0 z-40 bg-slate-950/80 backdrop-blur-xl border-b border-slate-800/80">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-11 h-11 rounded-2xl gradient-brand flex items-center justify-center shadow-lg shadow-blue-500/25 group-hover:scale-105 transition-smooth">
                    <span class="text-white font-extrabold text-xl">SR</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-extrabold tracking-tight text-white group-hover:text-blue-400 transition-smooth">Sirespon</span>
                    <span class="text-xs text-slate-400 font-medium">Layanan Laporan Cepat</span>
                </div>
            </a>

            <!-- Navigation Links & CTA -->
            <div class="flex items-center gap-4 sm:gap-6">
                <a href="#form-laporan" class="hidden md:inline-flex text-sm font-semibold text-slate-300 hover:text-white transition-smooth">
                    Buat Laporan
                </a>
                <a href="#lacak" class="hidden md:inline-flex text-sm font-semibold text-slate-300 hover:text-white transition-smooth">
                    Lacak Status
                </a>
                <a href="#laporan-publik" class="hidden md:inline-flex text-sm font-semibold text-slate-300 hover:text-white transition-smooth">
                    Laporan Publik
                </a>

                @auth
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs sm:text-sm font-bold shadow-lg shadow-blue-600/30 transition-smooth">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    Dashboard Admin
                </a>
                @else
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-4 py-2 text-xs sm:text-sm font-semibold text-slate-300 hover:text-white bg-slate-900 border border-slate-800 hover:border-slate-700 rounded-xl transition-smooth">
                    Masuk Staff
                </a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="relative z-10">
        <!-- Hero Section -->
        <section class="pt-12 pb-16 lg:pt-20 lg:pb-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs sm:text-sm font-semibold mb-6 animate-fade-in">
                <span class="flex h-2 w-2 rounded-full bg-blue-400 animate-ping"></span>
                Sistem Informasi Pelaporan & Respon Cepat
            </div>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white max-w-4xl mx-auto leading-tight sm:leading-none">
                Sampaikan Aspirasi & Laporan Anda <span class="bg-gradient-to-r from-blue-400 via-cyan-400 to-indigo-400 bg-clip-text text-transparent">Langsung Ditanggapi</span>
            </h1>

            <p class="mt-6 text-base sm:text-lg text-slate-400 max-w-2xl mx-auto font-normal">
                Platform resmi untuk menyampaikan keluhan, pengaduan, dan saran demi peningkatan kualitas pelayanan dan fasilitas bersama.
            </p>

            <!-- Tracking Search Bar in Hero -->
            <div id="lacak" class="mt-10 max-w-xl mx-auto">
                <form action="{{ route('laporan.track') }}" method="GET" class="relative flex items-center">
                    <input type="text" name="id_lacak" placeholder="Masukkan Kode Lacak (contoh: RSP-2024-XXXX)..." required
                        class="w-full pl-5 pr-36 py-4 bg-slate-900/90 border border-slate-700/80 focus:border-blue-500 rounded-2xl text-sm sm:text-base text-white placeholder-slate-500 shadow-2xl focus:ring-4 focus:ring-blue-500/20 transition-smooth backdrop-blur-md">
                    <button type="submit"
                        class="absolute right-2 top-2 bottom-2 px-5 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-semibold text-xs sm:text-sm rounded-xl shadow-lg shadow-blue-500/25 transition-smooth flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <span>Lacak</span>
                    </button>
                </form>
            </div>

            <!-- Live Metrics Counter -->
            <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
                <div class="p-4 rounded-2xl bg-slate-900/60 border border-slate-800/80 backdrop-blur-md">
                    <p class="text-2xl sm:text-3xl font-extrabold text-white">{{ $stats['total'] ?? 0 }}</p>
                    <p class="text-xs text-slate-400 mt-1 font-medium">Total Laporan Masuk</p>
                </div>
                <div class="p-4 rounded-2xl bg-slate-900/60 border border-slate-800/80 backdrop-blur-md">
                    <p class="text-2xl sm:text-3xl font-extrabold text-blue-400">{{ $stats['proses'] ?? 0 }}</p>
                    <p class="text-xs text-slate-400 mt-1 font-medium">Sedang Diproses</p>
                </div>
                <div class="p-4 rounded-2xl bg-slate-900/60 border border-slate-800/80 backdrop-blur-md">
                    <p class="text-2xl sm:text-3xl font-extrabold text-emerald-400">{{ $stats['selesai'] ?? 0 }}</p>
                    <p class="text-xs text-slate-400 mt-1 font-medium">Laporan Terselesaikan</p>
                </div>
                <div class="p-4 rounded-2xl bg-slate-900/60 border border-slate-800/80 backdrop-blur-md">
                    <p class="text-2xl sm:text-3xl font-extrabold text-cyan-400">{{ $stats['instansi'] ?? 0 }}</p>
                    <p class="text-xs text-slate-400 mt-1 font-medium">Instansi & Unit Terhubung</p>
                </div>
            </div>
        </section>

        <!-- Main Form Section -->
        <section id="form-laporan" class="pb-20 max-w-4xl mx-auto px-4 sm:px-6">
            <div class="glass-card rounded-3xl p-6 sm:p-10 border border-slate-800 shadow-2xl relative overflow-hidden">
                <!-- Card Header -->
                <div class="border-b border-slate-800 pb-6 mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-white">Formulir Pelaporan</h2>
                        <p class="text-xs sm:text-sm text-slate-400 mt-1">Isi formulir dengan informasi yang jelas dan akurat</p>
                    </div>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-500/10 text-blue-400 border border-blue-500/20 text-xs font-semibold self-start sm:self-auto">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Privasi Terjamin
                    </span>
                </div>

                @if ($errors->any())
                <div class="p-4 mb-6 text-rose-300 bg-rose-950/60 border border-rose-500/30 rounded-2xl">
                    <p class="text-sm font-bold mb-2">Mohon perbaiki kesalahan berikut:</p>
                    <ul class="list-disc list-inside text-xs space-y-1">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- 1. Klasifikasi Switcher -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Pilih Klasifikasi</label>
                        <div class="grid grid-cols-2 gap-3 p-1.5 bg-slate-950/80 rounded-2xl border border-slate-800">
                            <div>
                                <input type="radio" name="klasifikasi" id="pengaduan" value="pengaduan" class="peer hidden" checked />
                                <label for="pengaduan"
                                    class="flex items-center justify-center gap-2 py-3 px-4 rounded-xl cursor-pointer text-sm font-bold text-slate-400 peer-checked:bg-gradient-to-r peer-checked:from-blue-600 peer-checked:to-cyan-600 peer-checked:text-white peer-checked:shadow-lg peer-checked:shadow-blue-500/20 transition-smooth">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                    Pengaduan Masalah
                                </label>
                            </div>
                            <div>
                                <input type="radio" name="klasifikasi" id="laporan" value="laporan" class="peer hidden" />
                                <label for="laporan"
                                    class="flex items-center justify-center gap-2 py-3 px-4 rounded-xl cursor-pointer text-sm font-bold text-slate-400 peer-checked:bg-gradient-to-r peer-checked:from-blue-600 peer-checked:to-cyan-600 peer-checked:text-white peer-checked:shadow-lg peer-checked:shadow-blue-500/20 transition-smooth">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Laporan / Informasi
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Judul Laporan -->
                    <div>
                        <label for="judul" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Judul Laporan / Pengaduan *</label>
                        <input type="text" name="judul" id="judul" required value="{{ old('judul') }}"
                            placeholder="Tuliskan judul laporan yang jelas dan ringkas..."
                            class="w-full px-4 py-3.5 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-sm text-white placeholder-slate-500 focus:ring-4 focus:ring-blue-500/15 transition-smooth">
                    </div>

                    <!-- 3. Deskripsi Lengkap -->
                    <div>
                        <label for="desc" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Isi Laporan / Deskripsi Kejadian *</label>
                        <textarea id="desc" name="desc" rows="5" required
                            placeholder="Ceritakan kronologi, rincian peristiwa, atau detail keluhan secara komprehensif..."
                            class="w-full px-4 py-3.5 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-sm text-white placeholder-slate-500 focus:ring-4 focus:ring-blue-500/15 transition-smooth">{{ old('desc') }}</textarea>
                    </div>

                    <!-- 4. Kategori & Instansi Tujuan -->
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="kategori_id" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Kategori Laporan *</label>
                            <select id="kategori_id" name="kategori_id" required
                                class="w-full px-4 py-3.5 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-sm text-white focus:ring-4 focus:ring-blue-500/15 transition-smooth">
                                <option value="" disabled selected>Pilih Kategori Masalah</option>
                                @foreach ($kategoris as $k)
                                <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kategori }} (Tingkat: {{ ucfirst($k->level) }})
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="instansi_id" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Ditujukan Kepada Instansi/Unit *</label>
                            <select id="instansi_id" name="instansi_id" required
                                class="w-full px-4 py-3.5 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-sm text-white focus:ring-4 focus:ring-blue-500/15 transition-smooth">
                                <option value="" disabled selected>Pilih Unit / Instansi Tujuan</option>
                                @foreach ($instansis as $i)
                                <option value="{{ $i->id }}" {{ old('instansi_id') == $i->id ? 'selected' : '' }}>
                                    {{ $i->nama }} @if($i->pemimpin) (Pimpinan: {{ $i->pemimpin }}) @endif
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- 5. Lokasi & Tanggal Kejadian -->
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="lokasi" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Lokasi Kejadian</label>
                            <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}"
                                placeholder="Cth: Ruang Lab Komputer 2, Gedung B"
                                class="w-full px-4 py-3.5 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-sm text-white placeholder-slate-500 focus:ring-4 focus:ring-blue-500/15 transition-smooth">
                        </div>

                        <div>
                            <label for="date" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Tanggal Kejadian *</label>
                            <input type="date" name="date" id="date" required value="{{ old('date', date('Y-m-d')) }}"
                                class="w-full px-4 py-3.5 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-sm text-white focus:ring-4 focus:ring-blue-500/15 transition-smooth">
                        </div>
                    </div>

                    <!-- 6. Informasi Pelapor Opsional -->
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="nama_pelapor" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Nama Pelapor (Opsional)</label>
                            <input type="text" name="nama_pelapor" id="nama_pelapor" value="{{ old('nama_pelapor') }}"
                                placeholder="Nama Anda (Bisa dikosongkan)"
                                class="w-full px-4 py-3.5 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-sm text-white placeholder-slate-500 focus:ring-4 focus:ring-blue-500/15 transition-smooth">
                        </div>

                        <div>
                            <label for="email_pembuat" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Email Pemberitahuan (Opsional)</label>
                            <input type="email" name="email_pembuat" id="email_pembuat" value="{{ old('email_pembuat') }}"
                                placeholder="email@anda.com untuk notifikasi"
                                class="w-full px-4 py-3.5 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-sm text-white placeholder-slate-500 focus:ring-4 focus:ring-blue-500/15 transition-smooth">
                        </div>
                    </div>

                    <!-- 7. Lampiran File -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Lampiran Bukti (Foto/Dokumen)</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="lampiran" class="flex flex-col items-center justify-center w-full h-36 border-2 border-dashed border-slate-800 hover:border-blue-500 rounded-2xl cursor-pointer bg-slate-950/40 hover:bg-slate-900/60 transition-smooth group">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-2 text-slate-500 group-hover:text-blue-400 transition-smooth" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="text-xs text-slate-400"><span class="font-bold text-slate-200">Klik untuk upload</span> atau seret file ke sini</p>
                                    <p class="text-[11px] text-slate-500 mt-1">PNG, JPG, PDF, DOC (Maks. 5MB)</p>
                                </div>
                                <input id="lampiran" name="lampiran" type="file" class="hidden" onchange="document.getElementById('file-chosen').innerText = this.files[0].name" />
                            </label>
                        </div>
                        <p id="file-chosen" class="text-xs text-blue-400 mt-2 font-medium"></p>
                    </div>

                    <!-- 8. Pengaturan Privasi & Submit -->
                    <div class="pt-4 border-t border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                        <div class="space-y-2">
                            <div class="flex items-center gap-3">
                                <input id="status_pengirim" type="checkbox" name="status_pengirim" value="anonim"
                                    class="w-4 h-4 text-blue-600 bg-slate-900 border-slate-700 rounded focus:ring-blue-500 focus:ring-2">
                                <label for="status_pengirim" class="text-xs font-semibold text-slate-300">
                                    Kirim sebagai <span class="text-white">Anonim</span> (Nama tidak ditampilkan ke publik)
                                </label>
                            </div>
                            <div class="flex items-center gap-3">
                                <input id="status_rahasia" type="checkbox" name="status" value="rahasia"
                                    class="w-4 h-4 text-blue-600 bg-slate-900 border-slate-700 rounded focus:ring-blue-500 focus:ring-2">
                                <label for="status_rahasia" class="text-xs font-semibold text-slate-300">
                                    Laporan bersifat <span class="text-white">Rahasia / Privat</span> (Hanya dapat dilihat oleh admin)
                                </label>
                            </div>
                        </div>

                        <button type="submit"
                            class="px-8 py-4 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-extrabold text-sm sm:text-base rounded-2xl shadow-xl shadow-blue-500/25 transition-smooth hover:scale-[1.02] flex items-center justify-center gap-2 flex-shrink-0">
                            <span>Kirim Laporan Sekarang</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Public Reports Feed (Transparansi Pelaporan) -->
        <section id="laporan-publik" class="py-16 bg-slate-950/60 border-t border-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-xs font-semibold mb-2">
                            Transparansi Publik
                        </div>
                        <h2 class="text-3xl font-extrabold text-white tracking-tight">Daftar Laporan Publik Terbaru</h2>
                        <p class="text-sm text-slate-400 mt-1">Laporan yang telah dipublikasikan secara transparan beserta status tindak lanjutnya.</p>
                    </div>
                </div>

                @if($publicLaporans->count() === 0)
                <div class="p-12 text-center bg-slate-900/40 rounded-3xl border border-slate-800/80">
                    <p class="text-slate-400 text-sm">Belum ada laporan publik yang tercatat.</p>
                </div>
                @else
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($publicLaporans as $item)
                    <div class="glass-card rounded-2xl p-6 border border-slate-800/80 hover:border-slate-700 transition-smooth flex flex-col justify-between group">
                        <div>
                            <!-- Header: Badges -->
                            <div class="flex items-center justify-between gap-2 mb-4">
                                <span class="text-[11px] font-bold px-2.5 py-1 rounded-lg {{ $item->kategori?->level_badge_class ?? 'bg-slate-800 text-slate-300' }}">
                                    {{ $item->kategori?->nama_kategori ?? 'Umum' }}
                                </span>
                                
                                @php $badge = $item->status_laporan_badge; @endphp
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold {{ $badge['class'] }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $badge['dot'] }}"></span>
                                    {{ $badge['label'] }}
                                </span>
                            </div>

                            <!-- Title -->
                            <h3 class="text-lg font-bold text-white group-hover:text-blue-400 transition-smooth line-clamp-2 mb-2">
                                {{ $item->judul }}
                            </h3>

                            <!-- Desc -->
                            <p class="text-xs text-slate-400 line-clamp-3 leading-relaxed mb-4">
                                {{ $item->desc }}
                            </p>
                        </div>

                        <!-- Footer Info -->
                        <div class="pt-4 border-t border-slate-800/80 flex items-center justify-between text-xs text-slate-400">
                            <div>
                                <span class="font-mono text-blue-400 font-semibold">{{ $item->id_lacak }}</span>
                                <span class="mx-1.5">•</span>
                                <span>{{ $item->date?->format('d M Y') ?? date('d M Y') }}</span>
                            </div>
                            <a href="{{ route('laporan.track', ['id_lacak' => $item->id_lacak]) }}" class="text-blue-400 hover:text-blue-300 font-semibold inline-flex items-center gap-1">
                                Lacak
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $publicLaporans->links() }}
                </div>
                @endif
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-950 border-t border-slate-800 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 rounded-lg gradient-brand flex items-center justify-center text-white font-black text-xs">SR</div>
                <span class="text-slate-400 font-semibold">Sirespon</span> — Sistem Informasi Respon Cepat
            </div>
            <p>© {{ date('Y') }} All rights reserved. Dibangun untuk pelayanan yang lebih transparan dan tanggap.</p>
        </div>
    </footer>

    <!-- Tracking Success Modal Popup -->
    @if(session('id_lacak'))
    <div id="successModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-md animate-fade-in">
        <div class="glass-card rounded-3xl p-6 sm:p-8 max-w-md w-full border border-slate-700 text-center shadow-2xl animate-slide-up">
            <div class="w-16 h-16 rounded-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h3 class="text-xl sm:text-2xl font-extrabold text-white mb-2">Laporan Berhasil Terkirim!</h3>
            <p class="text-xs sm:text-sm text-slate-300 mb-6 leading-relaxed">
                Simpan kode pelacakan unik di bawah ini untuk memantau perkembangan dan tindak lanjut laporan Anda kapan saja.
            </p>

            <div class="p-4 bg-slate-950 rounded-2xl border border-slate-800 flex items-center justify-between mb-6">
                <span id="trackingCode" class="font-mono text-lg sm:text-xl font-black text-blue-400 tracking-wider">
                    {{ session('id_lacak') }}
                </span>
                <button onclick="copyTrackingCode()" type="button" class="px-3 py-1.5 bg-slate-800 hover:bg-slate-700 text-white rounded-xl text-xs font-semibold transition-smooth flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                    <span id="copyBtnText">Salin</span>
                </button>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('laporan.track', ['id_lacak' => session('id_lacak')]) }}" class="flex-1 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white text-xs sm:text-sm font-bold rounded-xl shadow-lg shadow-blue-500/25 transition-smooth">
                    Lacak Status Laporan
                </a>
                <button onclick="document.getElementById('successModal').remove()" type="button" class="px-4 py-3 bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white text-xs sm:text-sm font-semibold rounded-xl transition-smooth">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <script>
        function copyTrackingCode() {
            const code = document.getElementById('trackingCode').innerText.trim();
            navigator.clipboard.writeText(code).then(() => {
                document.getElementById('copyBtnText').innerText = 'Tersalin!';
                setTimeout(() => {
                    document.getElementById('copyBtnText').innerText = 'Salin';
                }, 2500);
            });
        }
    </script>
    @endif
</body>

</html>