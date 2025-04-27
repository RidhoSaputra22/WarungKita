<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan_222339', function (Blueprint $table) {
            $table->id("222339_id_pesanan");
            $table->unsignedBigInteger("222339_id_driver");
            $table->string("222339_kode");
            $table->string("222339_konfirmasi_pelanggan");
            $table->string("222339_konfirmasi_driver");
            $table->text("222339_foto_konfirmasi");
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_222339');
    }
};
