<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokTernak extends Model

{
    use HasFactory;
    protected $table = 'kelompok_ternaks';
    protected $fillable = [
        'nama_kelompok',
        'lokasi',
        'jumlah_ternak',
        'foto',
        'user_id', // Menambahkan user_id sebagai relasi
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class); // Relasi dengan model User
    }
}
