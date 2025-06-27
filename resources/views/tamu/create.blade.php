@extends('layouts.app')

@section('content')
<!-- Link ke CSS yang baru -->
<link rel="stylesheet" href="{{ asset('css/style2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/style-admin-webprint.css') }}">

<div class="container">
    <div class="kop">
        <img src="{{ asset('img/logo-kiri.png') }}" alt="Logo Kiri" class="logo" />
        <div class="text-header">
            <h3 style="font-weight:bold; font-size: 1.5em;">SEKRETARIAT DEWAN PERWAKILAN RAKYAT DAERAH</h3>
            <h3 style="font-weight:bold; font-size: 1.5em;">KOTA BOGOR</h3>
            <p>
                Jln. Pemuda No. 25-29 Kelurahan Tanah Sareal Kecamatan
                Tanah Sareal
            </p>
        </div>
        <img src="{{ asset('img/logo-kanan.png') }}" alt="Logo Kanan" class="logo" />
    </div>

    <hr />

    <!-- Judul Form -->
    <h1 class="text-3xl font-bold text-center mb-8">Form Registrasi Tamu Kunjungan Kerja Luar Daerah</h1>

    <!-- ✅ Pesan sukses + animasi ceklis -->
    @if(session('success'))
        <div class="text-center mb-6 animate-fadeIn">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-3" width="80" height="80" fill="none" viewBox="0 0 24 24" stroke="green">
                <circle cx="12" cy="12" r="10" stroke="green" stroke-width="2" fill="none"/>
                <path d="M8 12l2 2 4-4" stroke="green" stroke-width="2" fill="none"/>
            </svg>
            <h2 class="text-green-600 font-semibold text-lg">{{ session('success') }}</h2>
        </div>
    @endif

    <!-- ✅ Form hanya muncul jika belum ada data sukses -->
    @if(!session('success'))
    <form action="{{ route('tamu.store') }}" method="POST" onsubmit="return handleSignatureSubmit();">
        @csrf

        <div class="form-floating mb-4">
            <input type="text" class="form-control" name="nama" placeholder="Nama" required>
            <label>Nama</label>
        </div>

        <div class="form-floating mb-4">
            <input type="text" class="form-control" name="asal_daerah" placeholder="Asal Daerah" required>
            <label>Asal Daerah</label>
        </div>

        <div class="form-floating mb-4">
            <select class="form-control" name="lp" required>
                <option value="">Pilih L/P</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            <label>L/P</label>
        </div>

        <div class="form-floating mb-4">
            <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" required>
            <label>Jabatan</label>
        </div>

        <div class="form-floating mb-4">
            <input type="text" class="form-control" name="nomor_hp" placeholder="Nomor HP" required>
            <label>Nomor HP</label>
        </div>

        <div class="form-floating mb-4">
            <input type="text" class="form-control" name="waktu" placeholder="Waktu" required>
            <label>Waktu</label>
        </div>

        <div class="form-floating mb-4">
            <input type="date" class="form-control" name="tanggal" placeholder="Hari Tanggal" required>
            <label>Hari Tanggal</label>
        </div>

        <div class="form-floating mb-4">
            <input type="text" class="form-control" name="tempat" placeholder="Tempat" required>
            <label>Tempat</label>
        </div>

        <div class="form-floating mb-4">
            <input type="text" class="form-control" name="acara" placeholder="Acara" required>
            <label>Acara</label>
        </div>

        <!-- Tanda Tangan Canvas -->
        <div class="mb-4">
            <label class="form-label">Tanda Tangan</label><br>
            <canvas id="signature-pad" width="500" height="300" style="border:1px solid #ccc;"></canvas>
            <br>
            <button type="button" onclick="clearSignature()" class="btn merah mt-2">Bersihkan Tanda Tangan</button>
            <input type="hidden" name="signature" id="signature">
        </div>

        <div class="text-center">
            <button type="submit" class="btn hijau px-5 py-2">Submit</button>
        </div>
    </form>
    @endif
</div>

<!-- Footer -->
<footer class="footer no-print">
    <hr />
    <p>© 2025 Sekretariat DPRD Kota Bogor. All rights reserved.</p>
    <p>By Mahasiswa Universitas Binaniaga</p>
</footer>

<!-- ✅ CSS untuk animasi fadeIn -->
<style>
@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}
.animate-fadeIn {
    animation: fadeIn 0.6s ease-in-out;
}
</style>

<!-- Script untuk canvas tanda tangan -->
<script>
    let canvas = document.getElementById('signature-pad');
    let ctx = canvas.getContext('2d');
    let drawing = false;
    let lastX = 0;
    let lastY = 0;

    // Konfigurasi canvas
    ctx.strokeStyle = '#000000';
    ctx.lineWidth = 2;
    ctx.lineCap = 'round';
    ctx.lineJoin = 'round';

    // Fungsi untuk mendapatkan posisi yang benar
    function getPosition(e) {
        let rect = canvas.getBoundingClientRect();
        let x, y;
        
        if (e.type.includes('touch')) {
            x = e.touches[0].clientX - rect.left;
            y = e.touches[0].clientY - rect.top;
        } else {
            x = e.clientX - rect.left;
            y = e.clientY - rect.top;
        }
        
        return { x, y };
    }

    // Event listeners untuk mouse
    canvas.addEventListener('mousedown', startDrawing);
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseup', stopDrawing);
    canvas.addEventListener('mouseout', stopDrawing);

    // Event listeners untuk touch
    canvas.addEventListener('touchstart', startDrawing);
    canvas.addEventListener('touchmove', draw);
    canvas.addEventListener('touchend', stopDrawing);

    function startDrawing(e) {
        e.preventDefault();
        drawing = true;
        let pos = getPosition(e);
        lastX = pos.x;
        lastY = pos.y;
    }

    function draw(e) {
        e.preventDefault();
        if (!drawing) return;

        let pos = getPosition(e);
        
        ctx.beginPath();
        ctx.moveTo(lastX, lastY);
        ctx.lineTo(pos.x, pos.y);
        ctx.stroke();
        
        lastX = pos.x;
        lastY = pos.y;
    }

    function stopDrawing() {
        drawing = false;
    }

    function clearSignature() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }

    function handleSignatureSubmit() {
        // Cek apakah canvas kosong
        if (isCanvasEmpty()) {
            alert('Mohon isi tanda tangan terlebih dahulu');
            return false;
        }
        
        let dataUrl = canvas.toDataURL('image/png');
        document.getElementById('signature').value = dataUrl;
        return true;
    }

    function isCanvasEmpty() {
        const pixelBuffer = new Uint32Array(
            ctx.getImageData(0, 0, canvas.width, canvas.height).data.buffer
        );
        return !pixelBuffer.some(color => color !== 0);
    }
</script>
@endsection
