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
        Schema::create('users_222339', function (Blueprint $table) {
            $table->uuid('id_user_222339')->primary();
            $table->string('nama_222339');
            $table->string('alamat_222339');
            $table->string('hp_222339');
            $table->string('foto_222339')->nullable();
            $table->string('role_222339');
            $table->string('username_222339');
            $table->string('email')->nullable();
            $table->string('password_222339');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_222339');
    }
};
