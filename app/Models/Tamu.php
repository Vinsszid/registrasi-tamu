<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    protected $fillable = [
        'nama',
        'lp',
        'jabatan',
        'nomor_hp',
        'waktu',
        'tanggal',
        'tempat',
        'acara',
        'asal_daerah',
        'signature',
    ];
}
