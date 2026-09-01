<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instansi = Instansi::withCount('laporans')->latest()->get();
        return view('pages.admin.master.instansi.index', compact('instansi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'pemimpin' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:100',
        ]);

        Instansi::create([
            'nama' => $request->nama,
            'pemimpin' => $request->pemimpin,
            'kategori' => $request->kategori ?? 'staff',
        ]);

        return redirect()->route('admin.instansi.index')->with('success', 'Instansi berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instansi $instansi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'pemimpin' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:100',
        ]);

        $instansi->update($request->all());

        return redirect()->route('admin.instansi.index')->with('success', 'Data instansi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instansi $instansi)
    {
        $instansi->delete();
        return back()->with('success', 'Data instansi telah dihapus.');
    }
}
