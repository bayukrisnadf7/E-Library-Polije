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
        Schema::create('buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('ISBN');
            $table->string('judul_buku');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->string('tempat_penerbit');
            $table->year('tahun_terbit');
            $table->string('edisi');
            $table->string('bahasa');
            $table->string('subyek');
            $table->string('deskripsi_fisik');
            $table->string('judul_seri');
            $table->text('abstrak');
            $table->string('cover');
            $table->string('gmd');
            $table->string('no_panggil');
            $table->string('klasifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
