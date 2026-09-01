<x-app-layout>
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Master Data Instansi / Unit</h1>
                <p class="text-xs sm:text-sm text-slate-400 mt-1">Kelola unit kerja atau instansi tujuan pelaporan di lingkungan institusi.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
            <!-- Form Tambah Instansi (2 cols) -->
            <div class="lg:col-span-2 glass-card rounded-3xl p-6 sm:p-7 border border-slate-800 shadow-2xl h-fit">
                <h2 class="text-lg font-bold text-white mb-1">Tambah Instansi Baru</h2>
                <p class="text-xs text-slate-400 mb-6">Tambahkan unit baru agar muncul di pilihan formulir pelaporan publik.</p>

                <form action="{{ route('admin.instansi.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="nama" class="block text-xs font-bold text-slate-300 mb-1">Nama Instansi / Unit *</label>
                        <input type="text" name="nama" id="nama" required placeholder="Cth: Sarana dan Prasarana"
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-xs sm:text-sm text-white placeholder-slate-500 focus:ring-4 focus:ring-blue-500/15 transition-smooth">
                    </div>

                    <div>
                        <label for="pemimpin" class="block text-xs font-bold text-slate-300 mb-1">Penanggung Jawab / Pimpinan</label>
                        <input type="text" name="pemimpin" id="pemimpin" placeholder="Nama pejabat/pimpinan unit"
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-xs sm:text-sm text-white placeholder-slate-500 focus:ring-4 focus:ring-blue-500/15 transition-smooth">
                    </div>

                    <div>
                        <label for="kategori" class="block text-xs font-bold text-slate-300 mb-1">Kelompok Unit</label>
                        <select name="kategori" id="kategori"
                            class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 focus:border-blue-500 rounded-xl text-xs sm:text-sm text-white focus:ring-4 focus:ring-blue-500/15 transition-smooth">
                            <option value="staff">Staff / Administrasi</option>
                            <option value="guru">Dewan Guru / Akademik</option>
                            <option value="kelas">Unit Kelas / Siswa</option>
                            <option value="lainnya">Unit Lainnya</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="w-full py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs sm:text-sm rounded-xl shadow-lg shadow-blue-600/20 transition-smooth">
                        + Simpan Instansi
                    </button>
                </form>
            </div>

            <!-- Daftar Instansi (3 cols) -->
            <div class="lg:col-span-3 glass-card rounded-3xl p-6 sm:p-7 border border-slate-800 shadow-2xl">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-lg font-bold text-white">Daftar Instansi Terdaftar</h2>
                        <p class="text-xs text-slate-400">Total: {{ count($instansi) }} unit aktif</p>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-2xl border border-slate-800">
                    <table class="w-full text-left text-xs text-slate-300">
                        <thead class="bg-slate-950/80 text-slate-400 uppercase font-bold text-[10px] tracking-wider border-b border-slate-800">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nama Instansi</th>
                                <th scope="col" class="px-4 py-3">Pimpinan</th>
                                <th scope="col" class="px-4 py-3">Jumlah Laporan</th>
                                <th scope="col" class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/80">
                            @if (!isset($instansi) || count($instansi) === 0)
                            <tr>
                                <td colspan="4" class="px-4 py-8 text-center text-slate-400">
                                    Belum ada data instansi yang ditambahkan.
                                </td>
                            </tr>
                            @else
                            @foreach ($instansi as $data)
                            <tr class="hover:bg-slate-800/40 transition-smooth">
                                <td class="px-4 py-3.5 font-bold text-white">
                                    {{ $data->nama }}
                                </td>
                                <td class="px-4 py-3.5 text-slate-400">
                                    {{ $data->pemimpin ?? '-' }}
                                </td>
                                <td class="px-4 py-3.5">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/10 text-blue-400 border border-blue-500/20">
                                        {{ $data->laporans_count ?? 0 }} Laporan
                                    </span>
                                </td>
                                <td class="px-4 py-3.5 text-right">
                                    <form action="{{ route('admin.instansi.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data instansi ini?');" class="inline-block">
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