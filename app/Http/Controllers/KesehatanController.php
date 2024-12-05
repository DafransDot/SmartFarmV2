<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HewanTernak;
use Illuminate\Support\Facades\DB;

class KesehatanController extends Controller
{
    public function index()
    {
        $hewanTernak = []; // Inisialisasi sebagai array kosong
        return view('kesehatan_hewan.index', compact('hewanTernak'));
    }
    
public function cariHewan(Request $request)
{
    $request->validate([
        'cari' => 'required|string|max:255',
    ]);

    $cari = $request->input('cari');
    $hewanTernak = HewanTernak::where('id', 'like', '%' . $cari . '%')->get();

    return view('kesehatan_hewan.halamanDetailKesehatanHewan', compact('hewanTernak'));
}
}
