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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nomor_peserta')->unique();
            $table->string('jurusan');
            $table->string('tahun'); // Sesuai desain: 2024
            
            // Detail Penempatan
            $table->string('instansi');         // Contoh: 6474 - Pemerintah Kota Jakarta Pusat
            $table->string('kode_instansi');    // Contoh: 474
            $table->string('jenis_formasi');    // Contoh: 1 - UMUM
            $table->string('jabatan_formasi');  // Contoh: JP4291350 - PENATA KELOLA...
            $table->text('lokasi_formasi');     // Lokasi lengkap
            
            // Nilai
            $table->integer('twk');
            $table->integer('tiu');
            $table->integer('tkp');
            $table->integer('total_skor');
            
            // Status
            $table->string('keterangan'); // TMS, P/L, P, TL, DIS, TH
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
