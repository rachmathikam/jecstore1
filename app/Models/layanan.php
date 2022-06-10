<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class layanan extends Model
{
    use HasFactory;
    protected $table = 'layanans';

    protected $fillable = [
        'user_id',
        'kerusakan',
        'keterangan',
        'tanggal',
        'gambar',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
