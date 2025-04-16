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
        Schema::create('users_222118', function (Blueprint $table) {
            $table->id('id_user_222118');
            $table->string('nama_222118');
            $table->string('alamat_222118');
            $table->string('hp_222118');
            $table->string('foto_222118')->nullable();
            $table->string('role_222118');
            $table->string('username_222118');
            $table->string('password_222118');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
