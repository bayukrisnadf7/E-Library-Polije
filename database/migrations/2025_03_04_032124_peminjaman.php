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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->date('tgl_peminjaman');
            $table->date('tgl_pengembalian');
            $table->string('status_peminjaman');
            $table->string('barcode_peminjaman');
            $table->string('kode_eksemplar');
            $table->string('id_user');
            $table->foreign('kode_eksemplar')->references('kode_eksemplar')->on('exemplar')->onDelete('cascade');            
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
