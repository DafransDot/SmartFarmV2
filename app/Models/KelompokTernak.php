<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokTernak extends Model

{
    use HasFactory;
    protected $fillable = [
        'nama_kelompok',
        'nama_ketua',
        'lokasi',
        'jumlah_ternak',
        'foto',
        'user_id',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function hewanTernak()
    {
        return $this->hasMany(HewanTernak::class, 'id_kelompok');
    }
}
