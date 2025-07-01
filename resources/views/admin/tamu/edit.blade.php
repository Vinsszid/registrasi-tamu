<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Tamu</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('img/background.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }
        .form-card {
            background: rgba(255,255,255,0.97);
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            padding: 2rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        .logo {
            max-width: 120px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">
            <div class="form-card">
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
                        <label for="lp" class="form-label">LP</label>
                        <input type="text" class="form-control" id="lp" name="lp" value="{{ $tamu->lp }}" required>
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
                    <div class="mb-3">
                        <label for="signature" class="form-label">Tanda Tangan</label>
                        <textarea class="form-control" id="signature" name="signature" rows="2" required>{{ $tamu->signature }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
