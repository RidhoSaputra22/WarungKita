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
            $table->uuid("id_pesanan_222339")->primary();
            $table->string("konfirmasi_pelanggan_222339");
            $table->string("konfirmasi_driver_222339");
            $table->text("foto_konfirmasi_222339");
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
