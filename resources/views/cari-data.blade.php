@extends('layouts.app')

@section('content')
<div class="container-custom">
    <h1 class="judul-halaman">Daftar Hasil Seleksi Kompetensi Dasar</h1>
    <p class="sub-judul">Data lengkap peserta SKD CPNS Tahun 2024</p>

    <div class="search-wrapper">
        <input type="text" placeholder="Cari Nama, Nomor, atau Jurusan..." class="input-pencarian">
        
        <select class="select-filter">
            <option>Semua Status</option>
            <option>P/L</option>
            <option>TL</option>
        </select>
        
        <select class="select-filter">
            <option>Semua Jurusan</option>
        </select>
    </div>

    <div class="tabel-container">
        <table class="tabel-skd">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Peserta</th>
                    <th>Nomor Peserta</th>
                    <th>Jurusan/Program Studi</th>
                    <th>Total Nilai</th>
                    <th style="text-align: center;">Keterangan</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesertas as $index => $p)
                <tr>
                    <td>{{ $pesertas->firstItem() + $index }}</td> 
                    <td style="font-weight: bold; color: #0f172a;">{{ $p->nama }}</td>
                    <td style="font-size: 12px; font-family: monospace;">{{ $p->no_peserta }}</td>
                    <td>{{ $p->pendidikan }}</td> <td style="font-weight: bold;">{{ $p->total }}</td> <td style="text-align: center;">
                        <span class="badge {{ $p->keterangan == 'P/L' ? 'badge-lulus' : 'badge-gagal' }}">
                            {{ $p->keterangan }}
                        </span>
                    </td>
                    <td style="text-align: center;">
                        <a href="/peserta/{{ $p->id }}" class="btn-detail" style="text-decoration: none; display: inline-block;">
                            👁 Lihat Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection