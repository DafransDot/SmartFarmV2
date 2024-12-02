<?php

namespace App\Http\Controllers;

use App\Models\KelompokTernak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelompokTernakController extends Controller
{
    // Menampilkan kelompok ternak dalam bentuk tombol
    public function index()
    {
        $kelompokTernak = KelompokTernak::all();
        return view('kelompok_ternak.buttons', compact('kelompokTernak'));
    }

    // Menampilkan daftar CRUD kelompok ternak
    public function list()
    {
        $kelompokTernak = KelompokTernak::all();
        return view('kelompok_ternak.index', compact('kelompokTernak'));
    }

    public function create()
    {
        return view('kelompok_ternak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelompok' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'jumlah_ternak' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Proses upload file jika ada
        $path = $request->hasFile('foto') 
            ? $request->file('foto')->store('img/kelompok', 'public') 
            : 'img/kelompok/default-placeholder.png'; // Placeholder default jika tidak ada foto

        // Simpan data ke database
        KelompokTernak::create([
            'nama_kelompok' => $request->nama_kelompok,
            'lokasi' => $request->lokasi,
            'jumlah_ternak' => $request->jumlah_ternak,
            'foto' => $path,
        ]);

        return redirect()->route('kelompok_ternak.list')->with('success', 'Data kelompok ternak berhasil ditambahkan.');
    }

    public function edit(KelompokTernak $kelompokTernak)
    {
        return view('kelompok_ternak.edit', compact('kelompokTernak'));
    }

    public function update(Request $request, KelompokTernak $kelompokTernak)
    {
        $request->validate([
            'nama_kelompok' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'jumlah_ternak' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses upload file baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($kelompokTernak->foto && $kelompokTernak->foto !== 'img/kelompok/default-placeholder.png') {
                Storage::disk('public')->delete($kelompokTernak->foto);
            }

            // Upload foto baru
            $kelompokTernak->foto = $request->file('foto')->store('img/kelompok', 'public');
        }

        // Perbarui data kelompok ternak
        $kelompokTernak->update($request->only(['nama_kelompok', 'lokasi', 'jumlah_ternak']));

        return redirect()->route('kelompok_ternak.list')->with('success', 'Data kelompok ternak berhasil diperbarui.');
    }

    public function destroy(KelompokTernak $kelompokTernak)
    {
        // Hapus foto jika ada dan bukan placeholder
        if ($kelompokTernak->foto && $kelompokTernak->foto !== 'img/kelompok/default-placeholder.png') {
            Storage::disk('public')->delete($kelompokTernak->foto);
        }

        $kelompokTernak->delete();
        return redirect()->route('kelompok_ternak.list')->with('success', 'Data kelompok ternak berhasil dihapus.');
    }
}
