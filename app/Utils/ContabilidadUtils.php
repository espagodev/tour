<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;

class ContabilidadUtils
{

    public static function contabilidadTotales($request) 
    {
        $query = DB::table('movimientos')
        ->select(
            'fac_numero',
            'moc_numero',
            'fop_nombre',
            'mov_monto'
        )->join('facturas', function ($join) {
            $join->on('movimientos.factura_id', '=', 'facturas.id');
        })->join('forma_pagos', function ($join) {
            $join->on('movimientos.forma_pago_id', '=', 'forma_pagos.id');
        })->join('movimiento_contables', function ($join) {
            $join->on('movimientos.movimiento_contable_id', '=', 'movimiento_contables.id');
        });

        
         // Filtrar por Fechas
         $start_date = $request['start_date'];
         $end_date = $request['end_date'];
 
         if (!empty($start_date) && !empty($end_date)) {
           self::FiltroFecha($query, $start_date,$end_date);
         }

         //Filtrar por forma de pago
         $forma_pago_id = $request['forma_pago_id'];
         if (!empty($forma_pago_id)) {
          self::FiltroFormaPago($query, $forma_pago_id);
         }

       

        $query->orderByDesc('movimientos.id');


        return $query->get();
    }


    public static function contabildad($request)
    {
        $query = DB::table('movimiento_contables')
        ->where('movimiento_contables.user_id', auth()->user()->id)
        ->select(
            'facturas.fac_numero',
            'facturas.fac_recibo',
            'facturas.fac_nota_credito',
            'fac_tipo_documento',
            'moc_numero',
            'movimientos.forma_pago_id as forma_pago_id_mov' ,
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
         $start_date = $request['start_date'];
         $end_date = $request['end_date'];
 
         if (!empty($start_date) && !empty($end_date)) {
           self::FiltroFecha($query, $start_date,$end_date);
         }

         //Filtrar por forma de pago
         $forma_pago_id = $request['forma_pago_id'];
         if (!empty($forma_pago_id)) {
          self::FiltroFormaPago($query, $forma_pago_id);
         }
       

        $query->orderByDesc('movimiento_contables.id');


        return $query->get();
    }

    // public static function contabildad($request)
    // {
    //     $query = DB::table('movimientos')
    //     ->where('movimientos.user_id', auth()->user()->id)
    //     ->select(
    //         'facturas.fac_numero',
    //         'facturas.fac_recibo',
    //         'facturas.fac_nota_credito',
    //         'moc_numero',
    //         'fop_nombre',
    //         'mov_monto',
    //         'moc_fecha',
    //         'cat_nombre'
    //     )->join('facturas', function ($join) {
    //         $join->on('movimientos.factura_id', '=', 'facturas.id');
    //     })->join('categorias', function ($join) {
    //         $join->on('facturas.categoria_id', '=', 'categorias.id');
    //     })->join('forma_pagos', function ($join) {
    //         $join->on('movimientos.forma_pago_id', '=', 'forma_pagos.id');
    //     })->join('movimiento_contables', function ($join) {
    //         $join->on('movimientos.movimiento_contable_id', '=', 'movimiento_contables.id');
    //     });

    //      // Filtrar por Fechas
    //      $start_date = $request['start_date'];
    //      $end_date = $request['end_date'];
 
    //      if (!empty($start_date) && !empty($end_date)) {
    //        self::FiltroFecha($query, $start_date,$end_date);
    //      }

    //      //Filtrar por forma de pago
    //      $forma_pago_id = $request['forma_pago_id'];
    //      if (!empty($forma_pago_id)) {
    //       self::FiltroFormaPago($query, $forma_pago_id);
    //      }
       

    //     $query->orderByDesc('movimientos.id');


    //     return $query->get();
    // }

    public static function FiltroFecha($query, $start_date, $end_date)
    {
       return  $query->whereDate('movimiento_contables.created_at', '>=', $start_date)
            ->whereDate('movimiento_contables.created_at', '<=', $end_date);
    }

    public static function FiltroFormaPago($query, $forma_pago_id)
    {
       return $query->where('movimiento_contables.forma_pago_id', $forma_pago_id);
    }
}
