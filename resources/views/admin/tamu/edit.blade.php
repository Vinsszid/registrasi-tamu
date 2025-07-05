<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Tamu</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/edit-tamu.css') }}">
</head>
<body>
<div class="container d-flex flex-column align-items-center justify-content-center min-vh-100">
    <div class="admin-overlay mx-auto">
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo-kota-bogor.png') }}" alt="Logo Kota Bogor" class="logo">
            <h4>Edit Data Tamu</h4>
        </div>
        <form method="POST" action="{{ route('admin.tamu.update', $tamu->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $tamu->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="asal_daerah" class="form-label">Asal Daerah</label>
                <input type="text" class="form-control" id="asal_daerah" name="asal_daerah" value="{{ $tamu->asal_daerah }}">
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
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $tamu->jabatan }}" required>
            </div>
            <div class="mb-3">
                <label for="nomor_hp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ $tamu->nomor_hp }}" required>
            </div>
            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu</label>
                <input type="text" class="form-control" id="waktu" name="waktu" value="{{ $tamu->waktu }}" required>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $tamu->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label for="tempat" class="form-label">Tempat</label>
                <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $tamu->tempat }}" required>
            </div>
            <div class="mb-3">
                <label for="acara" class="form-label">Acara</label>
                <input type="text" class="form-control" id="acara" name="acara" value="{{ $tamu->acara }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Edit</button>
        </form>
        <a href="{{ route('admin.tamu.index') }}" class="btn btn-secondary w-100 mt-3">Kembali</a>
    </div>
</div>
<div class="text-center mt-3" style="font-size:0.9rem; color:#ffffff;">
    © 2025 Sekretariat DPRD Kota Bogor. All rights reserved.<br>
    By Mahasiswa Universitas Binaniaga
</div>
</body>
</html>
