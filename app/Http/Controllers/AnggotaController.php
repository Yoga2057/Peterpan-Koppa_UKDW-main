<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::withCount('pesanan')->latest()->get();
        return response()->json($anggota);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:anggota,email',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'nullable|string',
            'password' => 'required|string|min:6',
        ]);

        $anggota = Anggota::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'data' => $anggota]);
        }

        return redirect()->back()->with('success', 'Anggota berhasil ditambahkan!');
    }
}
