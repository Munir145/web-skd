<?php

use App\Models\Peserta;
use App\Models\PesertaSkd;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () { return view('welcome'); });

Route::get('/dashboard', function () {
    // 1. Total Peserta
    $total = PesertaSkd::count();

    // 2. Data Pendidikan (Top 5)
    $pendidikanData = PesertaSkd::select('pendidikan', DB::raw('count(*) as total'))
        ->groupBy('pendidikan')
        ->orderBy('total', 'desc')
        ->take(5)
        ->get();

    // 3. Hitung Data Berdasarkan Status Menpan RB
    $stats = [
        'PL'  => PesertaSkd::where('keterangan', 'P/L')->count(),
        'P'   => PesertaSkd::where('keterangan', 'P')->count(),
        'TL'  => PesertaSkd::where('keterangan', 'TL')->count(),
        'TH'  => PesertaSkd::where('keterangan', 'TH')->count(),
        'TMS' => PesertaSkd::where('keterangan', 'TMS')->count(),
        'DIS' => PesertaSkd::where('keterangan', 'DIS')->count(),
    ];

    return view('dashboard', compact('total', 'pendidikanData', 'stats'));
});

Route::get('/cari-data', function () { 
    return view('cari-data', ['pesertas' => Peserta::all()]); 
});

Route::get('/kontak', function () { return view('kontak'); });

Route::get('/', function () {
    // Hitung total peserta beneran dari database
    $totalPeserta = PesertaSkd::count();
    
    // Hitung yang lulus passing grade (keterangan ada 'P/L' atau 'P')
    // Asumsi: 'P/L' adalah kode lulus di data ente
    $lulusPG = PesertaSkd::where('keterangan', 'LIKE', 'P%')->count();

    return view('welcome', compact('totalPeserta', 'lulusPG'));
});

// Update juga route cari-data biar pakai Model yang bener
Route::get('/cari-data', function () { 
    return view('cari-data', ['pesertas' => PesertaSkd::paginate(50)]); 
});

Route::get('/peserta/{id}', function ($id) {
    $peserta = PesertaSkd::findOrFail($id); // Cari data, kalau gak ada lari ke 404
    return view('detail-peserta', compact('peserta'));
});
