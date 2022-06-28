<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepat extends Model
{
    use HasFactory;

    protected $table = 'spareparts';
    protected $fillable = [
        'sparepart' => 'sparepart',
    ];

    /* public function brand()
    {
        return $this->hasMany(Brand::class);
    } */

}
