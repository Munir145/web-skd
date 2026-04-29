@extends('layouts.app')

@section('content')
<div class="container-custom">
    <div style="margin-bottom: 20px;">
        <a href="/cari-data" style="text-decoration: none; color: #64748b; font-weight: 500;">← Kembali ke Daftar</a>
    </div>

    <div class="card-detail" style="background: white; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05);">
        <div style="background: #1e3a8a; padding: 30px; color: white;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
                <div>
                    <h1 style="margin: 0; font-size: 24px;">{{ $peserta->nama }}</h1>
                    <p style="margin: 5px 0 0 0; opacity: 0.8;">{{ $peserta->no_peserta }}</p>
                </div>
                <div style="background: rgba(255,255,255,0.2); padding: 10px 20px; border-radius: 8px; backdrop-filter: blur(5px);">
                    <span style="font-size: 14px; display: block; opacity: 0.8;">Total Skor</span>
                    <span style="font-size: 28px; font-weight: 800;">{{ $peserta->total }}</span>
                </div>
            </div>
        </div>

        <div style="padding: 30px;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
                <div>
                    <h3 style="color: #1e3a8a; border-bottom: 2px solid #f1f5f9; padding-bottom: 10px;">Rincian Nilai</h3>
                    <div style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
                        <div style="display: flex; justify-content: space-between; padding: 10px; background: #f8fafc; border-radius: 8px;">
                            <span>TWK</span>
                            <span style="font-weight: 700;">{{ $peserta->twk }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; padding: 10px; background: #f8fafc; border-radius: 8px;">
                            <span>TIU</span>
                            <span style="font-weight: 700;">{{ $peserta->tiu }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; padding: 10px; background: #f8fafc; border-radius: 8px;">
                            <span>TKP</span>
                            <span style="font-weight: 700;">{{ $peserta->tkp }}</span>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 style="color: #1e3a8a; border-bottom: 2px solid #f1f5f9; padding-bottom: 10px;">Informasi Formasi</h3>
                    <div style="margin-top: 20px; font-size: 14px; color: #475569; display: flex; flex-direction: column; gap: 10px;">
                        <p><strong>Jabatan:</strong><br>{{ $peserta->jabatan }}</p>
                        <p><strong>Instansi:</strong><br>{{ $peserta->instansi }}</p>
                        <p><strong>Lokasi:</strong><br>{{ $peserta->lokasi }}</p>
                        <p><strong>Pendidikan:</strong><br>{{ $peserta->pendidikan }}</p>
                        <p><strong>Jenis Formasi:</strong><br>{{ $peserta->jenis }}</p>
                    </div>
                </div>
            </div>
            
            <div style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #f1f5f9; text-align: center;">
                <span class="badge {{ $peserta->keterangan == 'P/L' ? 'badge-lulus' : 'badge-gagal' }}" style="padding: 12px 30px; font-size: 16px;">
                    HASIL AKHIR: {{ $peserta->keterangan }}
                </span>
            </div>
        </div>
    </div>
</div>
@endsection