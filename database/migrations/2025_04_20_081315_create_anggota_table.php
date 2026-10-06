<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('anggota', function (Blueprint $table) {
        $table->id();
        $table->string('nama', 100);
        $table->string('email')->unique();
        $table->string('no_hp', 20);
        $table->string('alamat')->nullable();
        $table->string('password');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}
