<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    use HasFactory;

    protected $table = 'ppdbs';

    protected $fillable = [
        'user_id',
        'tahun_ajaran',
        'nama_siswa',
        'nisn',
        'jurusan',
        'asal_sekolah',
        'nama_orang_tua',
        'no_whatsapp',
        'status',
    ];

    /**
     * Relasi balik ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
