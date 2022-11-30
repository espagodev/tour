<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BilletesPlazo extends Model
{
    use HasFactory;

    protected $fillable = [
        'factura_id',
        'agenda_id',
        'user_id',
        'mayorista_id',
        'categoria_id',
        'sub_categoria_id',
        'bilp_localizador',
        'bilp_precio_total',
        'bilp_precio_proveedor',
        'bilp_saldo_cliente',
        'bilp_saldo_proveedor',
        'bilp_fecha_viaje',
        'bilp_fecha_retorno',
    ];

    /**
     * Obtener el clente.
     */
    public function agenda()
    {
        return $this->hasOne(\App\Models\Agenda::class,'id');
    }

    public function agente()
    {
        return $this->hasOne(\App\Models\User::class,'id');
    }

    public function mayorista()
    {
        return $this->hasOne(\App\Models\Mayorista::class,'id');
    }

    public function categoria()
    {
        return $this->hasOne(\App\Models\Categoria::class,'id');
    }

    // public function factura()
    // {
    //     return $this->hasOne(\App\Models\Factura::class,'id');
    // }

    public function setBilpLocalizadorAttribute($valor)
    {
        $this->attributes['bilp_localizador'] = strtolower($valor);
    }
    public function getBilpLocalizadorAttribute($valor)
    {
        return ucwords($valor);
    }
}
