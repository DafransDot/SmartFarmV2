<?php

namespace App\Http\Controllers;

use App\Models\KelompokTernak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelompokTernakController extends Controller
{
         // tampil
    public function halamanDaftarKelompok()
    {
        $kelompokTernak = KelompokTernak::where('user_id', auth()->id())->get();
        return view('kelompok_ternak.halamanDaftarKelompok', compact('kelompokTernak'));
    }


    public function index()
    {
        $kelompokTernak = KelompokTernak::where('user_id', auth()->id())->get();
        return view('kelompok_ternak.index', compact('kelompokTernak'));
    }
    
             //fitur menambah kelompok

    public function halamanTambahKelompok()
    {
        return view('kelompok_ternak.halamanTambahKelompok');
    }

    public function tambahkelompokTernak(Request $request)
    {
    $request->validate(
        [
        'nama_kelompok' => 'required|string|max:255',
        'lokasi' => 'required|string|max:255',
        'jumlah_ternak' => 'required|integer',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


    $path = $request->hasFile('foto') 
        ? $request->file('foto')->store('img/kelompok', 'public') 
        : 'img/kelompok/default-placeholder.png';



    KelompokTernak::create(
        [
        'nama_kelompok' => $request->nama_kelompok,
        'lokasi' => $request->lokasi,
        'jumlah_ternak' => $request->jumlah_ternak,
        'foto' => $path,
        'user_id' => auth()->id(),
        ]);

    return redirect()->route('kelompok_ternak.list')->with('success', 'Data kelompok ternak berhasil ditambahkan.');
    }


            //<-->fitur edit kelompok<-->//

    public function halamanEditKelompok(KelompokTernak $kelompokTernak)
    {
        return view('kelompok_ternak.halamanEditKelompok', compact('kelompokTernak'));
    }

    public function editKelompok(Request $request, KelompokTernak $kelompokTernak)
    {
        //validasi pengguna
    if ($kelompokTernak->user_id !== auth()->id()) 
    {
        return redirect()->route('kelompok_ternak.list')->with('error', 'Anda tidak memiliki akses untuk memperbarui kelompok ternak ini.');
    }

    $request->validate(
        [
        'nama_kelompok' => 'required|string|max:255',
        'lokasi' => 'required|string|max:255',
        'jumlah_ternak' => 'required|integer',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


    if ($request->hasFile('foto')) 
    {
        if ($kelompokTernak->foto && $kelompokTernak->foto !== 'img/kelompok/default-placeholder.png') 
        {
            Storage::disk('public')->delete($kelompokTernak->foto);
        }


        $kelompokTernak->foto = $request->file('foto')->store('img/kelompok', 'public');
    }


    $kelompokTernak->update($request->only(['nama_kelompok', 'lokasi', 'jumlah_ternak']));

    return redirect()->route('kelompok_ternak.list')->with('success', 'Data kelompok ternak berhasil diperbarui.');
    }


            //<-->fitur menghapus kelompok<-->//

    public function hapusKelompok(KelompokTernak $kelompokTernak)
    {
        // Memastikan hanya pemilik kelompok ternak yang bisa menghapus
        if ($kelompokTernak->user_id !== auth()->id()) {
            return redirect()->route('kelompok_ternak.list')->with('error', 'Anda tidak memiliki akses untuk menghapus kelompok ternak ini.');
        }

        if ($kelompokTernak->foto && $kelompokTernak->foto !== 'img/kelompok/default-placeholder.png') {
            Storage::disk('public')->delete($kelompokTernak->foto);
        }

        $kelompokTernak->delete();
        return redirect()->route('kelompok_ternak.list')->with('success', 'Data kelompok ternak berhasil dihapus.');
    }
}
