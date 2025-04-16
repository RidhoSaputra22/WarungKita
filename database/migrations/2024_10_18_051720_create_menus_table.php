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
        Schema::create('menus_222118', function (Blueprint $table) {
            $table->id('222118_id_menu');
            $table->unsignedBigInteger('222118_id_kategori');
            $table->string('222118_nama');
            $table->string('222118_deskripsi')->nullable();
            $table->string('222118_harga');
            $table->integer('222118_stok');
            $table->string('222118_foto');
            $table->timestamps();

            $table->foreign('222118_id_kategori')->references('222118_id_kategori')->on('categories_222118')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus_222118');
    }
};
