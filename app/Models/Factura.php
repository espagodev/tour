<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'agenda_id',
        'user_id',
        'categoria_id',
        'sub_categoria_id',
        'observaciones_id',
        'info_factura_id',
        'mayorista_id',
        'forma_pago_id',
        'fac_total',
        'fac_plazos',
        'fac_numero',
        'fac_recibo',
        'fac_nota_credito',
        'fac_total_pagado',
        'fac_total_pendiente',
        'estado_id',
        'fac_tipo_documento',
        'fac_total_fee',
        'fac_total_descuento',
        'fac_firma',
        'fac_total_impuesto',
        'fac_fecha',
        'fac_fecha_vencimiento',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
    /**
     * Obtener el mayoritas.
     */
    public function mayorista()
    {
        return $this->hasOne(\App\Models\Mayorista::class,'id');
    }

    /**
     * Obtener el clente.
     */
    public function agenda()
    {
        return $this->hasMany(Agenda::class);
    }

    
    public function agente()
    {
        return $this->hasOne(\App\Models\User::class,'id');
    }

    public function categoria()
    {
        return $this->hasOne(\App\Models\Categoria::class,'id');
    }
    
    public function formaPago()
    {
        return $this->hasOne(\App\Models\FormaPago::class,'id');
    }
    public function billetePlazo()
    {
        return $this->hasOne(\App\Models\BilletesPlazo::class,'id','factura_id');
    }

    public function conceptos()
    {
        return $this->hasMany(Concepto::class);
    }

    public function pasajeros()
    {
        return $this->hasMany(Pasajero::class);
    }


}
