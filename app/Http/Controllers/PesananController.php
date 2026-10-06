<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Pembayaran;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with(['anggota', 'detailPesanan.barang', 'dataPembayaran'])
            ->latest()
            ->get();

        return response()->json($pesanan);
    }

    public function show($id)
    {
        $pesanan = Pesanan::with(['anggota', 'detailPesanan.barang', 'dataPembayaran'])
            ->findOrFail($id);

        return response()->json($pesanan);
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required|exists:anggota,id',
            'pengiriman' => 'required|in:ambil,antar',
            'pembayaran' => 'required|in:tunai,transfer',
            'items' => 'required|array|min:1',
            'items.*.barang_id' => 'required|exists:barang,id',
            'items.*.jumlah' => 'required|integer|min:1',
        ]);

        return DB::transaction(function () use ($request) {
            $pesanan = Pesanan::create([
                'anggota_id' => $request->anggota_id,
                'pengiriman' => $request->pengiriman,
                'pembayaran' => $request->pembayaran,
                'status' => 'proses',
            ]);

            foreach ($request->items as $item) {
                $barang = Barang::findOrFail($item['barang_id']);

                // Deduct stock if available
                if ($barang->stok >= $item['jumlah']) {
                    $barang->decrement('stok', $item['jumlah']);
                }

                DetailPesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'barang_id' => $barang->id,
                    'jumlah' => $item['jumlah'],
                    'harga_satuan' => $barang->harga,
                ]);
            }

            // Create initial payment record
            Pembayaran::create([
                'pesanan_id' => $pesanan->id,
                'bukti_transfer' => null,
                'status' => $request->pembayaran === 'tunai' ? 'lunas' : 'belum dibayar',
            ]);

            $pesanan->load(['anggota', 'detailPesanan.barang', 'dataPembayaran']);

            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(['success' => true, 'data' => $pesanan]);
            }

            return redirect()->back()->with('success', 'Pesanan berhasil dibuat!');
        });
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:proses,siap,dikirim,selesai',
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update(['status' => $request->status]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'data' => $pesanan]);
        }

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
}
