<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('detail_pesanan', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pesanan_id');
        $table->unsignedBigInteger('barang_id');
        $table->integer('jumlah');
        $table->decimal('harga_satuan', 12, 2);
        $table->timestamps();

        $table->foreign('pesanan_id')->references('id')->on('pesanan')->onDelete('cascade');
        $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pesanan');
    }
}
