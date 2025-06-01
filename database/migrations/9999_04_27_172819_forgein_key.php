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
        //
        Schema::table('carts_222339', function (Blueprint $table) {
            $table->string('nama_menu_222339');
            $table->string('username_222339');
            $table->foreign('nama_menu_222339')->references('nama_222339')->on('menus_222339');
            $table->foreign('username_222339')->references('username_222339')->on('users_222339');
        });

        Schema::table('menus_222339', function (Blueprint $table) {
            $table->string('kategori_222339');
            $table->foreign('kategori_222339')
                ->references('kategori_222339')->on('categories_222339')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('komentars_222339', function (Blueprint $table) {
            $table->string('nama_menu_222339');
            $table->string('username_222339');
            $table->foreign('nama_menu_222339')
                ->references('nama_222339')->on('menus_222339')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('username_222339')
                ->references('username_222339')->on('users_222339')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('pesanan_222339', function (Blueprint $table) {
            $table->string('driver_222339');
            $table->string('user_222339');
            $table->string('kode_222339');
            $table->foreign('driver_222339')
                ->references('username_222339')->on('users_222339')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_222339')
                ->references('username_222339')->on('users_222339')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kode_222339')
                ->references('kode_222339')->on('carts_222339')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
