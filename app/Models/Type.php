<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = 'type_device';

    protected $fillable = [
        'type',
        'brand_id'

    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

}
