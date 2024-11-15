<?php

namespace App\Http\Controllers;


use App\Models\KelompokTernak;
use Illuminate\Http\Request;

class KelompokTernakController extends Controller
{
    public function index()
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
            'nama_kelompok' => 'required',
            'lokasi' => 'required',
            'jumlah_ternak' => 'required|integer',
        ]);

        KelompokTernak::create($request->all());
        return redirect()->route('kelompok-ternak.index')->with('success', 'Data kelompok ternak berhasil ditambahkan.');
    }

    public function edit(KelompokTernak $kelompokTernak)
    {
        return view('kelompok_ternak.edit', compact('kelompokTernak'));
    }

    public function update(Request $request, KelompokTernak $kelompokTernak)
    {
        $request->validate([
            'nama_kelompok' => 'required',
            'lokasi' => 'required',
            'jumlah_ternak' => 'required|integer',
        ]);

        $kelompokTernak->update($request->all());
        return redirect()->route('kelompok-ternak.index')->with('success', 'Data kelompok ternak berhasil diperbarui.');
    }

    public function destroy(KelompokTernak $kelompokTernak)
    {
        $kelompokTernak->delete();
        return redirect()->route('kelompok-ternak.index')->with('success', 'Data kelompok ternak berhasil dihapus.');
    }
}
