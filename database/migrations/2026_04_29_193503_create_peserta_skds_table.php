<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peserta_skds', function (Blueprint $table) {
            $table->id();
            // Pakai string karena nomor peserta itu panjang banget, kalau integer bisa error
            $table->string('no_peserta')->unique(); 
            $table->string('nama');
            $table->string('pendidikan');
            $table->string('tahun', 4);
            $table->integer('twk');
            $table->integer('tiu');
            $table->integer('tkp');
            $table->integer('total');
            $table->string('keterangan', 10); // Buat nampung P/L, P, TL, dll
            $table->string('instansi');
            $table->string('jabatan');
            $table->text('lokasi'); // Pakai text karena nama lokasi instansi biasanya panjang
            $table->string('jenis'); // Buat UMUM, CUMLAUDE, dll
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peserta_skds');
    }
};