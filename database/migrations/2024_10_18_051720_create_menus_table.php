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
            $table->id('222339_id_menu');
            $table->unsignedBigInteger('222339_id_kategori');
            $table->string('222339_nama');
            $table->string('222339_deskripsi')->nullable();
            $table->string('222339_harga');
            $table->integer('222339_stok');
            $table->string('222339_foto');
            $table->timestamps();

            $table->foreign('222339_id_kategori')->references('222339_id_kategori')->on('categories_222339')->onDelete('cascade');

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
