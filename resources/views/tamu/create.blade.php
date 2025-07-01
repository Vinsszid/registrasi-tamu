<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi Tamu</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: url('{{ asset('img/background.png') }}') no-repeat center center fixed;
            background-size: cover;
        }
        .overlay {
            background: rgba(255,255,255,0.97);
            border-radius: 18px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.10);
            border: 7px solid #f5f5f5;
            padding: 1.5rem 0.8rem;
            margin-top: 2.5rem;
            margin-bottom: 2.5rem;
            max-width: 350px;
            width: 100%;
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.9s cubic-bezier(.4,0,.2,1), transform 0.9s cubic-bezier(.4,0,.2,1), box-shadow 0.3s;
        }
        .overlay.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .overlay.scrolled {
            box-shadow: 0 8px 32px rgba(0,0,0,0.18);
        }
        .logo {
            max-width: 90px;
            width: 100%;
            height: auto;
            margin-bottom: 1rem;
        }
        html {
            scroll-behavior: smooth;
        }
        @media (max-width: 576px) {
            .overlay {
                padding: 0.7rem 0.2rem;
                margin-top: 1.2rem;
                margin-bottom: 1.2rem;
                max-width: 98vw;
            }
            .logo {
                max-width: 60px;
            }
        }
        .signature-wrapper {
            width: 100%;
            max-width: 100%;
        }
        #signature-pad {
            width: 100% !important;
            height: 200px;
            display: block;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.7s cubic-bezier(.4,0,.2,1);
        }
        .success-checkmark {
            width: 80px;
            height: 80px;
            display: block;
            margin: 0 auto 10px auto;
        }
        .success-checkmark__circle {
            stroke-dasharray: 240;
            stroke-dashoffset: 240;
            stroke: #28a745;
            stroke-width: 3;
            fill: none;
            animation: drawCircle 0.7s ease-out forwards;
        }
        .success-checkmark__check {
            stroke-dasharray: 50;
            stroke-dashoffset: 50;
            stroke: #28a745;
            stroke-width: 3;
            fill: none;
            animation: drawCheck 0.4s 0.7s ease-out forwards;
        }
        @keyframes drawCircle {
            to { stroke-dashoffset: 0; }
        }
        @keyframes drawCheck {
            to { stroke-dashoffset: 0; }
        }
    </style>
</head>
<body>
<div class="container d-flex flex-column align-items-center justify-content-center min-vh-100">
    @if(session('success'))
        <div class="text-center mb-4 animate-fadeIn">
            <svg class="success-checkmark" viewBox="0 0 52 52">
                <circle class="success-checkmark__circle" cx="26" cy="26" r="24" />
                <path class="success-checkmark__check" d="M16 27l7 7 13-13" />
            </svg>
            <h2 class="text-success font-semibold text-lg">{{ session('success') }}</h2>
        </div>
    @endif
    <div class="overlay mx-auto" id="formOverlay">
        @if(!session('success'))
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
        @endif
    </div>
    <div class="text-center mt-3" style="font-size:0.9rem; color:#FFFFFF;">
        © 2025 Sekretariat DPRD Kota Bogor. All rights reserved.<br>
        By Mahasiswa Universitas Binaniaga
    </div>
</div>
<script>
    // Animasi fade-in saat form muncul
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            document.getElementById('formOverlay').classList.add('visible');
        }, 100);
    });
    // Animasi shadow saat scroll
    window.addEventListener('scroll', function() {
        var overlay = document.getElementById('formOverlay');
        if(window.scrollY > 10) {
            overlay.classList.add('scrolled');
        } else {
            overlay.classList.remove('scrolled');
        }
    });

    // Responsive canvas
    function resizeCanvas() {
        const canvas = document.getElementById('signature-pad');
        const parent = canvas.parentElement;
        canvas.width = parent.offsetWidth;
        canvas.height = 200;
    }
    window.addEventListener('resize', resizeCanvas);
    window.addEventListener('DOMContentLoaded', resizeCanvas);

    // Signature pad logic
    let canvas = document.getElementById('signature-pad');
    let ctx = canvas.getContext('2d');
    let drawing = false;

    function getPos(e) {
        let rect = canvas.getBoundingClientRect();
        if (e.touches) {
            return {
                x: e.touches[0].clientX - rect.left,
                y: e.touches[0].clientY - rect.top
            };
        } else {
            return {
                x: e.offsetX,
                y: e.offsetY
            };
        }
    }

    function draw(e) {
        if (!drawing) return;
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#222';
        let pos = getPos(e);
        ctx.lineTo(pos.x, pos.y);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(pos.x, pos.y);
    }

    canvas.addEventListener('mousedown', (e) => {
        drawing = true;
        let pos = getPos(e);
        ctx.beginPath();
        ctx.moveTo(pos.x, pos.y);
    });
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseup', () => {
        drawing = false;
        ctx.beginPath();
    });
    canvas.addEventListener('mouseleave', () => {
        drawing = false;
        ctx.beginPath();
    });

    // Touch events for mobile
    canvas.addEventListener('touchstart', (e) => {
        drawing = true;
        let pos = getPos(e);
        ctx.beginPath();
        ctx.moveTo(pos.x, pos.y);
    });
    canvas.addEventListener('touchmove', (e) => {
        draw(e);
        e.preventDefault();
    });
    canvas.addEventListener('touchend', () => {
        drawing = false;
        ctx.beginPath();
    });

    // Clear button
    document.getElementById('clear-signature').addEventListener('click', function() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    });

    // On submit, save canvas as dataURL to hidden input
    document.querySelector('form').addEventListener('submit', function(e) {
        document.getElementById('signature').value = canvas.toDataURL('image/png');
    });
</script>
</body>
</html>
