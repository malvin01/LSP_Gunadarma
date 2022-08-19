<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    public $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
       'id_kursus', 
       'waktu_kursus',
    ];

    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'id_kursus', 'id_kursus');
    }
}
