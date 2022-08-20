<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KursusMahasiswa extends Model
{
    use HasFactory;

    public $table = 'kursus_mahasiswa';
    protected $primaryKey = 'id_kursus_mahasiswa';

    protected $fillable = [
       'id_jadwal', 
       'id_user',
       'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_kursus_mahasiswa');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id_kursus_mahasiswa');
    }
}
