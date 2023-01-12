<?php

namespace App\Utils;


use Illuminate\Support\Facades\DB;

class ReportesUtils
{

    
    public static function facturas($start_date, $end_date)
    {
        $query = DB::table('facturas')
            ->select(
                'facturas.id',
                'fac_numero',
                'fac_recibo',
                'fac_nota_credito',
                'fac_total_pagado',
                'fac_total_pendiente',
                'fac_total_fee',     
                'fac_total_descuento',
                // 'fac_total_impuesto',          
                'fac_tipo_documento',   
                'facturas.created_at as fecha',
                'may_nombre',
                'fac_total',
                'fop_nombre',
                'est_nombre',
                'estado_id',
                DB::raw("CONCAT(COALESCE(agendas.agd_nombres, ''),' ',COALESCE(agendas.agd_apellidos, '')) as full_name_agenda")
            )
            ->join('agendas', function ($join) {
                $join->on('facturas.agenda_id', '=', 'agendas.id');
            })->join('mayoristas', function ($join) {
                $join->on('facturas.mayorista_id', '=', 'mayoristas.id');
            })->leftjoin('forma_pagos', function ($join) {
                $join->on('facturas.forma_pago_id', '=', 'forma_pagos.id');
            })->leftjoin('estados', function ($join) {
                $join->on('facturas.estado_id', '=', 'estados.id');
            })
            ->where('facturas.user_id', auth()->user()->id)
            ;


        // Filtrar por Fechas
        // $start_date = $request['start_date'];
        // $end_date = $request['end_date'];

        if (!empty($start_date) && !empty($end_date)) {
            self::FiltroFecha($query, $start_date, $end_date);
        }
        //    //Filtrar por mayorista
        // $mayorista_id = $request['mayorista_id'];
        // if (!empty($mayorista_id)) {
        //     self::FiltroMayorista($query, $mayorista_id);
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

        $query->orderByDesc('facturas.id');
        return  $query->get();
    }

    public static function movimientos($start_date, $end_date)
    {
        $query = DB::table('movimiento_contables')
        ->select(
            'facturas.fac_numero',
            'facturas.fac_recibo',
            'facturas.fac_nota_credito',
            'fac_tipo_documento',
            'moc_numero',
            'movimientos.forma_pago_id as forma_pago_id_mov',
            'fop_nombre',
            'moc_monto',
            'mov_monto',
            'moc_fecha',
            'cat_nombre',
            'subc_nombre'
        )->leftjoin('movimientos', function ($join) {
            $join->on('movimientos.movimiento_contable_id', '=', 'movimiento_contables.id');
        })->leftjoin('facturas', function ($join) {
            $join->on('movimiento_contables.factura_id', '=', 'facturas.id');
        }) ->leftjoin('categorias', function ($join) {
            $join->on('facturas.categoria_id', '=', 'categorias.id');
        })->leftjoin('sub_categorias', function ($join) {
            $join->on('movimiento_contables.sub_categoria_id', '=', 'sub_categorias.id');
        })->leftjoin('forma_pagos', function ($join) {
            $join->on('movimiento_contables.forma_pago_id', '=', 'forma_pagos.id');
        });

         // Filtrar por Fechas
        //  $start_date = $request['start_date'];
        //  $end_date = $request['end_date'];
 
        //  if (!empty($start_date) && !empty($end_date)) {
        //    self::FiltroFecha($query, $start_date,$end_date);
        //  }

        //  //Filtrar por forma de pago
        //  $forma_pago_id = $request['forma_pago_id'];
        //  if (!empty($forma_pago_id)) {
        //   self::FiltroFormaPago($query, $forma_pago_id);
        //  }
       

        $query->where('movimiento_contables.user_id', auth()->user()->id)
        ->orderByDesc('movimiento_contables.id');


        return $query->get();
    }

    public static function FiltroFecha($query, $start_date, $end_date)
    {
        return  $query->whereDate('facturas.created_at', '>=', $start_date)
            ->whereDate('facturas.created_at', '<=', $end_date);
    }

    public static function FiltroFactura($query, $factura_id)
    {
        return $query->where('facturas.id', $factura_id);
    }

    public static function FiltroMayorista($query, $mayorista_id)
    {
        return $query->where('facturas.mayorista_id', $mayorista_id);
    }

    public static function FiltroNombre($query, $agd_nombres)
    {
        return $query->where('facturas.agd_nombres', $agd_nombres);
    }

    public static function FiltroPlazos($query, $fac_plazos)
    {
        return $query->where('facturas.fac_plazos', $fac_plazos);
    }

    public static function FiltroFormaPago($query, $forma_pago_id)
    {
        return $query->where('facturas.forma_pago_id', $forma_pago_id);
    }
}

