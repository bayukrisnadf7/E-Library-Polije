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
        Schema::create('request_perpanjangan', function (Blueprint $table) {
            $table->string('id_request')->primary();
            $table->date('tanggal_request');
            $table->date('tanggal_baru');
            $table->string('status');
            $table->unsignedBigInteger('id_peminjaman'); // harus unsigned
            $table->foreign('id_peminjaman')->references('id_peminjaman')->on('peminjaman')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_perpanjangan');
    }
};
