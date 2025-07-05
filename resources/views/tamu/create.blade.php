<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi Tamu</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* === Form Tamu === */
body {
    font-family: Arial, sans-serif;
    min-height: 100vh;
    margin: 0;
    padding: 0;
    background-image: url("../img/background.png");
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
}

.container {
    background-color: rgba(255, 255, 255, 0.25);
    padding: 30px 20px;
    max-width: 420px;
    margin: 40px auto;
    border-radius: 18px;
    box-shadow: none;
}

.overlay {
    background: rgba(255, 255, 255, 0.97);
    border-radius: 18px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18), 0 1.5px 8px rgba(0, 0, 0, 0.1);
    border: 7px solid #f5f5f5;
    padding: 1.5rem 0.8rem;
    margin-top: 2.5rem;
    margin-bottom: 2.5rem;
    max-width: 350px;
    width: 100%;
    opacity: 0;
    transform: translateY(40px);
    transition: opacity 0.9s cubic-bezier(0.4, 0, 0.2, 1),
        transform 0.9s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s;
}

.overlay.visible {
    opacity: 1;
    transform: translateY(0);
}

.overlay.scrolled {
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
}

.success-box {
    background: rgba(255, 255, 255, 0.97);
    border-radius: 18px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
    padding: 2rem 1.5rem 1.5rem 1.5rem;
    max-width: 480px;
    margin: 0 auto 1.5rem auto;
    display: flex;
    flex-direction: column;
    align-items: center;
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
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.animate-fadeIn {
    animation: fadeIn 0.7s cubic-bezier(0.4, 0, 0.2, 1);
}

/* === Header / Kop === */
.kop {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.text-header {
    text-align: center;
    flex: 1;
    padding: 0 20px;
}

/* === Garis Pembatas === */
hr {
    border: 1px solid black;
    margin: 20px 0;
}

/* === Info Tanggal/Waktu/Tempat/Acara === */
table.info {
    margin: 0 auto 20px auto;
    font-size: 14px;
    text-align: left;
}

table.info td {
    padding: 2px 10px 2px 0;
}

/* === Tabel Daftar Hadir === */
table.daftar-hadir {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}

table.daftar-hadir th,
table.daftar-hadir td {
    border: 1px solid black;
    text-align: center;
    padding: 5px;
    height: 30px;
}

table.daftar-hadir th {
    background-color: #f2f2f2;
}

/* Kolom Nama dan Jabatan rata tengah */
table.daftar-hadir th:nth-child(2),
table.daftar-hadir td:nth-child(2),
table.daftar-hadir th:nth-child(5),
table.daftar-hadir td:nth-child(5) {
    text-align: center !important;
    padding-left: 0;
}

/* Kolom Nama lebih lebar */
table.daftar-hadir th:nth-child(2),
table.daftar-hadir td:nth-child(2) {
    min-width: 200px;
    width: 220px;
    text-align: left;
    padding-left: 12px;
}

/* Kolom Jabatan lebih lebar */
table.daftar-hadir th:nth-child(5),
table.daftar-hadir td:nth-child(5) {
    min-width: 160px;
    width: 180px;
    text-align: left;
    padding-left: 10px;
}

@media print {
    table.daftar-hadir th:nth-child(2),
    table.daftar-hadir td:nth-child(2) {
        min-width: 220px;
        width: 250px;
        font-size: 15px;
    }

    table.daftar-hadir th:nth-child(5),
    table.daftar-hadir td:nth-child(5) {
        min-width: 180px;
        width: 200px;
        font-size: 15px;
    }
}

/* === Panel Tombol & Input === */
.tombol-panel {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 20px;
    margin-top: 20px;
    margin-left: 10px;
    margin-bottom: 30px;
}

.input-baris {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    justify-content: flex-start;
    margin-bottom: 10px;
}

.input-baris input {
    padding: 8px 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    min-width: 150px;
    font-size: 14px;
}

.button-baris {
    display: flex;
    gap: 12px;
    justify-content: flex-start;
    margin-bottom: 10px;
}

.button-kolom {
    display: flex;
    flex-direction: row;
    gap: 10px;
    justify-content: center;
    margin-top: 10px;
}

/* === Tombol Umum === */
.btn {
    padding: 8px 14px;
    font-size: 14px;
    cursor: pointer;
    border: none;
    color: white;
    border-radius: 5px;
    font-weight: bold;
}

.biru {
    background-color: #007bff;
}
.hijau {
    background-color: #28a745;
}
.merah {
    background-color: #dc3545;
}

/* === PRINT STYLES === */
.no-print {
    display: block;
}

@media print {
    .no-print {
        display: none;
    }

    body {
        background-image: none;
        padding: 0;
    }

    .container {
        box-shadow: none;
        max-width: none;
    }

    .kop {
        margin-bottom: 20px;
    }

    .text-header {
        font-size: 18px;
    }

    .logo {
        height: 80px;
    }
}

.footer {
    text-align: center;
    margin-top: 30px;
    font-size: 12px;
    color: #666;
}

.refresh-box {
    background: rgba(255, 255, 255, 0.97);
    border-radius: 14px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
    padding: 1rem 1.5rem 1rem 1.5rem;
    max-width: 320px;
    margin: 0 auto 1.5rem auto;
    display: flex;
    flex-direction: column;
    align-items: center;
}
    </style>
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

<script>
    // Animasi fade-in saat form muncul
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        var overlay = document.getElementById("formOverlay");
        if (overlay) overlay.classList.add("visible");
    }, 100);
});

// Animasi shadow saat scroll
window.addEventListener("scroll", function () {
    var overlay = document.getElementById("formOverlay");
    if (overlay) {
        if (window.scrollY > 10) {
            overlay.classList.add("scrolled");
        } else {
            overlay.classList.remove("scrolled");
        }
    }
});

// Responsive canvas
function resizeCanvas() {
    const canvas = document.getElementById("signature-pad");
    if (!canvas) return;
    const parent = canvas.parentElement;
    canvas.width = parent.offsetWidth;
    canvas.height = 200;
}
window.addEventListener("resize", resizeCanvas);
window.addEventListener("DOMContentLoaded", resizeCanvas);

// Signature pad logic
let canvas = document.getElementById("signature-pad");
if (canvas) {
    let ctx = canvas.getContext("2d");
    let drawing = false;

    function getPos(e) {
        let rect = canvas.getBoundingClientRect();
        if (e.touches) {
            return {
                x: e.touches[0].clientX - rect.left,
                y: e.touches[0].clientY - rect.top,
            };
        } else {
            return {
                x: e.offsetX,
                y: e.offsetY,
            };
        }
    }

    function draw(e) {
        if (!drawing) return;
        ctx.lineWidth = 2;
        ctx.lineCap = "round";
        ctx.strokeStyle = "#222";
        let pos = getPos(e);
        ctx.lineTo(pos.x, pos.y);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(pos.x, pos.y);
    }

    canvas.addEventListener("mousedown", (e) => {
        drawing = true;
        let pos = getPos(e);
        ctx.beginPath();
        ctx.moveTo(pos.x, pos.y);
    });
    canvas.addEventListener("mousemove", draw);
    canvas.addEventListener("mouseup", () => {
        drawing = false;
        ctx.beginPath();
    });
    canvas.addEventListener("mouseleave", () => {
        drawing = false;
        ctx.beginPath();
    });

    // Touch events for mobile
    canvas.addEventListener("touchstart", (e) => {
        drawing = true;
        let pos = getPos(e);
        ctx.beginPath();
        ctx.moveTo(pos.x, pos.y);
    });
    canvas.addEventListener("touchmove", (e) => {
        draw(e);
        e.preventDefault();
    });
    canvas.addEventListener("touchend", () => {
        drawing = false;
        ctx.beginPath();
    });

    // Clear button
    var clearBtn = document.getElementById("clear-signature");
    if (clearBtn) {
        clearBtn.addEventListener("click", function () {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        });
    }

    // On submit, save canvas as dataURL to hidden input
    var form = document.querySelector("form");
    if (form) {
        form.addEventListener("submit", function (e) {
            document.getElementById("signature").value =
                canvas.toDataURL("image/png");
        });
    }
}
</script>
</body>
</html>
