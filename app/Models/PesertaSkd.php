<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaSkd extends Model
{
    use HasFactory;

    // Ini wajib biar kita bisa masukin data CSV banyak sekaligus
    protected $fillable = [
        'no_peserta',
        'nama',
        'pendidikan',
        'tahun',
        'twk',
        'tiu',
        'tkp',
        'total',
        'keterangan',
        'instansi',
        'jabatan',
        'lokasi',
        'jenis',
    ];
}