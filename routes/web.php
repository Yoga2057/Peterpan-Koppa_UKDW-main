<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AdminController;
use App\Models\KategoriBarang;
use App\Models\Barang;
use App\Models\Anggota;
use App\Models\Pesanan;

Route::get('/', function () {
    $kategori = KategoriBarang::withCount('barang')->get();
    $barang = Barang::with('kategori')->get();
    $anggota = Anggota::all();
    $pesanan = Pesanan::with(['anggota', 'detailPesanan.barang', 'dataPembayaran'])->latest()->get();
    
    return view('koppa', compact('kategori', 'barang', 'anggota', 'pesanan'));
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

// API / AJAX Web Actions
Route::get('/api/dashboard', [AdminController::class, 'dashboard']);
Route::get('/api/barang', [BarangController::class, 'index']);
Route::post('/api/barang', [BarangController::class, 'store']);
Route::post('/api/barang/{id}/update', [BarangController::class, 'update']);
Route::delete('/api/barang/{id}', [BarangController::class, 'destroy']);

Route::get('/api/kategori', [KategoriBarangController::class, 'index']);
Route::post('/api/kategori', [KategoriBarangController::class, 'store']);

Route::get('/api/anggota', [AnggotaController::class, 'index']);
Route::post('/api/anggota', [AnggotaController::class, 'store']);

Route::get('/api/pesanan', [PesananController::class, 'index']);
Route::get('/api/pesanan/{id}', [PesananController::class, 'show']);
Route::post('/api/pesanan', [PesananController::class, 'store']);
Route::post('/api/pesanan/{id}/status', [PesananController::class, 'updateStatus']);

Route::post('/api/pembayaran/{id}/status', [PembayaranController::class, 'updateStatus']);
