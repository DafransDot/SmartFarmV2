<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HewanTernak extends Model
{
    use HasFactory;
    protected $table = 'hewan_ternaks';
    protected $fillable = [
        'nomor_tag',
        'jenis_sapi',
        'umur',
        'berat_badan',
        'jenis_kelamin',
        'jumlah_anak',
        'status_melahirkan',
        'riwayat_cekkesehatan',
        'riwayat_penanganan',
        'status_penanganan',
        'riwayat_penyakit',
        'id_kelompok',
    ];


    public function kelompokTernak()
    {
        return $this->belongsTo(KelompokTernak::class, 'id_kelompok');
    }
}
