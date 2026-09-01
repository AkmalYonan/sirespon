<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::withCount('laporans')->latest()->get();
        return view('pages.admin.master.kategori.index', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'level' => 'required|in:ringan,normal,berat,gawat',
            'desc' => 'nullable|string',
        ]);

        Kategori::create($request->all());

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'level' => 'required|in:ringan,normal,berat,gawat',
            'desc' => 'nullable|string',
        ]);

        $kategori->update($request->all());

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}
