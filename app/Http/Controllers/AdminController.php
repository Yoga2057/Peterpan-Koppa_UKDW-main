<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Barang;
use App\Models\Anggota;
use App\Models\Pesanan;
use App\Models\KategoriBarang;
use App\Models\DetailPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalBarang = Barang::count();
        $totalAnggota = Anggota::count();
        $totalPesanan = Pesanan::count();
        $totalKategori = KategoriBarang::count();

        // Calculate total revenue from completed/paid orders
        $totalPendapatan = DetailPesanan::whereHas('pesanan', function($q) {
            $q->where('status', '!=', 'proses');
        })->get()->sum(function($item) {
            return $item->jumlah * $item->harga_satuan;
        });

        $pesananTerbaru = Pesanan::with(['anggota', 'detailPesanan.barang', 'dataPembayaran'])
            ->latest()
            ->take(5)
            ->get();

        $stokMenipis = Barang::with('kategori')
            ->where('stok', '<=', 20)
            ->get();

        return response()->json([
            'total_barang' => $totalBarang,
            'total_anggota' => $totalAnggota,
            'total_pesanan' => $totalPesanan,
            'total_kategori' => $totalKategori,
            'total_pendapatan' => $totalPendapatan,
            'pesanan_terbaru' => $pesananTerbaru,
            'stok_menipis' => $stokMenipis,
        ]);
    }

    public function index()
    {
        $admins = Admin::latest()->get();
        return response()->json($admins);
    }
}
