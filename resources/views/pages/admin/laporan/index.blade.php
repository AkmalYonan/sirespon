<x-app-layout>
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Manajemen Laporan</h1>
                <p class="text-xs sm:text-sm text-slate-400 mt-1">Daftar seluruh laporan informasi dan pengaduan sarana yang masuk.</p>
            </div>
        </div>

        <!-- Filter & Search Bar -->
        <div class="glass-card rounded-2xl p-4 border border-slate-800">
            <form action="{{ route('admin.laporan.index') }}" method="GET" class="grid sm:grid-cols-4 gap-3">
                <!-- Search Input -->
                <div class="sm:col-span-2">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari berdasarkan kode lacak, judul, atau kata kunci..."
                        class="w-full px-4 py-2.5 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-xs sm:text-sm text-white placeholder-slate-500 focus:ring-4 focus:ring-blue-500/15 transition-smooth">
                </div>

                <!-- Status Filter -->
                <div>
                    <select name="status" class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-xs sm:text-sm text-white focus:ring-4 focus:ring-blue-500/15 transition-smooth">
                        <option value="">Semua Status</option>
                        <option value="menunggu" {{ request('status') === 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="proses" {{ request('status') === 'proses' ? 'selected' : '' }}>Diproses</option>
                        <option value="selesai" {{ request('status') === 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="ditolak" {{ request('status') === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <!-- Action Button -->
                <div class="flex gap-2">
                    <button type="submit" class="flex-1 py-2.5 bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs sm:text-sm rounded-xl transition-smooth shadow-lg shadow-blue-600/20">
                        Filter
                    </button>
                    @if(request()->hasAny(['search', 'status', 'kategori_id']))
                    <a href="{{ route('admin.laporan.index') }}" class="px-3.5 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-xl text-xs font-semibold flex items-center justify-center transition-smooth">
                        Reset
                    </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Table Card -->
        <div class="glass-card rounded-3xl p-6 border border-slate-800 shadow-2xl">
            <div class="overflow-x-auto rounded-2xl border border-slate-800">
                <table class="w-full text-left text-xs text-slate-300">
                    <thead class="bg-slate-950/80 text-slate-400 uppercase font-bold text-[10px] tracking-wider border-b border-slate-800">
                        <tr>
                            <th scope="col" class="px-5 py-4">Kode Lacak</th>
                            <th scope="col" class="px-5 py-4">Judul Laporan</th>
                            <th scope="col" class="px-5 py-4">Kategori & Level</th>
                            <th scope="col" class="px-5 py-4">Tujuan Unit</th>
                            <th scope="col" class="px-5 py-4">Tanggal</th>
                            <th scope="col" class="px-5 py-4">Status</th>
                            <th scope="col" class="px-5 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/80">
                        @if($laporans->count() === 0)
                        <tr>
                            <td colspan="7" class="px-5 py-12 text-center text-slate-400">
                                <svg class="w-10 h-10 mx-auto mb-3 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <p class="text-sm font-semibold">Tidak ada data laporan ditemukan.</p>
                            </td>
                        </tr>
                        @else
                        @foreach($laporans as $item)
                        <tr class="hover:bg-slate-800/40 transition-smooth">
                            <td class="px-5 py-4 font-mono font-bold text-blue-400">
                                {{ $item->id_lacak }}
                            </td>
                            <td class="px-5 py-4 font-medium text-white max-w-xs">
                                <div class="font-bold truncate">{{ $item->judul }}</div>
                                <div class="text-[11px] text-slate-400 truncate">{{ Str::limit($item->desc, 60) }}</div>
                            </td>
                            <td class="px-5 py-4">
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-md {{ $item->kategori?->level_badge_class ?? 'bg-slate-800 text-slate-300' }}">
                                    {{ $item->kategori?->nama_kategori ?? '-' }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-slate-200">
                                {{ $item->instansi?->nama ?? '-' }}
                            </td>
                            <td class="px-5 py-4 text-slate-400">
                                {{ $item->date?->format('d/m/Y') ?? '-' }}
                            </td>
                            <td class="px-5 py-4">
                                @php $badge = $item->status_laporan_badge; @endphp
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-semibold {{ $badge['class'] }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $badge['dot'] }}"></span>
                                    {{ $badge['label'] }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <a href="{{ route('admin.laporan.detail', $item->id) }}"
                                    class="px-3 py-1.5 bg-blue-600 hover:bg-blue-500 text-white rounded-xl text-xs font-semibold transition-smooth inline-block shadow-md shadow-blue-600/20">
                                    Detail & Respon
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $laporans->links() }}
            </div>
        </div>
    </div>
</x-app-layout>