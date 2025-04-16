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
        Schema::create('carts_222118', function (Blueprint $table) {
            $table->id('id_carts_222118');
            $table->unsignedBigInteger('id_menu_222118');
            $table->unsignedBigInteger('id_user_222118');
            $table->string('kode_222118')->index();
            $table->integer('jumlah_222118');
            $table->double('total_222118');
            $table->string('status_222118');
            $table->string('tanggal_222118');
            $table->timestamps();

            // Add the foreign key constraint
            $table->foreign('id_menu_222118')->references('222118_id_menu')->on('menus_222118')->onDelete('cascade');
            $table->foreign('id_user_222118')->references('id_user_222118')->on('users_222118')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts_222118');
    }
};
