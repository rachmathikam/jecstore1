<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = [
        'brand',

    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function komponen()
    {
        return $this->belongsTo(Komponen::class);
    }

    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class);
    }
}
