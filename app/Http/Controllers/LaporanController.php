<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\HewanTernak;
use App\Models\KelompokTernak;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Menampilkan form untuk memilih periode laporan
     */
    public function halamanLaporan()
    {
        return view('laporan.index');
    }

    /**
     * Mengenerate laporan dalam bentuk PDF berdasarkan periode yang dipilih
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function buatLaporan(Request $request)
    {
        // Validasi input periode
        $request->validate([
            'periode' => 'required|in:6bulan,1tahun,2tahun,3tahun',
        ]);

        $periode = $request->input('periode');
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

        // Ambil data KelompokTernak beserta hewan ternaknya
        $kelompokTernaks = KelompokTernak::with(['hewanTernak' => function ($query) use ($startDate) {
            $query->where(function ($query) use ($startDate) {
                $query->where('created_at', '>=', $startDate)
                      ->orWhereNotNull('status_pengurangan'); 
            });
        }])->get()
          ->map(function ($kelompok) {
              // Map setiap hewan ternak untuk menghitung kategori umur
              $kelompok->hewanTernak = $kelompok->hewanTernak->map(function ($hewan) {
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

              return $kelompok;
          });

        if ($kelompokTernaks->isEmpty()) {
            return redirect()->back()
            ->with('error', 'Tidak ada data kelompok ternak untuk periode yang dipilih.');
        }

        // Buat PDF menggunakan view laporan
        $pdf = Pdf::loadView('laporan.laporan-kelompok-ternak', compact('kelompokTernaks', 'periode'));

        // Kembalikan file PDF untuk diunduh
        return $pdf->download('laporan_hewan_ternak_' . $periode . '.pdf');
    }
}
