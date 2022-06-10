<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;
    protected $table = 'teknisis';
    
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'no_reg',
        'no_telp',
        'alamat',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
