<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'anggota_id',
        'pengiriman',
        'pembayaran',
        'status',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id');
    }

    public function dataPembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'pesanan_id');
    }

    public function getTotalHargaAttribute()
    {
        return $this->detailPesanan->sum(function ($detail) {
            return $detail->jumlah * $detail->harga_satuan;
        });
    }
}
