<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    use HasFactory;

    protected $fillable = [
        'factura_id',
        'agenda_id',
        'user_id',
        'mayorista_id',
        'sub_categoria_id',
        'impuesto_id',
        'descripcion_id',
        'con_descripcion',
        'con_cantidad',
        'con_monto',
        'con_impuesto',
        'con_total',
        'con_descuento',
        'con_localizador',
        'con_fee',
    ];

    
    //Mutadores
    public function setConLocalizadorAttribute($valor)
    {
        $this->attributes['con_localizador'] = strtolower($valor);
    }
    
    public function getConLocalizadorAttribute($valor)
    {
        return strtoupper($valor);
    }
}
