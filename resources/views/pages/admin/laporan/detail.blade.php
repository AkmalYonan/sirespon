<x-app-layout>
    <div class="space-y-6">
        <!-- Breadcrumb / Back Button -->
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.laporan.index') }}" class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-slate-400 hover:text-white transition-smooth">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Daftar Laporan
            </a>
            <span class="font-mono text-xs font-bold text-blue-400 px-3 py-1 bg-blue-500/10 border border-blue-500/20 rounded-lg">
                {{ $laporan->id_lacak }}
            </span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column: Report Details (2 cols) -->
            <div class="lg:col-span-2 space-y-6">
                <div class="glass-card rounded-3xl p-6 sm:p-8 border border-slate-800 shadow-2xl">
                    <!-- Badges Header -->
                    <div class="flex flex-wrap items-center gap-2 mb-4">
                        <span class="text-xs font-bold uppercase tracking-wider px-2.5 py-1 rounded-lg {{ $laporan->kategori?->level_badge_class ?? 'bg-slate-800 text-slate-300' }}">
                            {{ $laporan->kategori?->nama_kategori ?? 'Umum' }} (Tingkat: {{ ucfirst($laporan->kategori?->level ?? 'normal') }})
                        </span>
                        @if($laporan->status_pengirim === 'anonim')
                        <span class="text-xs font-bold px-2.5 py-1 rounded-lg bg-purple-500/10 text-purple-400 border border-purple-500/20">
                            Pengirim Anonim
                        </span>
                        @endif
                        @if($laporan->status === 'rahasia')
                        <span class="text-xs font-bold px-2.5 py-1 rounded-lg bg-rose-500/10 text-rose-400 border border-rose-500/20">
                            Rahasia / Privat
                        </span>
                        @endif
                    </div>

                    <!-- Title -->
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white mb-4 leading-snug">{{ $laporan->judul }}</h1>

                    <!-- Key Metadata Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 p-4 rounded-2xl bg-slate-950/60 border border-slate-800/80 mb-6 text-xs">
                        <div>
                            <span class="text-slate-400 block mb-1">Ditujukan Kepada</span>
                            <span class="font-bold text-white">{{ $laporan->instansi?->nama ?? '-' }}</span>
                        </div>
                        <div>
                            <span class="text-slate-400 block mb-1">Tanggal Kejadian</span>
                            <span class="font-bold text-white">{{ $laporan->date?->format('d F Y') ?? '-' }}</span>
                        </div>
                        <div>
                            <span class="text-slate-400 block mb-1">Pelapor</span>
                            <span class="font-bold text-white">{{ $laporan->status_pengirim === 'anonim' ? 'Anonim' : ($laporan->nama_pelapor ?? 'Tidak Disebutkan') }}</span>
                        </div>
                        <div>
                            <span class="text-slate-400 block mb-1">Email Pelapor</span>
                            <span class="font-bold text-white truncate block">{{ $laporan->email_pembuat ?? '-' }}</span>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Isi Kronologi / Keluhan</h3>
                        <div class="p-5 rounded-2xl bg-slate-950/40 border border-slate-800/80 text-sm text-slate-200 leading-relaxed whitespace-pre-line">
                            {{ $laporan->desc }}
                        </div>
                    </div>

                    @if($laporan->lokasi)
                    <div class="mb-6">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Lokasi Kejadian</h3>
                        <p class="text-sm text-slate-300 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            {{ $laporan->lokasi }}
                        </p>
                    </div>
                    @endif

                    @if($laporan->lampiran)
                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Berkas Lampiran Bukti</h3>
                        <a href="{{ asset('storage/' . $laporan->lampiran) }}" target="_blank"
                            class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-900 hover:bg-slate-800 border border-slate-700 rounded-xl text-xs font-bold text-blue-400 transition-smooth">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                            </svg>
                            Lihat & Unduh Berkas Lampiran
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Responses / Comments Thread -->
                <div class="glass-card rounded-3xl p-6 sm:p-8 border border-slate-800 shadow-2xl">
                    <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                        </svg>
                        Riwayat Tindak Lanjut & Tanggapan Petugas
                    </h3>

                    <!-- Post New Comment Form -->
                    <form action="{{ route('admin.laporan.comment', $laporan->id) }}" method="POST" enctype="multipart/form-data" class="mb-8 p-4 rounded-2xl bg-slate-950/80 border border-slate-800">
                        @csrf
                        <label for="desc" class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Tambah Tanggapan / Balasan Baru</label>
                        <textarea id="desc" name="desc" rows="3" required placeholder="Tuliskan catatan tindak lanjut atau balasan untuk pelapor..."
                            class="w-full px-4 py-3 bg-slate-900 border border-slate-800 focus:border-blue-500 rounded-xl text-xs sm:text-sm text-white placeholder-slate-500 focus:ring-4 focus:ring-blue-500/15 transition-smooth mb-3"></textarea>
                        
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <input type="file" name="lampiran" class="text-xs text-slate-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-800 file:text-slate-300 hover:file:bg-slate-700 cursor-pointer">
                            <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs rounded-xl shadow-lg shadow-blue-600/20 transition-smooth">
                                Kirim Tanggapan
                            </button>
                        </div>
                    </form>

                    <!-- Comments List -->
                    <div class="space-y-4">
                        @if($laporan->comments->count() === 0)
                        <p class="text-xs text-slate-400 text-center py-4">Belum ada riwayat tanggapan.</p>
                        @else
                        @foreach($laporan->comments as $comment)
                        <div class="p-4 rounded-2xl bg-slate-950/60 border border-slate-800/80 text-xs sm:text-sm">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-lg bg-gradient-to-tr from-blue-600 to-cyan-500 text-white flex items-center justify-center font-bold text-[10px]">
                                        {{ substr($comment->author_name ?? 'A', 0, 1) }}
                                    </div>
                                    <span class="font-bold text-white">{{ $comment->author_name ?? 'Admin / Petugas' }}</span>
                                </div>
                                <span class="text-slate-500 text-xs">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-slate-300 leading-relaxed pl-8 whitespace-pre-line">{{ $comment->desc }}</p>
                            @if($comment->lampiran)
                            <div class="pl-8 mt-2">
                                <a href="{{ asset('storage/' . $comment->lampiran) }}" target="_blank" class="text-blue-400 hover:underline text-xs inline-flex items-center gap-1">
                                    📎 Berkas lampiran
                                </a>
                            </div>
                            @endif
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column: Status Controls & Summary (1 col) -->
            <div class="space-y-6">
                <!-- Status Control Card -->
                <div class="glass-card rounded-3xl p-6 border border-slate-800 shadow-2xl">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-slate-400 mb-4">Ubah Status Laporan</h3>
                    
                    <div class="p-4 rounded-2xl bg-slate-950/60 border border-slate-800/80 mb-6 text-center">
                        <span class="text-xs text-slate-400 block mb-1">Status Saat Ini</span>
                        @php $badge = $laporan->status_laporan_badge; @endphp
                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-bold {{ $badge['class'] }}">
                            <span class="w-2 h-2 rounded-full {{ $badge['dot'] }}"></span>
                            {{ $badge['label'] }}
                        </span>
                    </div>

                    <form action="{{ route('admin.laporan.update_status', $laporan->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label for="status_laporan" class="block text-xs font-bold text-slate-300 mb-1">Pilih Status Baru</label>
                            <select id="status_laporan" name="status_laporan" required
                                class="w-full px-3.5 py-2.5 bg-slate-950/90 border border-slate-800 focus:border-blue-500 rounded-xl text-xs sm:text-sm text-white focus:ring-4 focus:ring-blue-500/15 transition-smooth">
                                <option value="menunggu" {{ $laporan->status_laporan === 'menunggu' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                                <option value="proses" {{ $laporan->status_laporan === 'proses' ? 'selected' : '' }}>Sedang Diproses</option>
                                <option value="selesai" {{ $laporan->status_laporan === 'selesai' ? 'selected' : '' }}>Selesai / Tuntas</option>
                                <option value="ditolak" {{ $laporan->status_laporan === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>

                        <div>
                            <label for="catatan" class="block text-xs font-bold text-slate-300 mb-1">Catatan Perubahan (Opsional)</label>
                            <textarea id="catatan" name="catatan" rows="2" placeholder="Alasan atau catatan saat mengubah status..."
                                class="w-full px-3.5 py-2.5 bg-slate-950/90 border border-slate-800 focus:border-blue-500 rounded-xl text-xs text-white placeholder-slate-500 focus:ring-4 focus:ring-blue-500/15 transition-smooth"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full py-3 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-bold text-xs sm:text-sm rounded-xl shadow-lg shadow-blue-600/20 transition-smooth">
                            Perbarui Status Laporan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>