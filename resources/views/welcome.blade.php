<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi Tamu</title>
    <!-- Bootstrap 5 CDN -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Form Registrasi Tamu</h2>

        <!-- Notifikasi sukses -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('tamu.store') }}" onsubmit="return handleSignatureSubmit();">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
            </div>

            <div class="mb-3">
                <label for="lp" class="form-label">L/P</label>
                <select name="lp" id="lp" class="form-control" required>
                    <option value="">Pilih</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan" required>
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Nomor HP" required>
            </div>

            <!-- Tanda Tangan Canvas -->
            <div class="mb-3">
                <label class="form-label">Tanda Tangan</label>
                <br>
                <canvas id="signature-pad" width="300" height="100" style="border:1px solid #ccc;"></canvas>
                <br>
                <button type="button" onclick="clearSignature()" class="btn btn-secondary mt-2">Bersihkan Tanda Tangan</button>
                <input type="hidden" name="signature" id="signature">
            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Tambahkan script untuk canvas tanda tangan -->
    <script>
        let canvas = document.getElementById('signature-pad');
        let ctx = canvas.getContext('2d');
        let drawing = false;

        canvas.addEventListener('mousedown', function(e) {
            drawing = true;
            ctx.beginPath();
            ctx.moveTo(e.offsetX, e.offsetY);
        });
        canvas.addEventListener('mousemove', function(e) {
            if (drawing) {
                ctx.lineTo(e.offsetX, e.offsetY);
                ctx.stroke();
            }
        });
        canvas.addEventListener('mouseup', function(e) {
            drawing = false;
        });
        canvas.addEventListener('mouseleave', function(e) {
            drawing = false;
        });

        function clearSignature() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }

        function handleSignatureSubmit() {
            let dataUrl = canvas.toDataURL('image/png');
            document.getElementById('signature').value = dataUrl;
            return true;
        }
    </script>
</body>
</html>
