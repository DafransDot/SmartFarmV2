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
        $query = HewanTernak::with('kelompokTernak')
            ->whereNull('status_pengurangan')
            ->whereHas('kelompokTernak', function ($query) {
                $query->where('user_id', auth()->id());
            });
            


        if ($kelompokId) {
            $query->where('id_kelompok', $kelompokId);
        }

        $query->orderByRaw("FIELD(status_penanganan, 'Belum Ditangani', 'Dalam Perawatan', 'Sembuh', '-')");

        $hewanTernaks = $query->paginate(10);
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
            'nomor_tag' => 'required|string|max:32|unique:hewan_ternak',
            'jenis_sapi' => 'required|string|max:32',
            'umur' => 'required|date',
            'status_kelahiran'=>'required|in:Kawin Alami,Kawin Suntik,Pembelian,Penambahan Lain',
            'id_kelompok' => 'required|exists:kelompok_ternak,id',
            'jenis_kelamin' => 'required|in:Jantan,Betina',
        ]);

        // Pastikan kelompok ternak milik user
        $kelompokTernak = KelompokTernak::where('id', $request->id_kelompok)
            ->where('user_id', auth()->id())
            ->first();

        if (!$kelompokTernak) {
            return redirect()->route('hewan_ternak.halamanPenandaanHewanTernak')
            ->with('error', 'Anda tidak memiliki akses ke kelompok ternak ini.');
        }

        HewanTernak::create($request->all());

        return redirect()->route('hewan_ternak.halamanPenandaanHewanTernak')
        ->with('success', 'Hewan ternak berhasil ditambahkan.');
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
            'nomor_tag' => 'required|string|max:32|unique:hewan_ternak,nomor_tag,' . $hewanTernak->id,
            'jenis_sapi' => 'required|string|max:32',
            'umur' => 'required|date',
            'id_kelompok' => 'required|exists:kelompok_ternak,id',
            'jenis_kelamin' => 'required|in:Jantan,Betina',
            'status_kelahiran'=>'required|in:Kawin Alami,Kawin Suntik,Pembelian,Penambahan Lain',
            'riwayat_cekkesehatan' => 'nullable|date',
            'riwayat_penanganan' => 'nullable|date',
            'status_penanganan' => 'nullable|in:Sembuh,Dalam Perawatan,Belum Ditangani,-',
            'riwayat_penyakit' => 'nullable|string|max:32',
        ]);
    
        $hewanTernak->update($request->all());
    
        $kelompokId = $request->input('id_kelompok');
    
        return redirect()->route('hewan_ternak.index', ['kelompok_id' => $kelompokId])
            ->with('success', 'Hewan ternak berhasil diperbarui.');
    }

    // Hapus data hewan ternak
    public function hapusHewanTernak(Request $request, HewanTernak $hewanTernak)
        {
            $this->authorizeAccess($hewanTernak);
        
            $request->validate([
                'status_pengurangan' => 'required|in:Kematian,Pemotongan,Penjualan,Pengurangan Lain',
            ]);
        
            $hewanTernak->update(['status_pengurangan' => $request->status_pengurangan]);
            
            $kelompokId = $hewanTernak->id_kelompok;
            
            return redirect()->route('hewan_ternak.index', ['kelompok_id' => $kelompokId])
            ->with('success', 'Hewan ternak berhasil diperbarui dengan status pengurangan.');
        }
    

    // Cek akses pengguna terhadap data
    private function authorizeAccess(HewanTernak $hewanTernak)
    {
        if ($hewanTernak->kelompokTernak->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke hewan ternak ini.');
        }
    }

}
