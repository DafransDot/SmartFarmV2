<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HewanTernak;
use Illuminate\Support\Facades\DB;

class KesehatanController extends Controller
{
    public function halamanKesehatanHewanTernak()
    {
        return view('kesehatan_hewan.halamanKesehatanHewanTernak');
    }

    public function cariHewan(Request $request)
    {
        $request->validate([
            'cari' => 'required|string|max:32',
        ]);

        $cari = $request->input('cari');
        $hewanTernak = HewanTernak::where('nomor_tag', '=', $cari)
        ->whereNull('status_pengurangan')
        ->first();

        if (!$hewanTernak) {
            return redirect()->back()->withErrors(['cari' => 'Hewan ternak tidak ditemukan.']);
        }

        return view('kesehatan_hewan.halamanDetailKesehatanHewan', compact('hewanTernak'));
    }

    public function simpanKesehatan(Request $request, HewanTernak $hewanTernak)
    {
        $request->validate([
            'riwayat_cekkesehatan' => 'nullable|date',
            'riwayat_penanganan' => 'nullable|date',
            'status_penanganan' => 'nullable|in:Sembuh,Dalam Perawatan,Belum Ditangani,-',
            'riwayat_penyakit' => 'nullable|string|max:32',
        ]);

        $hewanTernak->update($request->only([
            'riwayat_cekkesehatan',
            'riwayat_penanganan',
            'status_penanganan',
            'riwayat_penyakit',
        ]));

        return redirect()->route('kesehatan_hewan.index')
        ->with('success', 'Data kesehatan hewan berhasil diperbarui.');
    }
    

}
