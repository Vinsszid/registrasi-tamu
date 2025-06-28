<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tamu;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tamus = Tamu::all();
        return response()->json([
            'success' => true,
            'data' => $tamus,
            'message' => 'Data tamu berhasil diambil'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
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

        $tamu = Tamu::create([
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

        return response()->json([
            'success' => true,
            'data' => $tamu,
            'message' => 'Data tamu berhasil disimpan'
        ], 201);
    }
}
