<?php

namespace App\Utils;

use App\Models\MovimientoContable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IngresosUtils
{

    public static function newIngreso(Request $request)
    {
        $ingreso = new MovimientoContable();

        // Fill model with old input
        if (!empty($request->old())) {
            $ingreso->fill($request->old());
        }

        return $ingreso;
    }

    public static function ingresos($request)
    {
        $query = DB::table('movimiento_contables')
            ->select(
                'movimiento_contables.id',
                'moc_numero',
                'fop_nombre',
                'moc_monto',
                'moc_fecha',
                'subc_nombre',
                'cat_nombre'
            )
            ->leftjoin('categorias', function ($join) {
                $join->on('movimiento_contables.categoria_id', '=', 'categorias.id');
            })->leftjoin('sub_categorias', function ($join) {
                $join->on('movimiento_contables.sub_categoria_id', '=', 'sub_categorias.id');
            })->leftjoin('forma_pagos', function ($join) {
                $join->on('movimiento_contables.forma_pago_id', '=', 'forma_pagos.id');
            })
            ->where('movimiento_contables.user_id', auth()->user()->id)
            ->where('movimiento_contables.moc_contable', '4')
            ;


        // Filtrar por Fechas
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];

        if (!empty($start_date) && !empty($end_date)) {
            self::FiltroFecha($query, $start_date, $end_date);
        }
        //    //Filtrar por mayorista
        // $categoria_id = $request['categoria_id'];
        // if (!empty($categoria_id)) {
        //     self::FiltroCategoria($query, $categoria_id);
        // }

        //Filtrar por forma de pago
        // $forma_pago_id = $request['forma_pago_id'];
        // if (!empty($forma_pago_id)) {
        //     self::FiltroFormaPago($query, $forma_pago_id);
        // }

        //     //Filtrar por cliente
        //     $agd_nombres = $request['agd_nombres'];
        //     if (!empty($agd_nombres)) {
        //      self::FiltroNombre($query, $agd_nombres);
        //     }

        //      //Filtrar por fecha
        //    $agd_nombres = $request['agd_nombres'];
        //    if (!empty($agd_nombres)) {
        //     self::FiltroNombre($query, $agd_nombres);
        //    }

        //     //Filtrar por agente
        //     $agd_nombres = $request['agd_nombres'];
        //     if (!empty($agd_nombres)) {
        //      self::FiltroNombre($query, $agd_nombres);
        //     }

        $query->orderByDesc('movimiento_contables.id');
        return  $query->get();
    }

    public static function ingresoId($Id)
    {

        $query = DB::table('movimiento_contables')
            ->select(
                'facturas.id',
                'fac_recibo',
                'agd_telefono', 
                'agd_direccion',
                'agd_email',
                'facturas.created_at',
                'facturas.fac_total',
                'facturas.fac_total_pagado',
                'facturas.fac_total_pendiente',
                'facturas.estado_id',
                DB::raw("CONCAT(COALESCE(agendas.agd_nombres, ''),' ',COALESCE(agendas.agd_apellidos, '')) as full_name_agenda"),
                DB::raw("CONCAT(COALESCE(users.nombres, ''),' ',COALESCE(users.apellidos, '')) as full_name_agente"),
                DB::raw("CONCAT(COALESCE(tipo_documentos.tid_nombre, ''),' ',COALESCE(agendas.agd_documento, '')) as documento")
            )->join('agendas', function ($join) {
                $join->on('facturas.agenda_id', '=', 'agendas.id');
            })->leftjoin('forma_pagos', function ($join) {
                $join->on('facturas.forma_pago_id', '=', 'forma_pagos.id');
            })->join('users', function ($join) {
                $join->on('facturas.user_id', '=', 'users.id');
            })->join('tipo_documentos', function ($join) {
                $join->on('agendas.tipo_documento_id', '=', 'tipo_documentos.id');
            })->where('facturas.id', $Id);

        return    $query->first();
        
    }

    public static function ingresoEditId($Id)
    {

        $query = DB::table('movimiento_contables')
            ->select(
                'movimiento_contables.id',
                'moc_numero',
                'fop_nombre',
                'moc_monto',
                'moc_fecha',
                'subc_nombre',
                'cat_nombre',
                'moc_imagen',
                'movimiento_contables.forma_pago_id',
                'movimiento_contables.categoria_id',
                'movimiento_contables.sub_categoria_id',
                'moc_descripcion'
            )
            ->leftjoin('categorias', function ($join) {
                $join->on('movimiento_contables.categoria_id', '=', 'categorias.id');
            })->leftjoin('sub_categorias', function ($join) {
                $join->on('movimiento_contables.sub_categoria_id', '=', 'sub_categorias.id');
            })->leftjoin('forma_pagos', function ($join) {
                $join->on('movimiento_contables.forma_pago_id', '=', 'forma_pagos.id');
            })
            ->where('movimiento_contables.id', $Id);

        return    $query->first();
        
    }

    public static function FiltroFecha($query, $start_date, $end_date)
    {
        return  $query->whereDate('movimiento_contables.created_at', '>=', $start_date)
            ->whereDate('movimiento_contables.created_at', '<=', $end_date);
    }

    public static function FiltroCategoria($query, $categoria_id)
    {
        return $query->where('movimiento_contables.categoria_id', $categoria_id);
    }



    public static function FiltroFormaPago($query, $forma_pago_id)
    {
        return $query->where('movimiento_contables.forma_pago_id', $forma_pago_id);
    }

}
