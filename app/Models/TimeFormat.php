<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeFormat extends Model
{
    use HasFactory;

    
    public $table = 'time_format';

    public $fillable = [
        'time_format',
        'tif_nombre',
        'tif_detalle',
        'tif_detalle_js',
    ];

}
