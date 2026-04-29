<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Peserta::create([
            'nama' => 'Hana Permata',
            'nomor_peserta' => '2024-SKD-000001',
            'jurusan' => 'Perikanan',
            'tahun' => '2024',
            'instansi' => '6474 - Pemerintah Kota Jakarta Pusat',
            'kode_instansi' => '474',
            'jenis_formasi' => '1 - UMUM',
            'jabatan_formasi' => 'JP4291350 - PENATA KELOLA SISTEM DAN TEKNOLOGI INFORMASI',
            'lokasi_formasi' => 'Pemerintah Kota Jakarta Pusat | Badan Pengelolaan Keuangan Daerah',
            'twk' => 58,
            'tiu' => 60,
            'tkp' => 123,
            'total_skor' => 241,
            'keterangan' => 'TMS'
        ]);
    }
}
