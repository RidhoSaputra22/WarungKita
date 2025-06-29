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
        Schema::create('menus_222339', function (Blueprint $table) {
            $table->uuid('id_menu_222339')->primary();
            $table->string('nama_222339');
            $table->string('deskripsi_222339')->nullable();
            $table->string('harga_222339');
            $table->integer('stok_222339');
            $table->string('foto_222339');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus_222339');
    }
};
