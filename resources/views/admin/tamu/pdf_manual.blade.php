<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th,
        td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
        }
        .kop {
            text-align: center;
        }
        .info {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="kop">
        <img src="{{ public_path('images/logo_kota_bogor.png') }}" alt="Logo" height="60" style="float: left;">
        <h3>SEKRETARIAT DEWAN PERWAKILAN RAKYAT DAERAH<br>KOTA BOGOR</h3>
        <p>Jl. Pemuda No. 25-29 Kelurahan Tanah Sareal Kecamatan Tanah Sareal</p>
        <hr>
    </div>

    <div class="info">
        <p><strong>Hari/Tanggal:</strong> {{ \Carbon\Carbon::parse($tamu->tanggal_kunjungan)->translatedFormat('l, d F Y') }}</p>
        <p><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($tamu->waktu_datang)->format('H:i') }} WIB</p>
        <p><strong>Tempat:</strong> Gedung DPRD Kota Bogor</p>
        <p><strong>Acara:</strong> {{ $tamu->tujuan }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>L/P</th>
                <th>No Telepon</th>
                <th>Jabatan</th>
                <th>Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= 25; $i++)
            <tr>
                <td>{{ $i }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @endfor
        </tbody>
    </table>
</body>
</html>
