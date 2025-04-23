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
            $table->id('222339_id_user');
            $table->string('222339_nama');
            $table->string('222339_alamat');
            $table->string('222339_hp');
            $table->string('222339_foto')->nullable();
            $table->string('222339_role');
            $table->string('222339_username');
            $table->string('222339_password');
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
