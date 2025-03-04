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
        Schema::create('exemplar', function (Blueprint $table) {
            $table->string('kode_eksemplar')->primary();
            $table->string('lokasi');
            $table->string('lokasi_rak');
            $table->string('tipe_koleksi');
            $table->string('status');
            $table->string('id_buku');
            $table->foreign('id_buku')->references('id_buku')->on('buku')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exemplar');
    }
};
