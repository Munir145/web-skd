@extends('layouts.app')

@section('content')
<div class="container-custom">
    <div class="hero-wrapper">
        
        <div class="hero-text-content">
            <span class="tagline-biru">Sistem Informasi SKD CPNS</span>
            <h1 class="judul-besar">Portal Hasil Seleksi Kompetensi Dasar Kota Semarang</h1>
            <p class="deskripsi-hero">
                Akses hasil Seleksi Kompetensi Dasar (SKD) CPNS secara transparan dan akurat. 
                Platform resmi berdasarkan Keputusan Menpan RB No 321 Tahun 2024.
            </p>
            
            <div class="hero-buttons">
                <a href="/cari-data" class="btn-primary">Cari Data Peserta →</a>
                <a href="/dashboard" class="btn-secondary">Lihat Dashboard</a>
            </div>

            <div style="margin-top: 32px; color: #10b981; font-weight: 500; font-size: 14px;">
                ✓ Data terverifikasi dan akurat
            </div>
        </div>

        <div class="hero-stats-grid">
            <div class="card-hero-blue" style="margin-top: 40px;">
                <p style="opacity: 0.8; font-size: 14px; margin: 0;">Total Peserta</p>
                <h2 style="font-size: 32px; margin: 8px 0 0 0;">{{ number_format($totalPeserta, 0, ',', '.') }}</h2>
            </div>
            
            <div class="card-hero-light">
                <p style="opacity: 0.8; font-size: 14px; margin: 0;">Kehadiran</p>
                <h2 style="font-size: 32px; margin: 8px 0 0 0;">100%</h2> </div>
            
            <div class="card-hero-light card-full">
                <p style="opacity: 0.8; font-size: 14px; margin: 0;">Memenuhi Passing Grade (P/L)</p>
                <h2 style="font-size: 40px; margin: 8px 0 0 0;">{{ number_format($lulusPG, 0, ',', '.') }}</h2>
            </div>
        </div>

    </div>
</div>
@endsection