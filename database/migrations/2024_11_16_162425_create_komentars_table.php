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
        Schema::create('komentars_222339', function (Blueprint $table) {
            $table->id('222339_id_komentar');
            $table->unsignedBigInteger('222339_id_user');
            $table->unsignedBigInteger('222339_id_menu');
            $table->text('222339_komentar');
            $table->timestamps();

            $table->foreign('222339_id_menu')->references('222339_id_menu')->on('menus_222339')->onDelete('cascade');
            $table->foreign('222339_id_user')->references('222339_id_user')->on('users_222339')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentars_222339');
    }
};
