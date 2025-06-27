@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white shadow-lg rounded-xl p-10 max-w-xl w-full text-center">

        <!-- Animasi ceklis -->
        <div class="flex justify-center mb-6">
            <svg class="h-20 w-20 text-green-500 animate-bounce" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
        </div>

        <h2 class="text-2xl font-semibold text-green-600 mb-4">Registrasi Berhasil!</h2>
        <p class="mb-6 text-gray-600">Berikut data tamu yang telah disimpan:</p>

        <table class="table-auto w-full border border-gray-300 text-left text-sm">
            @php $data = session('data'); @endphp
            <tbody>
                <tr><th class="border px-4 py-2">Nama</th><td class="border px-4 py-2">{{ $data->nama }}</td></tr>
                <tr><th class="border px-4 py-2">Instansi Asal</th><td class="border px-4 py-2">{{ $data->instansi_asal }}</td></tr>
                <tr><th class="border px-4 py-2">Acara</th><td class="border px-4 py-2">{{ $data->acara }}</td></tr>
                <tr><th class="border px-4 py-2">Tanggal Kunjungan</th><td class="border px-4 py-2">{{ $data->tanggal_kunjungan }}</td></tr>
                <tr><th class="border px-4 py-2">Waktu</th><td class="border px-4 py-2">{{ $data->waktu_datang }}</td></tr>
                <tr><th class="border px-4 py-2">Nomor HP</th><td class="border px-4 py-2">{{ $data->nomor_hp }}</td></tr>
            </tbody>
        </table>

        <a href="{{ route('tamu.create') }}" class="inline-block mt-6 text-blue-600 hover:underline">Kembali ke Formulir</a>
    </div>
</div>
@endsection
