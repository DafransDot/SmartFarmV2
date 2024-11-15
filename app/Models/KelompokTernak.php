<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokTernak extends Model
{
    use HasFactory;
    protected $table = 'kelompok_ternak'; // Nama tabel di database

    protected $fillable = [
        'nama_kelompok',
        'lokasi',
        'jumlah_ternak',
    ];
    public $timestamps = false;
}
