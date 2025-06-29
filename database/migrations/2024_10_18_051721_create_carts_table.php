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
        Schema::create('carts_222339', function (Blueprint $table) {
            $table->uuid('id_carts_222339')->primary();
            $table->string('kode_222339')->index();
            $table->integer('jumlah_222339');
            $table->double('total_222339');
            $table->string('status_222339');
            $table->string('tanggal_222339');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts_222339');
    }
};
