@extends('layouts.app')

@section('content')
<div class="container-custom kontak-container">
    <h1 class="judul-halaman">Hubungi Kami</h1>
    <p class="sub-judul">Punya pertanyaan seputar SKD? Tim kami siap menjawab.</p>

    <div class="kontak-grid-top">
        <div class="card-kontak-info">
            <div class="icon-lingkaran" style="background-color: #eff6ff;">📍</div>
            <h5 class="judul-halaman" style="font-size: 16px;">Alamat</h5>
            <p class="sub-judul">Gedung Pusat SKD, Jakarta</p>
        </div>
        <div class="card-kontak-info">
            <div class="icon-lingkaran" style="background-color: #ecfdf5;">✉️</div>
            <h5 class="judul-halaman" style="font-size: 16px;">Email</h5>
            <p class="sub-judul">admin@skd.go.id</p>
        </div>
        <div class="card-kontak-info">
            <div class="icon-lingkaran" style="background-color: #fef2f2;">📞</div>
            <h5 class="judul-halaman" style="font-size: 16px;">Helpdesk</h5>
            <p class="sub-judul">+62 812-345-678</p>
        </div>
    </div>

    <div class="kontak-split-layout">
        
        <div class="card-grafik">
            <h4 class="judul-halaman" style="font-size: 20px; margin-bottom: 25px;">Kirim Pesan</h4>
            <form action="#">
                <div class="form-group">
                    <label class="label-custom">Nama Lengkap</label>
                    <input type="text" class="input-custom" placeholder="Contoh: Muhammad Sulhanul">
                </div>
                <div class="form-group">
                    <label class="label-custom">Isi Pesan</label>
                    <textarea class="input-custom" rows="5" placeholder="Tuliskan pertanyaan Anda di sini..."></textarea>
                </div>
                <button type="submit" class="btn-utama">Kirim Pesan Sekarang</button>
            </form>
        </div>

        <div class="box-operasional">
            <h4>Jam Operasional</h4>
            
            <div class="baris-jadwal">
                <span class="jadwal-hari">Senin - Jumat</span>
                <span class="jadwal-jam">08:00 - 16:00 WIB</span>
            </div>

            <div class="baris-jadwal">
                <span class="jadwal-hari">Sabtu - Minggu</span>
                <span class="jadwal-jam">Tutup (Libur)</span>
            </div>

            <div class="keterangan-bantuan">
                <strong>Catatan:</strong><br>
                Layanan pengaduan melalui WhatsApp tetap dibuka 24 jam, namun balasan akan diproses lebih cepat pada jam kerja yang tertera di atas.
            </div>
        </div>

    </div>
</div>
@endsection