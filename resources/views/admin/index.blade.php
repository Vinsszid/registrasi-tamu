@extends('layouts.app')

@section('content')
<!-- Link ke CSS tombol web print -->
<link rel="stylesheet" href="{{ asset('css/style-admin-webprint.css') }}">
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-center">Data Tamu</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Menuju Web Print -->
    <div class="mb-4 text-right">
        <a href="/index.html" class="btn-webprint">Menuju Web Print</a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Instansi Asal</th>
                    <th class="px-4 py-2 border">Acara</th>
                    <th class="px-4 py-2 border">Tanggal Kunjungan</th>
                    <th class="px-4 py-2 border">Waktu Datang</th>
                    <th class="px-4 py-2 border">Nomor HP</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tamus as $index => $tamu)
                    <tr class="text-center">
                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $tamu->nama }}</td>
                        <td class="px-4 py-2 border">{{ $tamu->instansi_asal }}</td>
                        <td class="px-4 py-2 border">{{ $tamu->tujuan }}</td>
                        <td class="px-4 py-2 border">{{ $tamu->tanggal_kunjungan }}</td>
                        <td class="px-4 py-2 border">{{ $tamu->waktu_datang }}</td>
                        <td class="px-4 py-2 border">{{ $tamu->nomor_hp }}</td>
                        <td class="px-4 py-2 border">
                            <!-- Tombol Edit -->
                            <a href="{{ route('admin.tamu.edit', $tamu->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 mr-2">Edit</a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('admin.tamu.destroy', $tamu->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus data ini?');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">Belum ada data tamu.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="text-align:center; margin-top:1.5rem; color:#888; font-size:0.95rem;">
        <hr style="max-width:220px; margin:1.2rem auto 0.7rem auto;">
        <div>© 2025 Sekretariat DPRD Kota Bogor. All rights reserved.</div>
        <div>By Mahasiswa Universitas Binaniaga</div>
    </div>
</div>
@endsection
