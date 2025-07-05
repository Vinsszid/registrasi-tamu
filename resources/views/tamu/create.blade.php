<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi Tamu</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tamu.css') }}">
</head>
<body>
<div class="container d-flex flex-column align-items-center justify-content-center min-vh-100">
    @if(session('success'))
        <div class="success-box text-center mb-4 animate-fadeIn">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-3" width="80" height="80" fill="none" viewBox="0 0 24 24" stroke="green">
                <circle cx="12" cy="12" r="10" stroke="green" stroke-width="2" fill="none"/>
                <path d="M8 12l2 2 4-4" stroke="green" stroke-width="2" fill="none"/>
            </svg>
            <h2 class="text-success font-semibold text-lg">{{ session('success') }}</h2>
        </div>
        <div class="refresh-box text-center mb-4">
            <a href="{{ route('tamu.create') }}" class="btn btn-primary">Refresh Form</a>
        </div>
    @endif
    @if(!session('success'))
        <div class="overlay mx-auto" id="formOverlay">
            <div class="text-center">
                <img src="{{ asset('images/logo-kota-bogor.png') }}" alt="Logo Kota Bogor" class="logo">
                <h5 class="mb-3">Form Registrasi Tamu Kunjungan Kerja Luar Daerah</h5>
            </div>
            <form method="POST" action="{{ route('tamu.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="asal_daerah" class="form-label">Asal Daerah</label>
                    <input type="text" class="form-control" id="asal_daerah" name="asal_daerah">
                </div>
                <div class="mb-3">
                    <label for="lp" class="form-label">L/P</label>
                    <select class="form-control" id="lp" name="lp" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                </div>
                <div class="mb-3">
                    <label for="nomor_hp" class="form-label">Nomor HP</label>
                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
                </div>
                <div class="mb-3">
                    <label for="waktu" class="form-label">Waktu</label>
                    <input type="text" class="form-control" id="waktu" name="waktu" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
                <div class="mb-3">
                    <label for="tempat" class="form-label">Tempat</label>
                    <input type="text" class="form-control" id="tempat" name="tempat" required>
                </div>
                <div class="mb-3">
                    <label for="acara" class="form-label">Acara</label>
                    <input type="text" class="form-control" id="acara" name="acara" required>
                </div>
                <div class="mb-3">
                    <label for="signature" class="form-label">Tanda Tangan</label>
                    <div class="signature-wrapper border rounded bg-light position-relative" style="position:relative;">
                        <canvas id="signature-pad"></canvas>
                        <input type="hidden" id="signature" name="signature">
                    </div>
                    <button type="button" id="clear-signature" class="btn btn-danger btn-sm mt-2">Bersihkan</button>
                </div>
                <button type="submit" class="btn btn-success w-100 mt-3 d-block mx-auto">Submit</button>
            </form>
        </div>
    @endif
    <div class="text-center mt-3" style="font-size:0.9rem; color:#FFFFFF;">
        © 2025 Sekretariat DPRD Kota Bogor. All rights reserved.<br>
        By Mahasiswa Universitas Binaniaga
    </div>
</div>
<script src="{{ asset('js/tamu.js') }}"></script>
</body>
</html>
