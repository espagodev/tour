<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateFormat extends Model
{
    use HasFactory;

    public $table = 'date_format';

    public $fillable = [
        'daf_nombre',
        'daf_detalle',
        'daf_detalle_js',
    ];

}
