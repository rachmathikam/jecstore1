<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'no_telp',
        'alamat',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
