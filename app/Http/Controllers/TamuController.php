<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Tamu;


class TamuController extends Controller
{
    public function create()
    {
        return view('tamu.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'lp' => 'required',
            'jabatan' => 'required',
            'nomor_hp' => 'required',
            'waktu' => 'required',
            'tanggal' => 'required|date',
            'tempat' => 'required',
            'acara' => 'required',
            'signature' => 'required',
        ]);

        Tamu::create([
            'nama' => $request->nama,
            'lp' => $request->lp,
            'jabatan' => $request->jabatan,
            'nomor_hp' => $request->nomor_hp,
            'waktu' => $request->waktu,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'acara' => $request->acara,
            'asal_daerah' => $request->asal_daerah,
            'signature' => $request->signature,
        ]);

        return redirect()->route('tamu.create')->with('success', 'Data tamu berhasil disimpan!');
    }
    public function bulkDownload(Request $request)
    {
        $ids = $request->input('selected_ids');
        $tamus = Tamu::whereIn('id', $ids)->get();

        $pdf = Pdf::loadView('admin.tamu.bulk-pdf', compact('tamus'));
        return $pdf->download('daftar_hadir_terpilih.pdf');
    }
    public function index()
    {
        $tamus = Tamu::all();
        return view('admin.tamu.index', compact('tamus'));
    }
}
