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
        Schema::create('pesanan_222118', function (Blueprint $table) {
            $table->id("id_pesanan_222118");
            $table->unsignedBigInteger("id_driver_222118");
            $table->string("kode_222118");
            $table->string("konfirmasi_pelanggan_222118");
            $table->string("konfirmasi_driver_222118");
            $table->text("foto_konfirmasi_222118");
            $table->timestamps();


            $table->foreign('id_driver_222118')->references('id_user_222118')->on('users_222118')->onDelete('cascade');
            $table->foreign('kode_222118')->references('kode_222118')->on('carts_222118')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
