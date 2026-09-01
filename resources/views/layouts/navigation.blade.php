@php
    $pendingLaporanCount = \App\Models\Laporan::where('klasifikasi', 'laporan')->where('status_laporan', 'menunggu')->count();
    $pendingPengaduanCount = \App\Models\Laporan::where('klasifikasi', 'pengaduan')->where('status_laporan', 'menunggu')->count();
@endphp

<!-- Top Navbar -->
<nav class="fixed top-0 z-50 w-full bg-slate-900/80 backdrop-blur-xl border-b border-slate-800">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-slate-400 rounded-xl sm:hidden hover:bg-slate-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-slate-700">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ route('dashboard') }}" class="flex ms-2 md:me-24 items-center gap-3">
                    <div class="w-9 h-9 rounded-xl gradient-brand flex items-center justify-center shadow-lg shadow-blue-500/20 text-white font-black text-lg">
                        SR
                    </div>
                    <div class="flex flex-col">
                        <span class="text-lg font-bold tracking-tight text-white flex items-center gap-1.5">
                            Sirespon <span class="text-xs px-2 py-0.5 rounded-full bg-blue-500/10 text-blue-400 border border-blue-500/20 font-semibold">Admin</span>
                        </span>
                    </div>
                </a>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" target="_blank" class="hidden sm:inline-flex items-center gap-2 px-3.5 py-1.5 text-xs font-semibold text-slate-300 bg-slate-800/80 hover:bg-slate-700/80 hover:text-white rounded-xl border border-slate-700/80 transition-smooth">
                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    Lihat Portal Publik
                </a>

                <!-- User Dropdown Menu -->
                <div class="flex items-center ms-2">
                    <div>
                        <button type="button"
                            class="flex items-center gap-3 p-1.5 rounded-xl text-sm bg-slate-800/80 border border-slate-700/80 hover:border-slate-600 focus:ring-4 focus:ring-slate-800 transition-smooth"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <div class="w-7 h-7 rounded-lg bg-gradient-to-tr from-blue-600 to-cyan-500 flex items-center justify-center font-bold text-xs text-white uppercase">
                                {{ substr(Auth::user()->name ?? 'A', 0, 2) }}
                            </div>
                            <span class="hidden md:inline-block text-xs font-medium text-slate-200 me-1">{{ Auth::user()->name ?? 'Admin' }}</span>
                            <svg class="w-3.5 h-3.5 text-slate-400 me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-slate-800 divide-y divide-slate-700 rounded-2xl shadow-xl border border-slate-700/80 w-52"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm font-semibold text-white" role="none">
                                {{ Auth::user()->name ?? 'Administrator' }}
                            </p>
                            <p class="text-xs font-medium text-slate-400 truncate mt-0.5" role="none">
                                {{ Auth::user()->email ?? 'admin@sirespon.test' }}
                            </p>
                            <span class="inline-block mt-2 text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 bg-blue-500/20 text-blue-400 rounded-md border border-blue-500/30">
                                {{ Auth::user()->role ?? 'Admin' }}
                            </span>
                        </div>
                        <ul class="py-1.5" role="none">
                            <li>
                                <a href="{{ route('profile.edit') }}"
                                    class="flex items-center gap-2.5 px-4 py-2 text-xs text-slate-300 hover:bg-slate-700/60 hover:text-white transition-smooth"
                                    role="menuitem">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Edit Profil
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="flex w-full items-center gap-2.5 px-4 py-2 text-xs text-rose-400 hover:bg-rose-950/40 hover:text-rose-300 transition-smooth"
                                        role="menuitem">
                                        <svg class="w-4 h-4 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        Keluar (Logout)
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-16 transition-transform -translate-x-full bg-slate-900 border-r border-slate-800 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3.5 py-5 overflow-y-auto bg-slate-900 flex flex-col justify-between">
        <ul class="space-y-1.5 font-medium text-sm">
            <li class="px-3 pb-2 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                Menu Utama
            </li>

            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 p-2.5 rounded-xl transition-smooth {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white font-semibold shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Laporan -->
            <li>
                <a href="{{ route('admin.laporan.index') }}"
                    class="flex items-center justify-between p-2.5 rounded-xl transition-smooth {{ request()->routeIs('admin.laporan.*') ? 'bg-blue-600 text-white font-semibold shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span>Data Laporan</span>
                    </div>
                    @if($pendingLaporanCount > 0)
                    <span class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold text-amber-300 bg-amber-950/80 border border-amber-500/30 rounded-full">
                        {{ $pendingLaporanCount }}
                    </span>
                    @endif
                </a>
            </li>

            <!-- Pengaduan -->
            <li>
                <a href="{{ route('admin.pengaduan.index') }}"
                    class="flex items-center justify-between p-2.5 rounded-xl transition-smooth {{ request()->routeIs('admin.pengaduan.*') ? 'bg-blue-600 text-white font-semibold shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <span>Data Pengaduan</span>
                    </div>
                    @if($pendingPengaduanCount > 0)
                    <span class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold text-amber-300 bg-amber-950/80 border border-amber-500/30 rounded-full">
                        {{ $pendingPengaduanCount }}
                    </span>
                    @endif
                </a>
            </li>

            <li class="pt-4 px-3 pb-2 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                Master Data
            </li>

            <!-- Instansi -->
            <li>
                <a href="{{ route('admin.instansi.index') }}"
                    class="flex items-center gap-3 p-2.5 rounded-xl transition-smooth {{ request()->routeIs('admin.instansi.*') ? 'bg-blue-600 text-white font-semibold shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span>Instansi / Unit</span>
                </a>
            </li>

            <!-- Kategori -->
            <li>
                <a href="{{ route('admin.kategori.index') }}"
                    class="flex items-center gap-3 p-2.5 rounded-xl transition-smooth {{ request()->routeIs('admin.kategori.*') ? 'bg-blue-600 text-white font-semibold shadow-lg shadow-blue-600/30' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    <span>Kategori Laporan</span>
                </a>
            </li>
        </ul>

        <!-- System status badge in bottom sidebar -->
        <div class="p-3 bg-slate-950/60 rounded-2xl border border-slate-800/80">
            <div class="flex items-center gap-2">
                <span class="relative flex h-2.5 w-2.5">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                </span>
                <span class="text-xs font-semibold text-slate-300">Sirespon Aktif</span>
            </div>
            <p class="text-[11px] text-slate-400 mt-1">Sistem Layanan Pelaporan Tanggap Cepat</p>
        </div>
    </div>
</aside>