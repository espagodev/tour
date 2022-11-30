<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoContable extends Model
{
    use HasFactory;

    protected $fillable = [
        'billetes_plazos_id',
        'factura_id',
        'forma_pago_id',
        'user_id',
        'moc_contable',
        'moc_monto',
        'moc_fecha',
        'moc_descripcion',
        'moc_numero',
        'categoria_id',
        'sub_categoria_id',
        'moc_imagen',

    ];
}
