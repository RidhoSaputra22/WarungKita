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
            $table->foreignUuid('id_menu_222339')->constrained("menus_222339", "id_menu_222339")->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('id_user_222339')->constrained("users_222339", "id_user_222339")->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('menus_222339', function(Blueprint $table) {
            $table->foreignUuid('id_kategori_222339')->constrained("categories_222339", "id_kategori_222339")->onUpdate('cascade')->onDelete('cascade');

        });
        Schema::table('komentars_222339', function($table) {
            $table->foreignUuid('id_menu_222339')->constrained("menus_222339", "id_menu_222339")->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('id_user_222339')->constrained("users_222339", "id_user_222339")->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('pesanan_222339', function($table) {
            $table->foreignUuid('id_driver_222339')->constrained("users_222339", "id_user_222339")->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('id_user_222339')->constrained("users_222339", "id_user_222339")->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('kode_222339')->constrained("carts_222339", "kode_222339")->onUpdate('cascade')->onDelete('cascade');
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
