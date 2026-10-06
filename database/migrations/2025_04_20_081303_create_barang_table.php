<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('barang', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('kategori_id');
        $table->string('nama_barang', 100);
        $table->integer('stok');
        $table->decimal('harga', 12, 2);
        $table->text('deskripsi')->nullable();
        $table->string('foto')->nullable();
        $table->timestamps();

        $table->foreign('kategori_id')->references('id')->on('kategori_barang')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
