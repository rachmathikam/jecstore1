<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand_devices extends Model
{
    use HasFactory;
    protected $table = 'brand_devices';

    protected $fillable = [
        'user_id',
        'name',
        'type_device',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
