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
