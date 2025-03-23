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
            $table->string('ISBN')->nullable();
            $table->string('judul_buku', 500); // Diperpanjang agar cukup untuk judul panjang
            $table->string('pengarang', 500)->nullable();
            $table->string('penerbit', 500)->nullable();
            $table->string('tempat_penerbit', 255)->nullable();
            $table->year('tahun_terbit')->nullable();
            $table->string('edisi', 100)->nullable();
            $table->string('bahasa', 100);
            $table->string('subyek', 255)->nullable();
            $table->string('deskripsi_fisik', 255)->nullable();
            $table->string('judul_seri', 255)->nullable();
            $table->text('abstrak')->nullable();
            $table->string('cover', 255)->nullable();
            $table->string('gmd', 100)->nullable();
            $table->string('no_panggil', 100)->nullable();
            $table->string('klasifikasi', 100)->nullable();
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
