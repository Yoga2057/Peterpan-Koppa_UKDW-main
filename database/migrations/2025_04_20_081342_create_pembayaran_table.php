<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('pembayaran', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pesanan_id');
        $table->string('bukti_transfer')->nullable();
        $table->enum('status', ['belum dibayar', 'menunggu verifikasi', 'lunas'])->default('belum dibayar');
        $table->timestamps();

        $table->foreign('pesanan_id')->references('id')->on('pesanan')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
