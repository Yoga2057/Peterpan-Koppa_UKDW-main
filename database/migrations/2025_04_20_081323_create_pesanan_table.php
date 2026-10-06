<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('pesanan', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('anggota_id');
        $table->enum('pengiriman', ['ambil', 'antar']);
        $table->enum('pembayaran', ['tunai', 'transfer']);
        $table->enum('status', ['proses', 'siap', 'dikirim', 'selesai'])->default('proses');
        $table->timestamps();

        $table->foreign('anggota_id')->references('id')->on('anggota')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
