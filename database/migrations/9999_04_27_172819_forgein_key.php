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

        Schema::table('carts_222339', function(Blueprint $table) {
            $table->foreign('222339_id_menu')->references('222339_id_menu')->on('menus_222339')->onDelete('cascade');
            $table->foreign('222339_id_user')->references('222339_id_user')->on('users_222339')->onDelete('cascade');
        });

        Schema::table('komentars_222339', function($table) {
            $table->foreign('222339_id_menu')->references('222339_id_menu')->on('menus_222339')->onDelete('cascade');
            $table->foreign('222339_id_user')->references('222339_id_user')->on('users_222339')->onDelete('cascade');
        });

        Schema::table('pesanan_222339', function($table) {
            $table->foreign('222339_id_driver')->references('222339_id_user')->on('users_222339')->onDelete('cascade');
            $table->foreign('222339_kode')->references('222339_kode')->on('carts_222339')->onDelete('cascade');
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
