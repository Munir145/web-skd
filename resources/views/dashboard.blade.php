@extends('layouts.app')

@section('content')
<div class="container-custom">
    <h1 class="judul-halaman">Dashboard Analitik SKD</h1>
    <p class="sub-judul">Data Real-Time Berdasarkan Keputusan Menpan RB No 321 Tahun 2024</p>

    <div class="dash-grid" style="grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));">
        <div class="card-stat" style="border-left: 4px solid #10b981;">
            <div>
                <p class="stat-label">P/L (Lulus SKB)</p>
                <h3 class="stat-value">{{ number_format($stats['PL']) }}</h3>
            </div>
        </div>
        <div class="card-stat" style="border-left: 4px solid #3b82f6;">
            <div>
                <p class="stat-label">P (Passing Grade)</p>
                <h3 class="stat-value">{{ number_format($stats['P']) }}</h3>
            </div>
        </div>
        <div class="card-stat" style="border-left: 4px solid #f43f5e;">
            <div>
                <p class="stat-label">TL (Tidak Lulus)</p>
                <h3 class="stat-value">{{ number_format($stats['TL']) }}</h3>
            </div>
        </div>
        <div class="card-stat" style="border-left: 4px solid #94a3b8;">
            <div>
                <p class="stat-label">TH (Tidak Hadir)</p>
                <h3 class="stat-value">{{ number_format($stats['TH']) }}</h3>
            </div>
        </div>
        <div class="card-stat" style="border-left: 4px solid #f59e0b;">
            <div>
                <p class="stat-label">TMS (Gugur Syarat)</p>
                <h3 class="stat-value">{{ number_format($stats['TMS']) }}</h3>
            </div>
        </div>
        <div class="card-stat" style="border-left: 4px solid #000000;">
            <div>
                <p class="stat-label">DIS (Diskualifikasi)</p>
                <h3 class="stat-value">{{ number_format($stats['DIS']) }}</h3>
            </div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 32px; margin-top: 32px;">
        
        <div class="card-grafik">
            <h4 class="title-grafik">Perbandingan Kuantitas Data</h4>
            <div class="bar-chart-container" style="height: 300px; display: flex; align-items: flex-end; gap: 15px; padding: 20px; border-bottom: 2px solid #f1f5f9; position: relative;">
                
                @php 
                    // Ambil angka tertinggi dari semua data buat jadi patokan 100%
                    $maxVal = max($stats) > 0 ? max($stats) : 1; 
                @endphp
                
                @foreach($stats as $key => $val)
                @php 
                    $color = [
                        'PL' => '#10b981', 'P' => '#3b82f6', 'TL' => '#f43f5e', 
                        'TH' => '#94a3b8', 'TMS' => '#f59e0b', 'DIS' => '#000000'
                    ][$key];
                    
                    // 🔥 Hitung Persentase Tinggi Berdasarkan Nilai Maksimal
                    $heightPercentage = ($val / $maxVal) * 100;
                @endphp
                
                <div style="flex: 1; display: flex; flex-direction: column; align-items: center; gap: 10px; position: relative; height: 100%; justify-content: flex-end;">
                    <span style="font-size: 11px; font-weight: bold; color: #64748b;">{{ number_format($val) }}</span>
                    
                    <div style="width: 100%; background: {{ $color }}; height: {{ $heightPercentage }}%; border-radius: 4px 4px 0 0; transition: height 0.5s ease-out; cursor: pointer;" title="{{ $key }}: {{ $val }} Data"></div>
                    
                    <span style="font-size: 12px; font-weight: 800; color: #1e293b;">{{ $key }}</span>
                </div>
                @endforeach
                
            </div>
        </div>

        <div class="card-grafik" style="display: flex; flex-direction: column; align-items: center;">
            <h4 class="title-grafik" style="align-self: flex-start; margin-bottom: 20px;">Proporsi Status Kelulusan</h4>

            @php
                // 1. Filter data yang hanya ada isinya (> 0)
                $filteredData = [];
                $colors = ['PL' => '#10b981', 'P' => '#3b82f6', 'TL' => '#f43f5e', 'TH' => '#94a3b8', 'TMS' => '#f59e0b', 'DIS' => '#000000'];
                
                foreach($stats as $key => $val) {
                    if($val > 0) {
                        $filteredData[] = [
                            'label' => $key,
                            'val' => $val,
                            'color' => $colors[$key],
                            'percent' => ($val / $total) * 100
                        ];
                    }
                }

                // Buat string gradient
                $currentDeg = 0;
                $gradientSteps = [];
                foreach ($filteredData as $data) {
                    $deg = ($data['percent'] / 100) * 360;
                    $gradientSteps[] = $data['color'] . " " . $currentDeg . "deg " . ($currentDeg + $deg) . "deg";
                    $currentDeg += $deg;
                }
                $finalGradient = implode(', ', $gradientSteps);
            @endphp

            <div style="position: relative; width: 280px; height: 280px; border-radius: 50%; background: conic-gradient({{ $finalGradient }}); box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                
                @php $runningDeg = 0; @endphp
                @foreach($filteredData as $data)
                    @php
                        $midAngle = $runningDeg + (($data['percent'] / 100) * 360) / 2;
                        $runningDeg += ($data['percent'] / 100) * 360;
                        
                        // Geser posisi teks ke tengah potongan (radius 70px dari pusat)
                        $distance = 75; 
                        $top = 50 + ($distance * sin(deg2rad($midAngle - 90))) / 2.8;
                        $left = 50 + ($distance * cos(deg2rad($midAngle - 90))) / 2.8;
                    @endphp
                    
                    <div style="position: absolute; top: {{ $top }}%; left: {{ $left }}%; transform: translate(-50%, -50%); color: white; text-align: center; pointer-events: none;">
                        <span style="display: block; font-size: 14px; font-weight: 800; text-shadow: 1px 1px 4px rgba(0,0,0,0.5);">
                            {{ $data['label'] }}
                        </span>
                        <span style="font-size: 12px; font-weight: 600; text-shadow: 1px 1px 4px rgba(0,0,0,0.5);">
                            {{ round($data['percent']) }}%
                        </span>
                    </div>
                @endforeach
            </div>

            <div style="margin-top: 40px; display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
                @foreach($filteredData as $d)
                <div style="display: flex; align-items: center; gap: 8px; font-size: 13px; color: #475569;">
                    <div style="width: 12px; height: 12px; background: {{ $d['color'] }}; border-radius: 3px;"></div>
                    <span style="font-weight: 700;">{{ $d['label'] }}:</span> {{ number_format($d['val']) }} Data
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection