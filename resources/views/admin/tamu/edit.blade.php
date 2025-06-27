@extends('layouts.app')

@section('content')
<!-- Link ke CSS yang baru -->
<link rel="stylesheet" href="{{ asset('css/style2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/style-admin-webprint.css') }}">

<div class="container">
    <!-- <a href="{{ route('admin.tamu.index') }}" class="btn-admin no-print">Kembali ke Data Tamu</a> -->
    <div class="kop">
        <img src="{{ asset('img/logo-kiri.png') }}" alt="Logo Kiri" class="logo" />
        <div class="text-header">
            <h3>SEKRETARIAT DEWAN PERWAKILAN RAKYAT DAERAH</h3>
            <h3>KOTA BOGOR</h3>
            <p>
                Jln. Pemuda No. 25-29 Kelurahan Tanah Sareal Kecamatan
                Tanah Sareal
            </p>
        </div>
        <img src="{{ asset('img/logo-kanan.png') }}" alt="Logo Kanan" class="logo" />
    </div>

    <hr />

    <h1 class="text-center font-bold mb-6">Edit Data Tamu</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.tamu.update', $tamu->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Nama:</label>
            <input type="text" name="nama" value="{{ old('nama', $tamu->nama) }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">L/P:</label>
            <select name="lp" class="w-full border px-3 py-2 rounded" required>
                <option value="L" {{ old('lp', $tamu->lp) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('lp', $tamu->lp) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Jabatan:</label>
            <input type="text" name="jabatan" value="{{ old('jabatan', $tamu->jabatan) }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Nomor HP:</label>
            <input type="text" name="nomor_hp" value="{{ old('nomor_hp', $tamu->nomor_hp) }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Waktu:</label>
            <input type="text" name="waktu" value="{{ old('waktu', $tamu->waktu) }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Hari Tanggal:</label>
            <input type="date" name="tanggal" value="{{ old('tanggal', $tamu->tanggal) }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Tempat:</label>
            <input type="text" name="tempat" value="{{ old('tempat', $tamu->tempat) }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Acara:</label>
            <input type="text" name="acara" value="{{ old('acara', $tamu->acara) }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Asal Daerah:</label>
            <input type="text" name="asal_daerah" value="{{ old('asal_daerah', $tamu->asal_daerah) }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn hijau">Update</button>
            <a href="{{ route('admin.tamu.index') }}" class="ml-4 text-gray-600">Batal</a>
        </div>
    </form>
</div>

<!-- Footer -->
<footer class="footer no-print">
    <hr />
    <p>© 2025 Sekretariat DPRD Kota Bogor. All rights reserved.</p>
    <p>By Mahasiswa Universitas Binaniaga</p>
</footer>
@endsection
