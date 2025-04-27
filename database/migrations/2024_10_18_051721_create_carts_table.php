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
            $table->id('222339_id_carts');
            $table->unsignedBigInteger('222339_id_menu');
            $table->unsignedBigInteger('222339_id_user');
            $table->string('222339_kode')->index();
            $table->integer('222339_jumlah');
            $table->double('222339_total');
            $table->string('222339_status');
            $table->string('222339_tanggal');
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
