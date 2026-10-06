<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'kategori_id',
        'nama_barang',
        'stok',
        'harga',
        'deskripsi',
        'foto',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBarang::class, 'kategori_id');
    }

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'barang_id');
    }
}
