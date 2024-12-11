<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\HewanTernak;
use App\Models\KelompokTernak;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Menampilkan form untuk memilih periode dan kelompok laporan
     */
    public function halamanLaporan()
    {
        // Ambil data kelompok ternak untuk dropdown
        $kelompokTernaks = KelompokTernak::all();
        return view('laporan.index', compact('kelompokTernaks'));
    }

    /**
     * Mengenerate laporan dalam bentuk PDF berdasarkan periode dan kelompok yang dipilih
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function buatLaporan(Request $request)
    {
        // Validasi input periode dan kelompok
        $request->validate([
            'periode' => 'required|in:6bulan,1tahun,2tahun,3tahun',
            'kelompok_id' => 'required|exists:kelompok_ternaks,id', // Validasi kelompok
        ]);

        $periode = $request->input('periode');
        $kelompokId = $request->input('kelompok_id'); // Mendapatkan ID kelompok yang dipilih
        $now = now();

        // Tentukan tanggal awal berdasarkan periode
        switch ($periode) {
            case '6bulan':
                $startDate = $now->copy()->subMonths(6);
                break;
            case '1tahun':
                $startDate = $now->copy()->subYear();
                break;
            case '2tahun':
                $startDate = $now->copy()->subYears(2);
                break;
            case '3tahun':
                $startDate = $now->copy()->subYears(3);
                break;
            default:
                $startDate = $now->copy()->subMonths(6);
        }

        // Ambil data HewanTernak berdasarkan kelompok dan periode
        $hewanTernak = HewanTernak::where('created_at', '>=', $startDate)
            ->where('id_kelompok', $kelompokId) // Filter berdasarkan kelompok
            ->with('kelompokTernak') // Eager load data kelompok
            ->get()
            ->map(function ($hewan) {
                // Hitung umur berdasarkan tanggal lahir
                $umur = now()->diffInYears($hewan->tanggal_lahir);

                // Tentukan kategori umur
                if ($umur <= 2) {
                    $hewan->kategori_umur = 'Anak';
                } elseif ($umur <= 5) {
                    $hewan->kategori_umur = 'Muda';
                } else {
                    $hewan->kategori_umur = 'Dewasa';
                }

                return $hewan;
            });

        // Ambil data kelompok ternak yang dipilih
        $kelompok = KelompokTernak::findOrFail($kelompokId);

        if ($hewanTernak->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data hewan ternak untuk periode dan kelompok yang dipilih.');
        }

        // Buat PDF menggunakan view laporan
        $pdf = Pdf::loadView('laporan.laporan-kelompok-ternak', compact('hewanTernak', 'kelompok'));

        // Kembalikan file PDF untuk diunduh
        return $pdf->download('laporan_hewan_ternak_' . $periode . '.pdf');
    }
}
