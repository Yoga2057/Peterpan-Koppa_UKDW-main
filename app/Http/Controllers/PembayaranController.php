<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:belum dibayar,menunggu verifikasi,lunas',
            'bukti_transfer' => 'nullable|string',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        
        $data = ['status' => $request->status];
        if ($request->has('bukti_transfer') && !empty($request->bukti_transfer)) {
            $data['bukti_transfer'] = $request->bukti_transfer;
        }

        $pembayaran->update($data);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'data' => $pembayaran]);
        }

        return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui!');
    }
}
