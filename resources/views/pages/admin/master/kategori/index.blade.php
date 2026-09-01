<x-app-layout>
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Master Kategori Laporan</h1>
                <p class="text-xs sm:text-sm text-slate-400 mt-1">Kelola kategori pelaporan beserta tingkatan urgensi / level.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
            <!-- Form Tambah Kategori (2 cols) -->
            <div class="lg:col-span-2 glass-card rounded-3xl p-6 sm:p-7 border border-slate-800 shadow-2xl h-fit">
                <h2 class="text-lg font-bold text-white mb-1">Tambah Kategori Baru</h2>
                <p class="text-xs text-slate-400 mb-6">Klasifikasikan jenis masalah dengan level urgensi yang tepat.</p>

                <form action="{{ route('admin.kategori.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="nama_kategori" class="block text-xs font-bold text-slate-300 mb-1">Nama Kategori *</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" required placeholder="Cth: Kerusakan AC & Listrik"
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-xs sm:text-sm text-white placeholder-slate-500 focus:ring-4 focus:ring-blue-500/15 transition-smooth">
                    </div>

                    <div>
                        <label for="level" class="block text-xs font-bold text-slate-300 mb-1">Tingkat Urgensi (Level) *</label>
                        <select id="level" name="level" required
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-xs sm:text-sm text-white focus:ring-4 focus:ring-blue-500/15 transition-smooth">
                            <option value="ringan">🟢 Ringan (Keluhan umum)</option>
                            <option value="normal" selected>🔵 Normal (Perlu perbaikan rutin)</option>
                            <option value="berat">🟡 Berat (Mengganggu aktivitas)</option>
                            <option value="gawat">🔴 Gawat (Keadaan darurat/bahaya)</option>
                        </select>
                    </div>

                    <div>
                        <label for="desc" class="block text-xs font-bold text-slate-300 mb-1">Keterangan / Deskripsi</label>
                        <textarea id="desc" name="desc" rows="3" placeholder="Penjelasan singkat ruang lingkup kategori..."
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-xs text-white placeholder-slate-500 focus:ring-4 focus:ring-blue-500/15 transition-smooth"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs sm:text-sm rounded-xl shadow-lg shadow-blue-600/20 transition-smooth">
                        + Simpan Kategori
                    </button>
                </form>
            </div>

            <!-- Daftar Kategori (3 cols) -->
            <div class="lg:col-span-3 glass-card rounded-3xl p-6 sm:p-7 border border-slate-800 shadow-2xl">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-lg font-bold text-white">Daftar Kategori</h2>
                        <p class="text-xs text-slate-400">Total: {{ count($kategori) }} kategori aktif</p>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-2xl border border-slate-800">
                    <table class="w-full text-left text-xs text-slate-300">
                        <thead class="bg-slate-950/80 text-slate-400 uppercase font-bold text-[10px] tracking-wider border-b border-slate-800">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nama Kategori</th>
                                <th scope="col" class="px-4 py-3">Level</th>
                                <th scope="col" class="px-4 py-3">Jumlah Laporan</th>
                                <th scope="col" class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/80">
                            @if (!isset($kategori) || count($kategori) === 0)
                            <tr>
                                <td colspan="4" class="px-4 py-8 text-center text-slate-400">
                                    Belum ada data kategori yang ditambahkan.
                                </td>
                            </tr>
                            @else
                            @foreach ($kategori as $data)
                            <tr class="hover:bg-slate-800/40 transition-smooth">
                                <td class="px-4 py-3.5">
                                    <div class="font-bold text-white">{{ $data->nama_kategori }}</div>
                                    <div class="text-[11px] text-slate-400 truncate max-w-xs">{{ $data->desc ?? 'Tidak ada deskripsi' }}</div>
                                </td>
                                <td class="px-4 py-3.5">
                                    <span class="text-[10px] font-bold px-2.5 py-1 rounded-md {{ $data->level_badge_class }}">
                                        {{ ucfirst($data->level) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3.5">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/10 text-blue-400 border border-blue-500/20">
                                        {{ $data->laporans_count ?? 0 }} Laporan
                                    </span>
                                </td>
                                <td class="px-4 py-3.5 text-right">
                                    <form action="{{ route('admin.kategori.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1 text-rose-400 hover:text-rose-300 hover:bg-rose-950/40 rounded-lg text-xs font-semibold transition-smooth">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>