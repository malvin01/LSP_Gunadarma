<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;

    public $table = 'kursus';
    protected $primaryKey = 'id_kursus';

    protected $fillable = [
       'nama', 
       'keterangan',
       'lama_kursus',
    ];
}
