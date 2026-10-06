<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::with('kategori');

        if ($request->has('kategori_id') && $request->kategori_id != '') {
            $query->where('kategori_id', $request->kategori_id);
        }

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }

        $barang = $query->latest()->get();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json($barang);
        }

        return $barang;
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_barang,id',
            'nama_barang' => 'required|string|max:100',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|string',
        ]);

        $barang = Barang::create($request->only([
            'kategori_id', 'nama_barang', 'stok', 'harga', 'deskripsi', 'foto'
        ]));

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'data' => $barang]);
        }

        return redirect()->back()->with('success', 'Barang berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'kategori_id' => 'sometimes|required|exists:kategori_barang,id',
            'nama_barang' => 'sometimes|required|string|max:100',
            'stok' => 'sometimes|required|integer|min:0',
            'harga' => 'sometimes|required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|string',
        ]);

        $barang->update($request->only([
            'kategori_id', 'nama_barang', 'stok', 'harga', 'deskripsi', 'foto'
        ]));

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'data' => $barang]);
        }

        return redirect()->back()->with('success', 'Barang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return response()->json(['success' => true]);
    }
}
