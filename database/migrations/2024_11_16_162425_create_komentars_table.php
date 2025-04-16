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
        Schema::create('komentars_222118', function (Blueprint $table) {
            $table->id('222118_id_komentar');
            $table->unsignedBigInteger('222118_id_user');
            $table->unsignedBigInteger('222118_id_menu');
            $table->text('222118_komentar');
            $table->timestamps();

            $table->foreign('222118_id_menu')->references('222118_id_menu')->on('menus_222118')->onDelete('cascade');
            $table->foreign('222118_id_user')->references('id_user_222118')->on('users_222118')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};
