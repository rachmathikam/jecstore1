<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komponen extends Model
{
    use HasFactory;
    protected $table = 'komponens';
    protected $fillable = [
        'komponen',
        'harga',
        'brand_id',
        'type_id',
        'sparepart_id',

    ];

     public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function sparepart()
    {
        return $this->belongsTo(Sparepat::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

}
