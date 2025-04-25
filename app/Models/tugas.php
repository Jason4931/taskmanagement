<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tugas extends Model
{
    protected $table = 'tugas';
    protected $fillable = [
        'nama_tugas',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'proyek_id',
        'user_id',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
