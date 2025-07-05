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
            position: relative;
        }
        .kop img {
            position: absolute;
            left: 0;
            top: 0;
            height: 60px;
        }
        .kop h3,
        .kop p {
            margin: 0;
        }
        .info {
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

    @php
        $path = public_path('images/logo-kota-bogor.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    @endphp

    <div class="kop">
        <img src="{{ $base64 }}" alt="Logo">
        <h3>SEKRETARIAT DEWAN PERWAKILAN RAKYAT DAERAH<br>KOTA BOGOR</h3>
        <p>Jl. Pemuda No. 25-29 Kelurahan Tanah Sareal Kecamatan Tanah Sareal</p>
        <hr>
    </div>

    @if ($tamus->isNotEmpty())
    <div style="text-align: center; margin: 10px 0 20px 0; font-size: 13px;">
        <div><strong>Hari/Tanggal</strong> : {{ \Carbon\Carbon::parse($tamus->first()->tanggal)->translatedFormat('l, d F Y') }}</div>
        <div><strong>Waktu</strong> : {{ $tamus->first()->waktu }}</div>
        <div><strong>Tempat</strong> : {{ $tamus->first()->tempat }}</div>
        <div><strong>Acara</strong> : {{ $tamus->first()->acara }}</div>
    </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>L/P</th>
                <th>No Telepon</th>
                <th>Jabatan</th>
                <th>Asal Daerah</th>
                <th>Waktu</th>
                <th>Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tamus as $index => $tamu)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $tamu->nama }}</td>
                <td>{{ $tamu->lp }}</td>
                <td>{{ $tamu->nomor_hp }}</td>
                <td>{{ $tamu->jabatan }}</td>
                <td>{{ $tamu->asal_daerah }}</td>
                <td>{{ $tamu->waktu }}</td>
                <td>
                    @if($tamu->signature)
                        <img src="{{ $tamu->signature }}" style="width: 100px; height: 50px; object-fit: contain;" alt="Tanda Tangan">
                    @else
                        Tidak ada tanda tangan
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">Tidak ada data tamu yang dipilih.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
