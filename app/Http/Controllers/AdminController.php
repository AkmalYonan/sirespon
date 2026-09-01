<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Instansi;
use App\Models\Kategori;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Admin Dashboard with real-time statistics and overview.
     */
    public function dashboard()
    {
        $stats = [
            'total_laporan' => Laporan::where('klasifikasi', 'laporan')->count(),
            'total_pengaduan' => Laporan::where('klasifikasi', 'pengaduan')->count(),
            'menunggu' => Laporan::where('status_laporan', 'menunggu')->count(),
            'proses' => Laporan::where('status_laporan', 'proses')->count(),
            'selesai' => Laporan::where('status_laporan', 'selesai')->count(),
            'total_instansi' => Instansi::count(),
            'total_kategori' => Kategori::count(),
        ];

        $recentLaporan = Laporan::with(['kategori', 'instansi'])
            ->latest()
            ->take(6)
            ->get();

        $recentInstansi = Instansi::withCount('laporans')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'recentLaporan', 'recentInstansi'));
    }

    /**
     * Display all items with klasifikasi = 'laporan'.
     */
    public function index_laporan(Request $request)
    {
        $query = Laporan::with(['kategori', 'instansi'])->where('klasifikasi', 'laporan');

        if ($request->filled('status')) {
            $query->where('status_laporan', $request->status);
        }

        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('id_lacak', 'like', "%{$search}%")
                  ->orWhere('desc', 'like', "%{$search}%");
            });
        }

        $laporans = $query->latest()->paginate(10)->withQueryString();
        $kategoris = Kategori::all();

        return view('pages.admin.laporan.index', compact('laporans', 'kategoris'));
    }

    /**
     * Show detail of a Laporan.
     */
    public function laporan_detail($id)
    {
        $laporan = Laporan::with(['kategori', 'instansi', 'comments.user'])->findOrFail($id);
        return view('pages.admin.laporan.detail', compact('laporan'));
    }

    /**
     * Display all items with klasifikasi = 'pengaduan'.
     */
    public function index_pengaduan(Request $request)
    {
        $query = Laporan::with(['kategori', 'instansi'])->where('klasifikasi', 'pengaduan');

        if ($request->filled('status')) {
            $query->where('status_laporan', $request->status);
        }

        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('id_lacak', 'like', "%{$search}%")
                  ->orWhere('desc', 'like', "%{$search}%");
            });
        }

        $pengaduans = $query->latest()->paginate(10)->withQueryString();
        $kategoris = Kategori::all();

        return view('pages.admin.pengaduan.index', compact('pengaduans', 'kategoris'));
    }

    /**
     * Show detail of a Pengaduan.
     */
    public function pengaduan_detail($id)
    {
        $laporan = Laporan::with(['kategori', 'instansi', 'comments.user'])->findOrFail($id);
        return view('pages.admin.pengaduan.detail', compact('laporan'));
    }

    /**
     * Update status of Laporan / Pengaduan.
     */
    public function update_status(Request $request, $id)
    {
        $request->validate([
            'status_laporan' => 'required|in:menunggu,proses,selesai,ditolak',
            'catatan' => 'nullable|string',
        ]);

        $laporan = Laporan::findOrFail($id);
        $oldStatus = $laporan->status_laporan;
        $laporan->status_laporan = $request->status_laporan;
        $laporan->save();

        if ($request->filled('catatan')) {
            Comment::create([
                'laporan_id' => $laporan->id,
                'user_id' => Auth::id(),
                'author_name' => Auth::user()?->name ?? 'Admin',
                'desc' => "Status diubah dari '{$oldStatus}' menjadi '{$request->status_laporan}'. Catatan: " . $request->catatan,
            ]);
        }

        return back()->with('success', 'Status laporan berhasil diperbarui menjadi ' . ucfirst($request->status_laporan));
    }

    /**
     * Post a comment / response to a report.
     */
    public function store_comment(Request $request, $id)
    {
        $request->validate([
            'desc' => 'required|string',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $laporan = Laporan::findOrFail($id);

        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $lampiranPath = $file->storeAs('comment_lampiran', $fileName, 'public');
        }

        Comment::create([
            'laporan_id' => $laporan->id,
            'user_id' => Auth::id(),
            'author_name' => Auth::user()?->name ?? 'Staff',
            'desc' => $request->desc,
            'lampiran' => $lampiranPath,
        ]);

        return back()->with('success', 'Tanggapan berhasil dikirimkan.');
    }
}
