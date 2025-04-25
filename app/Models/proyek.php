<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class proyek extends Model
{
    protected $table = 'proyeks';
    protected $fillable = [
        'nama_proyek',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
}
