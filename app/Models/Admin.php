<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public $table = 'admin';
    protected $primaryKey = 'id_admin';

    protected $fillable = [
       'id_user', 
       'nik',
       'alamat',
       'jenis_kelamin'
    ];

    /**
     * Get the user that have admin role.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_admin');
    }
}
