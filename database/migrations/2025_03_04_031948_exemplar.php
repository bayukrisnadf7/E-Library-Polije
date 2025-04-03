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
            $table->string('nomor_panggil')->nullable();
            $table->string('tipe_koleksi')->nullable();
            $table->date('tanggal_penerimaan')->nullable();
            $table->string('lokasi')->nullable();
            $table->date('tanggal_pemesanan')->nullable();
            $table->string('status')->nullable();
            $table->string('lokasi_rak')->nullable();
            $table->date('tanggal_faktur')->nullable();
            $table->unsignedBigInteger('id_buku'); // Cocokin dengan buku

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
