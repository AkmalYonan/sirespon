<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\Kategori;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LaporanController extends Controller
{
    /**
     * Display landing page with form and public reports.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        $instansis = Instansi::all();
        
        $publicLaporans = Laporan::with(['kategori', 'instansi'])
            ->where('status', 'publik')
            ->latest()
            ->paginate(6);

        $stats = [
            'total' => Laporan::count(),
            'selesai' => Laporan::where('status_laporan', 'selesai')->count(),
            'proses' => Laporan::where('status_laporan', 'proses')->count(),
            'instansi' => Instansi::count(),
        ];

        return view('pages.lap.index', compact('kategoris', 'instansis', 'publicLaporans', 'stats'));
    }

    /**
     * Store a newly created report.
     */
    public function store(Request $request)
    {
        $request->validate([
            'klasifikasi' => 'required|in:pengaduan,laporan',
            'judul' => 'required|string|max:255',
            'desc' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'instansi_id' => 'required|exists:instansis,id',
            'date' => 'required|date',
            'lokasi' => 'nullable|string|max:255',
            'email_pembuat' => 'nullable|email|max:255',
            'nama_pelapor' => 'nullable|string|max:255',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
            'status' => 'required|in:rahasia,publik',
            'status_pengirim' => 'required|in:anonim,publik',
        ]);

        // Generate Unique Tracking ID: RSP-YYYYMM-XXXX
        $uniqueId = 'RSP-' . date('Ym') . '-' . strtoupper(Str::random(5));

        // Handle File Upload
        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $lampiranPath = $file->storeAs('lampiran', $fileName, 'public');
        }

        $laporan = Laporan::create([
            'id_lacak' => $uniqueId,
            'email_pembuat' => $request->email_pembuat,
            'nama_pelapor' => $request->status_pengirim === 'anonim' ? null : $request->nama_pelapor,
            'klasifikasi' => $request->klasifikasi,
            'kategori_id' => $request->kategori_id,
            'instansi_id' => $request->instansi_id,
            'judul' => $request->judul,
            'desc' => $request->desc,
            'date' => $request->date,
            'lokasi' => $request->lokasi,
            'lampiran' => $lampiranPath,
            'status' => $request->status,
            'status_pengirim' => $request->status_pengirim,
            'status_laporan' => 'menunggu',
        ]);

        return redirect()->route('home')->with([
            'success' => 'Laporan Anda berhasil dikirim!',
            'id_lacak' => $uniqueId,
            'laporan_id' => $laporan->id,
        ]);
    }

    /**
     * Track a report by id_lacak.
     */
    public function track(Request $request)
    {
        $idLacak = trim($request->get('id_lacak', ''));
        $laporan = null;

        if (!empty($idLacak)) {
            $laporan = Laporan::with(['kategori', 'instansi', 'comments.user'])
                ->where('id_lacak', $idLacak)
                ->first();
        }

        return view('pages.lap.track', compact('laporan', 'idLacak'));
    }

    /**
     * Show report detail.
     */
    public function show($id)
    {
        $laporan = Laporan::with(['kategori', 'instansi', 'comments.user'])->findOrFail($id);
        
        // If private, only allowed if viewer is admin or has tracking code
        if ($laporan->status === 'rahasia' && !auth()->check()) {
            return redirect()->route('home')->with('error', 'Laporan ini bersifat rahasia.');
        }

        return view('pages.lap.show', compact('laporan'));
    }
}
