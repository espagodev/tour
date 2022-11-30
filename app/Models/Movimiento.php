<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'factura_id',
        'user_id',
        'categoria_id',
        'sub_categoria_id',
        'forma_pago_id',
        'billetes_plazos_id',
        'movimiento_contable_id',
        'mov_monto',
        'mov_descripcion',
    ];

}
