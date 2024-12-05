<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HewanTernak extends Model
{
    use HasFactory;
    protected $table = 'hewan_ternak';
    protected $fillable = [
        'jenis_sapi',
        'umur',
        'id_kelompok',
        'jenis_kelamin',
        'riwayat_penyakit',
        'riwayat_pemeriksaan',
    ];
    public $timestamps = false;

    public function kelompokTernak()
    {
        return $this->belongsTo(KelompokTernak::class, 'id_kelompok');
    }
}
