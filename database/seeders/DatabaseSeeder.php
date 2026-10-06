<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\KategoriBarang;
use App\Models\Barang;
use App\Models\Anggota;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Pembayaran;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. Seed Admin
        $admin1 = Admin::create([
            'nama' => 'Admin Utama Koppa UKDW',
            'email' => 'admin@ukdw.ac.id',
            'password' => Hash::make('admin123'),
        ]);

        $admin2 = Admin::create([
            'nama' => 'Petugas Kasir Koppa',
            'email' => 'kasir@ukdw.ac.id',
            'password' => Hash::make('admin123'),
        ]);

        // 2. Seed Kategori Barang
        $katAtk = KategoriBarang::create(['nama_kategori' => 'Alat Tulis Kantor (ATK)']);
        $katMak = KategoriBarang::create(['nama_kategori' => 'Makanan & Minuman']);
        $katBuku = KategoriBarang::create(['nama_kategori' => 'Buku Teknis & Kuliah']);
        $katMerch = KategoriBarang::create(['nama_kategori' => 'Merchandise UKDW']);
        $katLab = KategoriBarang::create(['nama_kategori' => 'Perlengkapan Praktikum']);

        // 3. Seed Barang
        $b1 = Barang::create([
            'kategori_id' => $katAtk->id,
            'nama_barang' => 'Pulpen Pilot G2 0.5mm Gel',
            'stok' => 50,
            'harga' => 12000,
            'deskripsi' => 'Pulpen gel hitam berkualitas tinggi dengan tinta lancar, sangat cocok untuk ujian dan catatan kuliah.',
            'foto' => 'https://images.unsplash.com/photo-1585336261026-8f5785782ed6?auto=format&fit=crop&w=500&q=80',
        ]);

        $b2 = Barang::create([
            'kategori_id' => $katAtk->id,
            'nama_barang' => 'Buku Tulis Spiral A5 UKDW',
            'stok' => 35,
            'harga' => 25000,
            'deskripsi' => 'Buku catatan bersampul keras logo UKDW isi 100 lembar kertas HVS 80gsm.',
            'foto' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&w=500&q=80',
        ]);

        $b3 = Barang::create([
            'kategori_id' => $katMerch->id,
            'nama_barang' => 'Kaos Polo Logo UKDW Blue Navy',
            'stok' => 20,
            'harga' => 85000,
            'deskripsi' => 'Kaos polo bahan katun combed 30s premium dengan bordir presisi logo UKDW.',
            'foto' => 'https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=500&q=80',
        ]);

        $b4 = Barang::create([
            'kategori_id' => $katMerch->id,
            'nama_barang' => 'Tumbler Stainless Steel UKDW 500ml',
            'stok' => 15,
            'harga' => 95000,
            'deskripsi' => 'Botol minum vakum stainless tahan panas 12 jam dan dingin 24 jam edisi khusus Koppa UKDW.',
            'foto' => 'https://images.unsplash.com/photo-1602143407151-7111542de6e8?auto=format&fit=crop&w=500&q=80',
        ]);

        $b5 = Barang::create([
            'kategori_id' => $katMak->id,
            'nama_barang' => 'Kopi Susu Gula Aren Koppa',
            'stok' => 40,
            'harga' => 15000,
            'deskripsi' => 'Kopi espresso robusta dipadu dengan susu segar dan gula aren organik khas Koppa UKDW.',
            'foto' => 'https://images.unsplash.com/photo-1517701604599-bb29b565090c?auto=format&fit=crop&w=500&q=80',
        ]);

        $b6 = Barang::create([
            'kategori_id' => $katMak->id,
            'nama_barang' => 'Roti Kasur Coklat Keju Spesial',
            'stok' => 25,
            'harga' => 18000,
            'deskripsi' => 'Roti olahan fresh setiap pagi dengan isian selai coklat meleleh dan keju manis savory.',
            'foto' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=500&q=80',
        ]);

        $b7 = Barang::create([
            'kategori_id' => $katBuku->id,
            'nama_barang' => 'Buku Pemrograman Web Modern Laravel & Vue',
            'stok' => 12,
            'harga' => 110000,
            'deskripsi' => 'Buku modul utama praktikum dan referensi mata kuliah Pemrograman Web Informatika UKDW.',
            'foto' => 'https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&w=500&q=80',
        ]);

        $b8 = Barang::create([
            'kategori_id' => $katLab->id,
            'nama_barang' => 'Jas Laboratorium Putih UKDW',
            'stok' => 30,
            'harga' => 125000,
            'deskripsi' => 'Jas laboratorium berbahan dril tebal standar praktikum Fakultas Biologi dan Teknologi Informasi UKDW.',
            'foto' => 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=500&q=80',
        ]);

        // 4. Seed Anggota
        $ang1 = Anggota::create([
            'nama' => 'Budi Santoso',
            'email' => 'budi.santoso@students.ukdw.ac.id',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Dr. Wahidin Sudirohusodo No. 5, Klitren, Gondokusuman, Yogyakarta',
            'password' => Hash::make('anggota123'),
        ]);

        $ang2 = Anggota::create([
            'nama' => 'Siti Rahmawati',
            'email' => 'siti.rahmawati@students.ukdw.ac.id',
            'no_hp' => '082345678901',
            'alamat' => 'Jl. Solo Km 7, Maguwoharjo, Depok, Sleman',
            'password' => Hash::make('anggota123'),
        ]);

        $ang3 = Anggota::create([
            'nama' => 'Michael Tanuwijaya',
            'email' => 'michael.tan@students.ukdw.ac.id',
            'no_hp' => '085678901234',
            'alamat' => 'Jl. C. Simanjuntak No. 12, Terban, Gondokusuman, Yogyakarta',
            'password' => Hash::make('anggota123'),
        ]);

        $ang4 = Anggota::create([
            'nama' => 'Clara Wijaya',
            'email' => 'clara.wijaya@students.ukdw.ac.id',
            'no_hp' => '087890123456',
            'alamat' => 'Asrama UKDW, Terban, Yogyakarta',
            'password' => Hash::make('anggota123'),
        ]);

        // 5. Seed Pesanan, Detail, Pembayaran
        // Order 1 (Budi)
        $p1 = Pesanan::create([
            'anggota_id' => $ang1->id,
            'pengiriman' => 'antar',
            'pembayaran' => 'transfer',
            'status' => 'dikirim',
        ]);
        DetailPesanan::create([
            'pesanan_id' => $p1->id,
            'barang_id' => $b4->id,
            'jumlah' => 1,
            'harga_satuan' => $b4->harga,
        ]);
        DetailPesanan::create([
            'pesanan_id' => $p1->id,
            'barang_id' => $b1->id,
            'jumlah' => 2,
            'harga_satuan' => $b1->harga,
        ]);
        Pembayaran::create([
            'pesanan_id' => $p1->id,
            'bukti_transfer' => 'bukti_budi_01.jpg',
            'status' => 'lunas',
        ]);

        // Order 2 (Siti)
        $p2 = Pesanan::create([
            'anggota_id' => $ang2->id,
            'pengiriman' => 'ambil',
            'pembayaran' => 'tunai',
            'status' => 'siap',
        ]);
        DetailPesanan::create([
            'pesanan_id' => $p2->id,
            'barang_id' => $b3->id,
            'jumlah' => 1,
            'harga_satuan' => $b3->harga,
        ]);
        DetailPesanan::create([
            'pesanan_id' => $p2->id,
            'barang_id' => $b2->id,
            'jumlah' => 1,
            'harga_satuan' => $b2->harga,
        ]);
        Pembayaran::create([
            'pesanan_id' => $p2->id,
            'bukti_transfer' => null,
            'status' => 'lunas',
        ]);

        // Order 3 (Michael)
        $p3 = Pesanan::create([
            'anggota_id' => $ang3->id,
            'pengiriman' => 'antar',
            'pembayaran' => 'transfer',
            'status' => 'proses',
        ]);
        DetailPesanan::create([
            'pesanan_id' => $p3->id,
            'barang_id' => $b5->id,
            'jumlah' => 2,
            'harga_satuan' => $b5->harga,
        ]);
        DetailPesanan::create([
            'pesanan_id' => $p3->id,
            'barang_id' => $b6->id,
            'jumlah' => 1,
            'harga_satuan' => $b6->harga,
        ]);
        Pembayaran::create([
            'pesanan_id' => $p3->id,
            'bukti_transfer' => 'bukti_michael_03.jpg',
            'status' => 'menunggu verifikasi',
        ]);

        // Order 4 (Clara)
        $p4 = Pesanan::create([
            'anggota_id' => $ang4->id,
            'pengiriman' => 'ambil',
            'pembayaran' => 'transfer',
            'status' => 'selesai',
        ]);
        DetailPesanan::create([
            'pesanan_id' => $p4->id,
            'barang_id' => $b8->id,
            'jumlah' => 1,
            'harga_satuan' => $b8->harga,
        ]);
        Pembayaran::create([
            'pesanan_id' => $p4->id,
            'bukti_transfer' => 'bukti_clara_04.jpg',
            'status' => 'lunas',
        ]);
    }
}
