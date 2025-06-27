<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
class AdminTamuController extends Controller
{
    public function index()
    {
        $tamus = Tamu::all();
        return view('admin.tamu.index', compact('tamus'));
    }

    public function destroy($id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->delete();

        return redirect()->route('admin.tamu.index')->with('success', 'Data tamu berhasil dihapus.');
    }

    public function edit($id)
    {
        $tamu = Tamu::findOrFail($id);
        return view('admin.tamu.edit', compact('tamu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'lp' => 'required',
            'jabatan' => 'required',
            'nomor_hp' => 'required',
            'waktu' => 'required',
            'tanggal' => 'required|date',
            'tempat' => 'required',
            'acara' => 'required',
            'asal_daerah' => 'required',
        ]);

        $tamu = Tamu::findOrFail($id);
        $tamu->update([
            'nama' => $request->nama,
            'lp' => $request->lp,
            'jabatan' => $request->jabatan,
            'nomor_hp' => $request->nomor_hp,
            'waktu' => $request->waktu,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'acara' => $request->acara,
            'asal_daerah' => $request->asal_daerah,
        ]);

        return redirect()->route('admin.tamu.index')->with('success', 'Data tamu berhasil diperbarui.');
    }

    public function bulkDownload(Request $request)
   {
        // Tambahkan log di awal method untuk memastikan method ini terpanggil
        Log::info('AdminTamuController bulkDownload method accessed.');

        /** @var \Illuminate\Support\Facades\Log $log */ // Baris ini tidak perlu jika Log sudah di-import di atas
        Log::info('Bulk Download Request Received', [
            'url' => $request->url(),
            'method' => $request->method(),
            'input' => $request->all()
        ]);

        $ids = $request->input('selected_ids');
        if (!$ids || count($ids) === 0) {
            Log::warning('No IDs selected for bulk download.'); // Ubah ke warning atau info
            return redirect()->back()->with('error', 'Silakan pilih setidaknya satu data tamu.');
        }

        $tamus = Tamu::whereIn('id', $ids)->get();
        Log::info('Tamus Fetched for bulk download', ['count' => $tamus->count()]);
        if ($tamus->isEmpty()) {
            Log::warning('No Tamu found for the selected IDs.');
            return redirect()->back()->with('error', 'Data tamu tidak ditemukan untuk ID yang dipilih.');
        }
        $pdf = Pdf::loadView('admin.tamu.bulk-download', compact('tamus'));
        Log::info('PDF generated for bulk download.');
        return $pdf->download('daftar_hadir_terpilih.pdf');
   }
}