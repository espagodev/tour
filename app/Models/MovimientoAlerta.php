<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoAlerta extends Model
{
    use HasFactory;

    protected $fillable = [
        'billetes_plazos_id',
        'factura_id',
        'user_id', 
        'moa_fecha',     
        'moa_descripcion',
    ];
}
