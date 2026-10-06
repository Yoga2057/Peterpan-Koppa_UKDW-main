<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    public function index()
    {
        $kategori = KategoriBarang::withCount('barang')->get();
        return response()->json($kategori);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        $kategori = KategoriBarang::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'data' => $kategori]);
        }

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan!');
    }
}
