<x-app-layout>
    <div class="space-y-8">
        <!-- Page Title -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Dashboard Ringkasan</h1>
                <p class="text-xs sm:text-sm text-slate-400 mt-1">Pantau statistik pelaporan dan pengaduan terkini secara real-time.</p>
            </div>
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-slate-900 border border-slate-800 text-xs font-semibold text-slate-300">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    Sistem Aktif
                </span>
            </div>
        </div>

        <!-- Metric Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            <!-- 1. Menunggu -->
            <div class="glass-card rounded-2xl p-5 border border-slate-800 relative overflow-hidden">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Menunggu Respon</span>
                    <div class="w-8 h-8 rounded-xl bg-amber-500/10 text-amber-400 border border-amber-500/20 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-2xl sm:text-3xl font-black text-amber-400">{{ $stats['menunggu'] ?? 0 }}</p>
                <p class="text-[11px] text-slate-400 mt-1">Butuh verifikasi awal</p>
            </div>

            <!-- 2. Diproses -->
            <div class="glass-card rounded-2xl p-5 border border-slate-800 relative overflow-hidden">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Sedang Diproses</span>
                    <div class="w-8 h-8 rounded-xl bg-blue-500/10 text-blue-400 border border-blue-500/20 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-2xl sm:text-3xl font-black text-blue-400">{{ $stats['proses'] ?? 0 }}</p>
                <p class="text-[11px] text-slate-400 mt-1">Dalam tindak lanjut unit</p>
            </div>

            <!-- 3. Selesai -->
            <div class="glass-card rounded-2xl p-5 border border-slate-800 relative overflow-hidden">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Laporan Selesai</span>
                    <div class="w-8 h-8 rounded-xl bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                </div>
                <p class="text-2xl sm:text-3xl font-black text-emerald-400">{{ $stats['selesai'] ?? 0 }}</p>
                <p class="text-[11px] text-slate-400 mt-1">Penanganan tuntas</p>
            </div>

            <!-- 4. Total Masuk -->
            <div class="glass-card rounded-2xl p-5 border border-slate-800 relative overflow-hidden">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Masuk</span>
                    <div class="w-8 h-8 rounded-xl bg-purple-500/10 text-purple-400 border border-purple-500/20 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-2xl sm:text-3xl font-black text-white">{{ ($stats['total_laporan'] ?? 0) + ($stats['total_pengaduan'] ?? 0) }}</p>
                <p class="text-[11px] text-slate-400 mt-1">{{ $stats['total_laporan'] ?? 0 }} Laporan / {{ $stats['total_pengaduan'] ?? 0 }} Pengaduan</p>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Reports Table (2 cols) -->
            <div class="lg:col-span-2 glass-card rounded-3xl p-6 sm:p-7 border border-slate-800 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-lg font-bold text-white">Laporan & Pengaduan Terbaru</h2>
                            <p class="text-xs text-slate-400">Aktivitas pelaporan yang baru masuk ke sistem</p>
                        </div>
                        <a href="{{ route('admin.laporan.index') }}" class="text-xs font-semibold text-blue-400 hover:text-blue-300 transition-smooth">
                            Lihat Semua →
                        </a>
                    </div>

                    <div class="overflow-x-auto rounded-2xl border border-slate-800">
                        <table class="w-full text-left text-xs text-slate-300">
                            <thead class="bg-slate-950/80 text-slate-400 uppercase font-bold text-[10px] tracking-wider border-b border-slate-800">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Kode / Judul</th>
                                    <th scope="col" class="px-4 py-3">Kategori</th>
                                    <th scope="col" class="px-4 py-3">Tujuan</th>
                                    <th scope="col" class="px-4 py-3">Status</th>
                                    <th scope="col" class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800/80">
                                @if(!isset($recentLaporan) || count($recentLaporan) === 0)
                                <tr>
                                    <td colspan="5" class="px-4 py-8 text-center text-slate-400">
                                        Belum ada aktivitas pelaporan.
                                    </td>
                                </tr>
                                @else
                                @foreach($recentLaporan as $item)
                                <tr class="hover:bg-slate-800/40 transition-smooth">
                                    <td class="px-4 py-3.5">
                                        <div class="font-mono text-[11px] text-blue-400 font-bold">{{ $item->id_lacak }}</div>
                                        <div class="font-semibold text-white truncate max-w-xs">{{ $item->judul }}</div>
                                    </td>
                                    <td class="px-4 py-3.5">
                                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-md {{ $item->kategori?->level_badge_class ?? 'bg-slate-800 text-slate-300' }}">
                                            {{ $item->kategori?->nama_kategori ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3.5 text-slate-300 truncate max-w-[120px]">
                                        {{ $item->instansi?->nama ?? '-' }}
                                    </td>
                                    <td class="px-4 py-3.5">
                                        @php $badge = $item->status_laporan_badge; @endphp
                                        <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full text-[10px] font-semibold {{ $badge['class'] }}">
                                            <span class="w-1.5 h-1.5 rounded-full {{ $badge['dot'] }}"></span>
                                            {{ $badge['label'] }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3.5 text-right">
                                        <a href="{{ $item->klasifikasi === 'pengaduan' ? route('admin.pengaduan.detail', $item->id) : route('admin.laporan.detail', $item->id) }}"
                                            class="px-2.5 py-1 bg-slate-800 hover:bg-blue-600 hover:text-white text-slate-300 rounded-lg text-xs font-semibold transition-smooth inline-block">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Instansi List Card (1 col) -->
            <div class="glass-card rounded-3xl p-6 sm:p-7 border border-slate-800 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-lg font-bold text-white">Instansi / Unit</h2>
                            <p class="text-xs text-slate-400">Daftar unit tujuan laporan</p>
                        </div>
                        <a href="{{ route('admin.instansi.index') }}" class="text-xs font-semibold text-blue-400 hover:text-blue-300 transition-smooth">
                            Kelola →
                        </a>
                    </div>

                    <div class="space-y-3">
                        @if(!isset($recentInstansi) || count($recentInstansi) === 0)
                        <p class="text-xs text-slate-400 text-center py-6">Belum ada data instansi.</p>
                        @else
                        @foreach($recentInstansi as $inst)
                        <div class="p-3.5 rounded-2xl bg-slate-950/60 border border-slate-800/80 flex items-center justify-between">
                            <div class="flex-1 min-w-0 me-3">
                                <p class="text-xs font-bold text-white truncate">{{ $inst->nama }}</p>
                                <p class="text-[11px] text-slate-400 truncate">{{ $inst->pemimpin ?? 'Pimpinan belum diatur' }}</p>
                            </div>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/10 text-blue-400 border border-blue-500/20">
                                {{ $inst->laporans_count }} Laporan
                            </span>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-slate-800">
                    <a href="{{ route('admin.instansi.index') }}" class="w-full py-2.5 bg-slate-800/80 hover:bg-slate-700/80 text-white rounded-xl text-xs font-bold transition-smooth flex items-center justify-center gap-2">
                        <span>+ Tambah Instansi Baru</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>