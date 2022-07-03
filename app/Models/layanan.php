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
        'deskripsi',
        'brand_id',
        'type_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
