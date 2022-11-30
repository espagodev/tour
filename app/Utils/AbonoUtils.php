<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;

class AbonoUtils{
    public static function abonoId($Id)
    {

        $query = DB::table('movimiento_contables')
            ->select(
                'movimiento_contables.id',
                'movimiento_contables.factura_id',
                'fac_nota_credito',
                'movimiento_contables.forma_pago_id',
                'agd_telefono', 
                'agd_direccion',
                'agd_email',
                'moc_numero',
                'moc_monto',
                'movimientos.mov_monto',
                'moc_fecha',
                'moc_descripcion',
                'facturas.fac_total',
                'facturas.fac_total_pagado',
                'facturas.fac_total_pendiente',
                DB::raw("CONCAT(COALESCE(agendas.agd_nombres, ''),' ',COALESCE(agendas.agd_apellidos, '')) as full_name_agenda"),
                DB::raw("CONCAT(COALESCE(tipo_documentos.tid_nombre, ''),' ',COALESCE(agendas.agd_documento, '')) as documento")
            )->join('facturas', function ($join) {
                $join->on('movimiento_contables.factura_id', '=', 'facturas.id');
            })->join('agendas', function ($join) {
                $join->on('facturas.agenda_id', '=', 'agendas.id');
            })->join('tipo_documentos', function ($join) {
                $join->on('agendas.tipo_documento_id', '=', 'tipo_documentos.id');
            })->leftjoin('movimientos', function ($join) {
                $join->on('movimientos.movimiento_contable_id', '=', 'movimiento_contables.id')
                ->where('movimientos.forma_pago_id',1);
            })->where('movimiento_contables.id', $Id);

            return    $query->first();
    }
}