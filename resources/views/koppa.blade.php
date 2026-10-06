<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Peterpan Koppa UKDW - Koperasi Digital UKDW Yogyakarta</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        ukdw: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            500: '#4f46e5',
                            600: '#4338ca',
                            700: '#3730a3',
                            900: '#1e1b4b',
                        },
                        gold: '#f59e0b',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }
        .gradient-header {
            background: linear-gradient(135deg, #1e1b4b 0%, #312e81 50%, #4338ca 100%);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">

    <!-- Header Navigation -->
    <header class="gradient-header text-white sticky top-0 z-40 shadow-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-amber-400 to-indigo-400 p-0.5 shadow-lg shadow-indigo-500/30">
                        <div class="w-full h-full bg-slate-900 rounded-[14px] flex items-center justify-center">
                            <i class="fa-solid me-0 fa-shop text-amber-400 text-xl"></i>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h1 class="font-extrabold text-xl tracking-tight text-white">Peterpan Koppa</h1>
                            <span class="bg-amber-400/20 text-amber-300 text-[10px] font-bold px-2 py-0.5 rounded-full border border-amber-400/30">UKDW</span>
                        </div>
                        <p class="text-xs text-indigo-200">Koperasi Universitas Kristen Duta Wacana</p>
                    </div>
                </div>

                <!-- Navigation Tabs -->
                <nav class="hidden md:flex items-center space-x-1 bg-white/10 p-1.5 rounded-2xl backdrop-blur-md border border-white/10">
                    <button onclick="switchTab('katalog')" id="tab-katalog" class="tab-btn px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 bg-white text-indigo-950 shadow-md">
                        <i class="fa-solid fa-store mr-1.5 text-indigo-600"></i> Katalog Koppa
                    </button>
                    <button onclick="switchTab('pesanan')" id="tab-pesanan" class="tab-btn px-4 py-2 rounded-xl text-sm font-medium text-indigo-100 hover:text-white hover:bg-white/10 transition-all duration-200">
                        <i class="fa-solid fa-receipt mr-1.5 text-amber-400"></i> Kelola Pesanan
                    </button>
                    <button onclick="switchTab('inventoris')" id="tab-inventoris" class="tab-btn px-4 py-2 rounded-xl text-sm font-medium text-indigo-100 hover:text-white hover:bg-white/10 transition-all duration-200">
                        <i class="fa-solid fa-boxes-stacked mr-1.5 text-emerald-400"></i> Stok & Barang
                    </button>
                    <button onclick="switchTab('anggota')" id="tab-anggota" class="tab-btn px-4 py-2 rounded-xl text-sm font-medium text-indigo-100 hover:text-white hover:bg-white/10 transition-all duration-200">
                        <i class="fa-solid fa-users mr-1.5 text-sky-400"></i> Anggota
                    </button>
                    <button onclick="switchTab('dashboard')" id="tab-dashboard" class="tab-btn px-4 py-2 rounded-xl text-sm font-medium text-indigo-100 hover:text-white hover:bg-white/10 transition-all duration-200">
                        <i class="fa-solid fa-chart-pie mr-1.5 text-rose-400"></i> Dashboard
                    </button>
                </nav>

                <!-- Cart Action & User Badge -->
                <div class="flex items-center gap-3">
                    <button onclick="openCartModal()" class="relative bg-amber-400 hover:bg-amber-300 text-slate-950 font-bold px-4 py-2.5 rounded-xl shadow-lg shadow-amber-400/20 flex items-center gap-2 transition transform active:scale-95">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="hidden sm:inline">Keranjang</span>
                        <span id="cart-badge" class="bg-indigo-950 text-amber-300 text-xs font-black px-2 py-0.5 rounded-full">0</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="md:hidden flex overflow-x-auto px-4 py-2 bg-indigo-950/80 border-t border-white/10 space-x-2 text-xs">
            <button onclick="switchTab('katalog')" class="whitespace-nowrap px-3 py-1.5 rounded-lg font-medium text-white bg-indigo-600">Katalog</button>
            <button onclick="switchTab('pesanan')" class="whitespace-nowrap px-3 py-1.5 rounded-lg font-medium text-indigo-200">Pesanan</button>
            <button onclick="switchTab('inventoris')" class="whitespace-nowrap px-3 py-1.5 rounded-lg font-medium text-indigo-200">Barang</button>
            <button onclick="switchTab('anggota')" class="whitespace-nowrap px-3 py-1.5 rounded-lg font-medium text-indigo-200">Anggota</button>
            <button onclick="switchTab('dashboard')" class="whitespace-nowrap px-3 py-1.5 rounded-lg font-medium text-indigo-200">Dashboard</button>
        </div>
    </header>

    <!-- Main Container -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Top Banner Quick Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl font-bold">
                    <i class="fa-solid fa-box-archive"></i>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Produk</p>
                    <h3 class="text-2xl font-extrabold text-slate-800" id="stat-produk">{{ $barang->count() }}</h3>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl font-bold">
                    <i class="fa-solid fa-cart-flatbed"></i>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Pesanan</p>
                    <h3 class="text-2xl font-extrabold text-slate-800" id="stat-pesanan">{{ $pesanan->count() }}</h3>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-xl font-bold">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Anggota Terdaftar</p>
                    <h3 class="text-2xl font-extrabold text-slate-800" id="stat-anggota">{{ $anggota->count() }}</h3>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold">
                    <i class="fa-solid fa-wallet"></i>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Estimasi Transaksi</p>
                    <h3 class="text-lg font-extrabold text-emerald-600" id="stat-omzet">
                        Rp {{ number_format($pesanan->sum(function($p){ return $p->total_harga; }), 0, ',', '.') }}
                    </h3>
                </div>
            </div>
        </div>

        <!-- TAB 1: KATALOG (STOREFRONT) -->
        <section id="content-katalog" class="tab-content block">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900">Katalog Produk Koppa UKDW</h2>
                    <p class="text-sm text-slate-500">Pilih barang perlengkapan kuliah, merchandise, dan konsumsi harian mahasiswa.</p>
                </div>

                <!-- Search & Category Filter -->
                <div class="flex flex-wrap items-center gap-3">
                    <div class="relative min-w-[240px]">
                        <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-slate-400 text-sm"></i>
                        <input type="text" id="search-input" onkeyup="filterProducts()" placeholder="Cari nama barang..." class="w-full pl-10 pr-4 py-2 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-indigo-500 shadow-sm">
                    </div>
                </div>
            </div>

            <!-- Category Pills -->
            <div class="flex overflow-x-auto pb-4 gap-2 mb-6 custom-scrollbar">
                <button onclick="filterCategory('all')" class="cat-pill px-4 py-2 rounded-xl text-xs font-semibold whitespace-nowrap bg-indigo-600 text-white shadow-md">
                    Semua Kategori ({{ $barang->count() }})
                </button>
                @foreach($kategori as $kat)
                <button onclick="filterCategory('{{ $kat->id }}')" class="cat-pill px-4 py-2 rounded-xl text-xs font-semibold whitespace-nowrap bg-white text-slate-600 border border-slate-200 hover:border-indigo-300">
                    {{ $kat->nama_kategori }} ({{ $kat->barang_count }})
                </button>
                @endforeach
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="product-grid">
                @foreach($barang as $item)
                <div class="product-card bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between" data-category="{{ $item->kategori_id }}" data-name="{{ strtolower($item->nama_barang) }}">
                    <div>
                        <div class="relative h-48 bg-slate-100 overflow-hidden group">
                            <img src="{{ $item->foto ?? 'https://images.unsplash.com/photo-1585336261026-8f5785782ed6?auto=format&fit=crop&w=500&q=80' }}" alt="{{ $item->nama_barang }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <span class="absolute top-3 left-3 bg-slate-900/80 backdrop-blur-md text-amber-300 text-[11px] font-bold px-3 py-1 rounded-full">
                                {{ $item->kategori->nama_kategori ?? 'Umum' }}
                            </span>
                            <span class="absolute top-3 right-3 text-xs font-extrabold px-2.5 py-1 rounded-lg {{ $item->stok > 10 ? 'bg-emerald-500/90 text-white' : 'bg-rose-500/90 text-white' }}">
                                Stok: {{ $item->stok }}
                            </span>
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-slate-800 text-base leading-snug mb-2 line-clamp-1">{{ $item->nama_barang }}</h3>
                            <p class="text-xs text-slate-500 line-clamp-2 mb-4">{{ $item->deskripsi ?? 'Produk berkualitas dari Koppa UKDW.' }}</p>
                        </div>
                    </div>

                    <div class="p-5 pt-0 flex items-center justify-between border-t border-slate-100 mt-auto">
                        <div>
                            <span class="text-[11px] text-slate-400 block font-medium">Harga</span>
                            <span class="font-extrabold text-indigo-700 text-lg">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                        </div>
                        <button onclick="addToCart({{ $item->id }}, '{{ addslashes($item->nama_barang) }}', {{ $item->harga }}, {{ $item->stok }})" class="bg-indigo-50 hover:bg-indigo-600 text-indigo-600 hover:text-white font-bold p-2.5 rounded-xl transition duration-200 flex items-center justify-center">
                            <i class="fa-solid fa-cart-plus text-base"></i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- TAB 2: KELOLA PESANAN -->
        <section id="content-pesanan" class="tab-content hidden">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900">Daftar & Status Pesanan</h2>
                    <p class="text-sm text-slate-500">Kelola konfirmasi status pengiriman dan verifikasi pembayaran anggota.</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase text-xs tracking-wider">
                                <th class="py-4 px-6">ID Pesanan</th>
                                <th class="py-4 px-6">Nama Anggota</th>
                                <th class="py-4 px-6">Detail Produk</th>
                                <th class="py-4 px-6">Pengiriman</th>
                                <th class="py-4 px-6">Pembayaran</th>
                                <th class="py-4 px-6">Total Tagihan</th>
                                <th class="py-4 px-6">Status Pesanan</th>
                                <th class="py-4 px-6 text-center">Aksi Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100" id="pesanan-table-body">
                            @foreach($pesanan as $p)
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-4 px-6 font-bold text-indigo-700">#ORD-{{ sprintf('%04d', $p->id) }}</td>
                                <td class="py-4 px-6">
                                    <div class="font-bold text-slate-800">{{ $p->anggota->nama ?? 'Umum' }}</div>
                                    <div class="text-xs text-slate-400">{{ $p->anggota->no_hp ?? '-' }}</div>
                                </td>
                                <td class="py-4 px-6">
                                    <ul class="text-xs space-y-1">
                                        @foreach($p->detailPesanan as $det)
                                        <li class="text-slate-700">
                                            <span class="font-semibold">{{ $det->barang->nama_barang ?? 'Barang' }}</span> 
                                            <span class="text-slate-400">x{{ $det->jumlah }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ $p->pengiriman == 'antar' ? 'bg-sky-50 text-sky-700 border border-sky-200' : 'bg-amber-50 text-amber-700 border border-amber-200' }}">
                                        <i class="fa-solid {{ $p->pengiriman == 'antar' ? 'fa-truck' : 'fa-store' }} mr-1"></i>
                                        {{ ucfirst($p->pengiriman) }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="text-xs font-bold uppercase text-slate-600 mb-1">{{ $p->pembayaran }}</div>
                                    <span class="px-2 py-0.5 rounded text-[11px] font-extrabold {{ optional($p->dataPembayaran)->status == 'lunas' ? 'bg-emerald-100 text-emerald-800' : (optional($p->dataPembayaran)->status == 'menunggu verifikasi' ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800') }}">
                                        {{ optional($p->dataPembayaran)->status ?? 'belum dibayar' }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 font-extrabold text-slate-900">
                                    Rp {{ number_format($p->total_harga, 0, ',', '.') }}
                                </td>
                                <td class="py-4 px-6">
                                    @php
                                        $badgeColor = [
                                            'proses' => 'bg-amber-500 text-white',
                                            'siap' => 'bg-sky-500 text-white',
                                            'dikirim' => 'bg-indigo-600 text-white',
                                            'selesai' => 'bg-emerald-600 text-white'
                                        ][$p->status] ?? 'bg-slate-500 text-white';
                                    @endphp
                                    <span class="px-3 py-1 rounded-full text-xs font-extrabold uppercase {{ $badgeColor }}">
                                        {{ $p->status }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <select onchange="updateOrderStatus({{ $p->id }}, this.value)" class="text-xs font-semibold bg-slate-100 border border-slate-300 rounded-lg px-2 py-1 focus:outline-none">
                                        <option value="proses" {{ $p->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                        <option value="siap" {{ $p->status == 'siap' ? 'selected' : '' }}>Siap</option>
                                        <option value="dikirim" {{ $p->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                        <option value="selesai" {{ $p->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- TAB 3: INVENTORIS & BARANG -->
        <section id="content-inventoris" class="tab-content hidden">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900">Inventoris & Stok Barang</h2>
                    <p class="text-sm text-slate-500">Kelola daftar item, harga jual, dan persediaan stok toko Koppa UKDW.</p>
                </div>
                <div class="flex gap-2">
                    <button onclick="openCategoryModal()" class="bg-white hover:bg-slate-50 text-slate-700 border border-slate-300 font-bold px-4 py-2 rounded-xl text-sm shadow-sm">
                        + Tambah Kategori
                    </button>
                    <button onclick="openAddProductModal()" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-4 py-2 rounded-xl text-sm shadow-md">
                        + Tambah Produk Baru
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase text-xs tracking-wider">
                                <th class="py-4 px-6">Produk</th>
                                <th class="py-4 px-6">Kategori</th>
                                <th class="py-4 px-6">Harga Satuan</th>
                                <th class="py-4 px-6">Stok Saat Ini</th>
                                <th class="py-4 px-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($barang as $b)
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="py-4 px-6 flex items-center gap-3">
                                    <img src="{{ $b->foto ?? 'https://images.unsplash.com/photo-1585336261026-8f5785782ed6?auto=format&fit=crop&w=500&q=80' }}" class="w-10 h-10 rounded-lg object-cover">
                                    <div>
                                        <div class="font-bold text-slate-800">{{ $b->nama_barang }}</div>
                                        <div class="text-xs text-slate-400 truncate max-w-xs">{{ $b->deskripsi }}</div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="bg-slate-100 text-slate-700 text-xs font-bold px-2.5 py-1 rounded-lg">
                                        {{ $b->kategori->nama_kategori ?? '-' }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 font-extrabold text-indigo-700">
                                    Rp {{ number_format($b->harga, 0, ',', '.') }}
                                </td>
                                <td class="py-4 px-6">
                                    <span class="font-extrabold px-3 py-1 rounded-lg text-xs {{ $b->stok <= 15 ? 'bg-rose-100 text-rose-700' : 'bg-emerald-100 text-emerald-700' }}">
                                        {{ $b->stok }} Unit
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <button onclick="deleteProduct({{ $b->id }})" class="text-rose-600 hover:text-rose-800 p-2 rounded-lg hover:bg-rose-50 transition">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- TAB 4: ANGGOTA -->
        <section id="content-anggota" class="tab-content hidden">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900">Daftar Anggota Koperasi</h2>
                    <p class="text-sm text-slate-500">Mahasiswa dan Civitas Akademika UKDW terdaftar di Koppa.</p>
                </div>
                <button onclick="openAddMemberModal()" class="bg-sky-600 hover:bg-sky-700 text-white font-bold px-4 py-2 rounded-xl text-sm shadow-md">
                    + Register Anggota Baru
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($anggota as $m)
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm relative hover:shadow-lg transition">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-sky-400 to-indigo-600 text-white flex items-center justify-center font-bold text-lg shadow-md">
                            {{ strtoupper(substr($m->nama, 0, 2)) }}
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-base leading-snug">{{ $m->nama }}</h3>
                            <p class="text-xs text-slate-500">{{ $m->email }}</p>
                        </div>
                    </div>
                    <div class="space-y-2 text-xs text-slate-600 border-t border-slate-100 pt-4">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-phone text-slate-400 w-4"></i>
                            <span>{{ $m->no_hp }}</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fa-solid fa-location-dot text-slate-400 w-4 mt-0.5"></i>
                            <span>{{ $m->alamat ?? 'Alamat belum diisi' }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- TAB 5: DASHBOARD ANALYTICS -->
        <section id="content-dashboard" class="tab-content hidden">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-slate-900">Dashboard & Analitik Koppa UKDW</h2>
                <p class="text-sm text-slate-500">Ringkasan performa penjualan dan status operasional.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                    <h3 class="font-bold text-slate-800 text-base mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation text-amber-500"></i> Peringatan Stok Menipis
                    </h3>
                    <div class="space-y-3">
                        @foreach($barang->where('stok', '<=', 20) as $stk)
                        <div class="flex items-center justify-between p-3 bg-amber-50 rounded-xl border border-amber-200">
                            <div>
                                <span class="font-bold text-slate-800 text-sm block">{{ $stk->nama_barang }}</span>
                                <span class="text-xs text-amber-800">{{ $stk->kategori->nama_kategori ?? '-' }}</span>
                            </div>
                            <span class="bg-amber-600 text-white font-black text-xs px-3 py-1 rounded-lg">
                                Sisa {{ $stk->stok }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                    <h3 class="font-bold text-slate-800 text-base mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-clock-rotate-left text-indigo-500"></i> Aktivitas Pesanan Terbaru
                    </h3>
                    <div class="space-y-3">
                        @foreach($pesanan->take(4) as $p)
                        <div class="flex items-center justify-between p-3 bg-slate-50 rounded-xl">
                            <div>
                                <span class="font-bold text-indigo-700 text-sm block">#ORD-{{ sprintf('%04d', $p->id) }} - {{ $p->anggota->nama ?? 'Anggota' }}</span>
                                <span class="text-xs text-slate-500">{{ $p->created_at ? $p->created_at->diffForHumans() : 'Baru saja' }}</span>
                            </div>
                            <span class="font-extrabold text-slate-800 text-sm">
                                Rp {{ number_format($p->total_harga, 0, ',', '.') }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- SHOPPING CART SLIDE-OVER MODAL -->
    <div id="cart-modal" class="fixed inset-0 z-50 hidden bg-slate-900/60 backdrop-blur-sm flex justify-end">
        <div class="w-full max-w-md bg-white h-full shadow-2xl flex flex-col justify-between p-6 overflow-y-auto">
            <div>
                <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                    <h3 class="font-extrabold text-xl text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-bag-shopping text-indigo-600"></i> Keranjang Belanja
                    </h3>
                    <button onclick="closeCartModal()" class="w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-500">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <!-- Items Container -->
                <div id="cart-items-list" class="py-4 divide-y divide-slate-100">
                    <!-- Dynamic Cart Items -->
                </div>
            </div>

            <!-- Cart Footer & Checkout Form -->
            <div class="border-t border-slate-200 pt-4 space-y-4">
                <div class="space-y-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1">Pilih Anggota Pemesan</label>
                        <select id="cart-anggota-id" class="w-full text-xs p-2.5 rounded-xl border border-slate-300 font-semibold focus:outline-none">
                            @foreach($anggota as $ang)
                            <option value="{{ $ang->id }}">{{ $ang->nama }} ({{ $ang->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1">Pengiriman</label>
                            <select id="cart-pengiriman" class="w-full text-xs p-2.5 rounded-xl border border-slate-300 font-semibold">
                                <option value="ambil">Ambil di Koppa</option>
                                <option value="antar">Antar ke Fakultas</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1">Pembayaran</label>
                            <select id="cart-pembayaran" class="w-full text-xs p-2.5 rounded-xl border border-slate-300 font-semibold">
                                <option value="transfer">Transfer Bank</option>
                                <option value="tunai">Tunai / Cash</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between text-base font-extrabold text-slate-900 pt-2 border-t border-slate-100">
                    <span>Total Pembayaran:</span>
                    <span id="cart-total-price" class="text-indigo-600 text-xl">Rp 0</span>
                </div>

                <button onclick="submitOrder()" class="w-full bg-gradient-to-r from-indigo-600 to-indigo-800 hover:from-indigo-700 hover:to-indigo-900 text-white font-bold py-3 rounded-xl shadow-lg shadow-indigo-500/30 text-sm">
                    Konfirmasi & Buat Pesanan
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL ADD PRODUCT -->
    <div id="add-product-modal" class="fixed inset-0 z-50 hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl">
            <h3 class="font-bold text-xl text-slate-900 mb-4">Tambah Produk Baru</h3>
            <form id="add-product-form" onsubmit="saveProduct(event)" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">Nama Produk</label>
                    <input type="text" name="nama_barang" required class="w-full p-2.5 text-sm border border-slate-300 rounded-xl focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">Kategori</label>
                    <select name="kategori_id" required class="w-full p-2.5 text-sm border border-slate-300 rounded-xl">
                        @foreach($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1">Harga (Rp)</label>
                        <input type="number" name="harga" required min="0" class="w-full p-2.5 text-sm border border-slate-300 rounded-xl">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1">Stok Awal</label>
                        <input type="number" name="stok" required min="0" class="w-full p-2.5 text-sm border border-slate-300 rounded-xl">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">URL Foto (opsional)</label>
                    <input type="url" name="foto" placeholder="https://..." class="w-full p-2.5 text-sm border border-slate-300 rounded-xl">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="w-full p-2.5 text-sm border border-slate-300 rounded-xl"></textarea>
                </div>
                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" onclick="closeAddProductModal()" class="px-4 py-2 text-sm font-bold text-slate-500 hover:bg-slate-100 rounded-xl">Batal</button>
                    <button type="submit" class="px-4 py-2 text-sm font-bold bg-indigo-600 text-white rounded-xl shadow-md hover:bg-indigo-700">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript Functions -->
    <script>
        let cart = [];

        function switchTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('bg-white', 'text-indigo-950', 'shadow-md');
                btn.classList.add('text-indigo-100');
            });

            document.getElementById('content-' + tabId).classList.remove('hidden');
            const activeBtn = document.getElementById('tab-' + tabId);
            if (activeBtn) {
                activeBtn.classList.add('bg-white', 'text-indigo-950', 'shadow-md');
                activeBtn.classList.remove('text-indigo-100');
            }
        }

        function filterCategory(catId) {
            document.querySelectorAll('.cat-pill').forEach(btn => {
                btn.classList.remove('bg-indigo-600', 'text-white', 'shadow-md');
                btn.classList.add('bg-white', 'text-slate-600');
            });
            event.currentTarget.classList.add('bg-indigo-600', 'text-white', 'shadow-md');

            const cards = document.querySelectorAll('.product-card');
            cards.forEach(card => {
                if (catId === 'all' || card.dataset.category === catId) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }

        function filterProducts() {
            const query = document.getElementById('search-input').value.toLowerCase();
            const cards = document.querySelectorAll('.product-card');
            cards.forEach(card => {
                const name = card.dataset.name;
                if (name.includes(query)) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }

        function addToCart(id, name, price, maxStok) {
            const existing = cart.find(item => item.id === id);
            if (existing) {
                if (existing.qty < maxStok) {
                    existing.qty += 1;
                } else {
                    alert('Stok maksimum tercapai!');
                }
            } else {
                cart.push({ id, name, price, qty: 1, maxStok });
            }
            updateCartUI();
        }

        function updateCartUI() {
            const badge = document.getElementById('cart-badge');
            const totalItems = cart.reduce((sum, i) => sum + i.qty, 0);
            badge.innerText = totalItems;

            const list = document.getElementById('cart-items-list');
            list.innerHTML = '';

            let grandTotal = 0;
            if (cart.length === 0) {
                list.innerHTML = `<div class="text-center py-8 text-slate-400 text-sm">Keranjang masih kosong</div>`;
            } else {
                cart.forEach((item, idx) => {
                    const sub = item.price * item.qty;
                    grandTotal += sub;
                    list.innerHTML += `
                        <div class="py-3 flex items-center justify-between">
                            <div>
                                <div class="font-bold text-slate-800 text-sm">${item.name}</div>
                                <div class="text-xs text-indigo-600 font-semibold">Rp ${item.price.toLocaleString('id-ID')}</div>
                            </div>
                            <div class="flex items-center gap-2">
                                <button onclick="changeQty(${idx}, -1)" class="w-6 h-6 rounded bg-slate-100 font-bold text-xs">-</button>
                                <span class="font-bold text-sm w-4 text-center">${item.qty}</span>
                                <button onclick="changeQty(${idx}, 1)" class="w-6 h-6 rounded bg-slate-100 font-bold text-xs">+</button>
                            </div>
                        </div>
                    `;
                });
            }

            document.getElementById('cart-total-price').innerText = 'Rp ' + grandTotal.toLocaleString('id-ID');
        }

        function changeQty(idx, delta) {
            cart[idx].qty += delta;
            if (cart[idx].qty <= 0) {
                cart.splice(idx, 1);
            }
            updateCartUI();
        }

        function openCartModal() {
            document.getElementById('cart-modal').classList.remove('hidden');
        }

        function closeCartModal() {
            document.getElementById('cart-modal').classList.add('hidden');
        }

        function openAddProductModal() {
            document.getElementById('add-product-modal').classList.remove('hidden');
        }

        function closeAddProductModal() {
            document.getElementById('add-product-modal').classList.add('hidden');
        }

        async function submitOrder() {
            if (cart.length === 0) {
                alert('Keranjang belanja masih kosong!');
                return;
            }

            const anggota_id = document.getElementById('cart-anggota-id').value;
            const pengiriman = document.getElementById('cart-pengiriman').value;
            const pembayaran = document.getElementById('cart-pembayaran').value;

            const payload = {
                anggota_id: anggota_id,
                pengiriman: pengiriman,
                pembayaran: pembayaran,
                items: cart.map(i => ({ barang_id: i.id, jumlah: i.qty }))
            };

            const response = await fetch('/api/pesanan', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(payload)
            });

            const res = await response.json();
            if (res.success) {
                alert('Pesanan berhasil dibuat! ID: #ORD-' + String(res.data.id).padStart(4, '0'));
                cart = [];
                updateCartUI();
                closeCartModal();
                window.location.reload();
            }
        }

        async function updateOrderStatus(id, newStatus) {
            const response = await fetch(`/api/pesanan/${id}/status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ status: newStatus })
            });
            const res = await response.json();
            if (res.success) {
                window.location.reload();
            }
        }

        async function saveProduct(e) {
            e.preventDefault();
            const form = e.target;
            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());

            const response = await fetch('/api/barang', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(data)
            });

            const res = await response.json();
            if (res.success) {
                alert('Produk berhasil ditambahkan!');
                closeAddProductModal();
                window.location.reload();
            }
        }

        async function deleteProduct(id) {
            if (!confirm('Apakah anda yakin ingin menghapus produk ini?')) return;
            const response = await fetch(`/api/barang/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });
            const res = await response.json();
            if (res.success) {
                window.location.reload();
            }
        }
    </script>
</body>
</html>
