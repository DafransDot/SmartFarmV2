<?php

namespace App\Http\Controllers;

use App\Models\HewanTernak;
use App\Models\KelompokTernak;
use Illuminate\Http\Request;

class HewanTernakController extends Controller
{
    // Tampilkan daftar hewan ternak
    public function index(Request $request)
    {
        $kelompokId = $request->get('kelompok_id');

        // Filter hewan ternak berdasarkan kelompok dan user yang sedang login
        $query = HewanTernak::with('kelompokTernak')
            ->whereHas('kelompokTernak', function ($query) {
                $query->where('user_id', auth()->id());
            });

        if ($kelompokId) {
            $query->where('id_kelompok', $kelompokId);
        }

        $hewanTernaks = $query->get();
        $kelompokTernaks = KelompokTernak::where('user_id', auth()->id())->get();

        return view('hewan_ternak.index', compact('hewanTernaks', 'kelompokTernaks'));
    }



    // Fitur Penandaan Hewan Ternak
    public function halamanPenandaanHewanTernak()
    {
        $kelompokTernak = KelompokTernak::where('user_id', auth()->id())->get();
        return view('hewan_ternak.halamanPenandaanHewanTernak', compact('kelompokTernak'));
    }


    public function tambahHewanTernak(Request $request)
    {
        $request->validate([
            'jenis_sapi' => 'required|string|max:255',
            'umur' => 'required|date',
            'id_kelompok' => 'required|exists:kelompok_ternaks,id',
            'jenis_kelamin' => 'required|in:Jantan,Betina',
        ]);

        // Pastikan kelompok ternak milik user
        $kelompokTernak = KelompokTernak::where('id', $request->id_kelompok)
            ->where('user_id', auth()->id())
            ->first();

        if (!$kelompokTernak) {
            return redirect()->route('hewan_ternak.index')->with('error', 'Anda tidak memiliki akses ke kelompok ternak ini.');
        }

        HewanTernak::create($request->all());

        return redirect()->route('hewan_ternak.halamanPenandaanHewanTernak')->with('success', 'Hewan ternak berhasil ditambahkan.');
    }


    // Tampilkan detail hewan ternak
    public function halamanDetailHewanTernak(HewanTernak $hewanTernak)
    {
        $this->authorizeAccess($hewanTernak);
        return view('hewan_ternak.halamanDetailHewanTernak', compact('hewanTernak'));
    }

    // Halaman untuk mengedit hewan ternak
    public function halamanEditHewanTernak(HewanTernak $hewanTernak)
    {
        $this->authorizeAccess($hewanTernak);
        $kelompokTernak = KelompokTernak::where('user_id', auth()->id())->get();
        return view('hewan_ternak.halamanEditHewanTernak', compact('hewanTernak', 'kelompokTernak'));
    }

    // Update data hewan ternak
    public function editHewanTernak(Request $request, HewanTernak $hewanTernak)
    {
        $this->authorizeAccess($hewanTernak);

        $request->validate([
            'jenis_sapi' => 'required|string|max:255',
            'umur' => 'required|date',
            'id_kelompok' => 'required|exists:kelompok_ternaks,id',
            'jenis_kelamin' => 'required|in:Jantan,Betina',
        ]);

        $hewanTernak->update($request->all());

        return redirect()->route('hewan_ternak.index')->with('success', 'Hewan ternak berhasil diperbarui.');
    }

    // Hapus data hewan ternak
    public function hapusHewanTernak(HewanTernak $hewanTernak)
    {
        $this->authorizeAccess($hewanTernak);
        $hewanTernak->delete();

        return redirect()->route('hewan_ternak.index')->with('success', 'Hewan ternak berhasil dihapus.');
    }

    // Cek akses pengguna terhadap data
    private function authorizeAccess(HewanTernak $hewanTernak)
    {
        if ($hewanTernak->kelompokTernak->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke hewan ternak ini.');
        }
    }
}
