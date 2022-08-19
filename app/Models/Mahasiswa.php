<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    public $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';

    protected $fillable = [
       'id_user', 
       'npm',
       'kelas',
    ];

    /**
     * Get the user that have mahasiswa role.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_mahasiswa');
    }
}
