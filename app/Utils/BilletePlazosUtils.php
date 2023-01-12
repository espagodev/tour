<?php

namespace App\Utils;

use App\Models\BilletesPlazo;
use App\Models\Factura;
use App\Models\MovimientoAlerta;
use App\Models\MovimientoContable;
use App\Models\MovimientoObservaciones;
use Illuminate\Support\Facades\DB;

class BilletePlazosUtils
{

    //localizador,mayorista, categoria, nombre 
    public static function billetesPlazos($request)
    {

        $query = DB::table('facturas')
            ->select(
                'facturas.id',
                'fac_nota_credito',
                'may_nombre',
                'facturas.created_at as fecha',
                'bilp_localizador',
                'bilp_precio_total',
                'bilp_saldo_cliente',
                'bilp_saldo_proveedor',
                'bilp_precio_proveedor',
                DB::raw("CONCAT(COALESCE(agendas.agd_nombres, ''),' ',COALESCE(agendas.agd_apellidos, '')) as full_name_agenda"),
            )
            ->leftjoin('billetes_plazos', function ($join) {
                $join->on('facturas.id', '=', 'billetes_plazos.factura_id');
            })->join('agendas', function ($join) {
                $join->on('facturas.agenda_id', '=', 'agendas.id');
            })->join('mayoristas', function ($join) {
                $join->on('facturas.mayorista_id', '=', 'mayoristas.id');
            })

            ->where('facturas.user_id', auth()->user()->id)
            ->where('facturas.fac_tipo_documento', '3');

        // Filtrar por Fechas
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];

        if (!empty($start_date) && !empty($end_date)) {
            self::FiltroFecha($query, $start_date, $end_date);
        }

        $mayorista_id = $request['mayorista_id'];
        if (!empty($mayorista_id)) {
            self::FiltroMayorista($query, $mayorista_id);
        }

        $bilp_localizador = $request['localizador'];
        if (!empty($bilp_localizador)) {
            self::FiltroLocalizador($query, $bilp_localizador);
        }

        $query->orderByDesc('facturas.id');


        return  $query->get();

    }

    public static function BilletePlazoId($Id)
    {
        $query = DB::table('facturas')
            ->select(
                'facturas.id',
                'facturas.fac_nota_credito',
                'facturas.mayorista_id',
                'facturas.categoria_id',
                'facturas.observaciones_id',
                'facturas.info_factura_id',
                'facturas.created_at',
                'facturas.fac_total',
                'facturas.fac_total_pagado',
                'facturas.fac_total_pendiente',
                'facturas.fac_total_descuento',
                'facturas.fac_total_fee',
                'facturas.fac_total_impuesto',
                'facturas.fac_firma',
                'facturas.estado_id',
                'facturas.fac_fecha',
                'facturas.fac_fecha_vencimiento',
                'agd_direccion',
                'agd_telefono',
                'agd_email',
                'pai_nombre',
                'pro_nombre',
                'mun_nombre',
                'cat_nombre',
                'may_nombre',
                'billetes_plazos.id as billetes_plazos_id',
                'bilp_localizador',
                'bilp_precio_total',
                'bilp_precio_proveedor',
                'bilp_saldo_cliente',
                'bilp_saldo_proveedor',
                'bilp_fecha_viaje',
                'bilp_fecha_retorno',               
                'fop_nombre',
                'obs_observacion',
                DB::raw("CONCAT(COALESCE(agendas.agd_nombres, ''),' ',COALESCE(agendas.agd_apellidos, '')) as full_name_agenda"),
                DB::raw("CONCAT(COALESCE(users.nombres, ''),' ',COALESCE(users.apellidos, '')) as full_name_agente"),
                DB::raw("CONCAT(COALESCE(tipo_documentos.tid_nombre, ''),' ',COALESCE(agendas.agd_documento, '')) as documento")

                )

                ->leftjoin('billetes_plazos', function ($join) {
                    $join->on('facturas.id', '=', 'billetes_plazos.factura_id');
                }) ->join('agendas', function ($join) {
                    $join->on('facturas.agenda_id', '=', 'agendas.id');
                })->join('users', function ($join) {
                    $join->on('facturas.user_id', '=', 'users.id');
                })->leftjoin('forma_pagos', function ($join) {
                    $join->on('facturas.forma_pago_id', '=', 'forma_pagos.id');
                })->join('tipo_documentos', function ($join) {
                    $join->on('agendas.tipo_documento_id', '=', 'tipo_documentos.id');
                }) ->leftjoin('pais', function ($join) {
                    $join->on('agendas.pais_id', '=', 'pais.id');
                })  ->leftjoin('provincias', function ($join) {
                    $join->on('agendas.provincia_id', '=', 'provincias.id');
                }) ->leftjoin('municipios', function ($join) {
                    $join->on('agendas.municipio_id', '=', 'municipios.id');
                })->join('mayoristas', function ($join) {
                    $join->on('facturas.mayorista_id', '=', 'mayoristas.id');
                })->join('categorias', function ($join) {
                    $join->on('facturas.categoria_id', '=', 'categorias.id');
                })->leftjoin('observaciones', function ($join) {
                    $join->on('facturas.observaciones_id', '=', 'observaciones.id');
                })

                
                ->where('facturas.id', $Id)
                // ->groupBy('facturas.id')
            ;
        return    $query->first();
    }

    public static function facturaConceptos($Id) 
    {
        $query = DB::table('facturas')->select(
            'CON.id',
            'CON.impuesto_id',
            'CON.sub_categoria_id',
            'CON.con_descripcion',
            'CON.descripcion_id',
            'CON.con_cantidad',
            'SUBC.subc_nombre',
            'CON.con_monto',
            'CON.con_fee',
            'CON.con_descuento',
            'DESC.des_nombre'
        )->leftjoin('conceptos as CON', function ($join) {
            $join->on('facturas.id', '=', 'CON.factura_id');
        })->leftjoin('sub_categorias AS SUBC', function ($join) {
            $join->on('CON.sub_categoria_id', '=', 'SUBC.id');
        })->leftjoin('descripciones AS DESC', function ($join) {
            $join->on('CON.descripcion_id', '=', 'DESC.id');
        }) ->where('facturas.id', $Id);

        return    $query->get();
    }

    public static function facturaPagos($Id)
    {
        $query = DB::table('facturas')->select(
            'MVC.id',
            'MVC.moc_numero',
            'MVC.moc_monto',
            'MVC.moc_fecha',
            'MVC.moc_descripcion'
            ) ->leftjoin('movimiento_contables as MVC', function ($join) {
                $join->on('facturas.id', '=', 'MVC.factura_id')
               ->where('MVC.moc_contable','=','1');
            }) ->where('facturas.id', $Id);

            return    $query->get();
    }

    public static function facturaPasajeros($Id)
    {
        $query = DB::table('facturas')->leftjoin('conceptos as CON', function ($join) {
            $join->on('facturas.id', '=', 'CON.factura_id');
        }) ->where('facturas.id', $Id);
    }

    public static function BilletePlazoPdfId($Id)
    {
        $query = DB::table('facturas')
            ->select(
                'facturas.id',
                'facturas.fac_nota_credito',
                'facturas.mayorista_id',
                'facturas.categoria_id',
                'facturas.observaciones_id',
                'facturas.info_factura_id',
                'facturas.created_at',
                'facturas.fac_total',
                'facturas.fac_total_pagado',
                'facturas.fac_total_pendiente',
                'facturas.fac_total_descuento',
                'facturas.fac_total_fee',
                'facturas.fac_firma',
                'agd_direccion',
                'agd_telefono',
                'agd_email',
                'pai_nombre',
                'pro_nombre',
                'mun_nombre',
                'cat_nombre',
                'may_nombre',
                'billetes_plazos.id as billetes_plazos_id',
                'bilp_localizador',
                'bilp_precio_total',
                'bilp_precio_proveedor',
                'bilp_saldo_cliente',
                'bilp_saldo_proveedor',
                'bilp_fecha_viaje',
                'bilp_fecha_retorno',               
                'fop_nombre',
                'obs_observacion',
                DB::raw("CONCAT(COALESCE(agendas.agd_nombres, ''),' ',COALESCE(agendas.agd_apellidos, '')) as full_name_agenda"),
                DB::raw("CONCAT(COALESCE(users.nombres, ''),' ',COALESCE(users.apellidos, '')) as full_name_agente"),
                DB::raw("CONCAT(COALESCE(tipo_documentos.tid_nombre, ''),' ',COALESCE(agendas.agd_documento, '')) as documento")
                
                )

                ->leftjoin('billetes_plazos', function ($join) {
                    $join->on('facturas.id', '=', 'billetes_plazos.factura_id');
                }) ->join('agendas', function ($join) {
                    $join->on('facturas.agenda_id', '=', 'agendas.id');
                })->join('users', function ($join) {
                    $join->on('facturas.user_id', '=', 'users.id');
                })->leftjoin('forma_pagos', function ($join) {
                    $join->on('facturas.forma_pago_id', '=', 'forma_pagos.id');
                })->join('tipo_documentos', function ($join) {
                    $join->on('agendas.tipo_documento_id', '=', 'tipo_documentos.id');
                }) ->leftjoin('pais', function ($join) {
                    $join->on('agendas.pais_id', '=', 'pais.id');
                })  ->leftjoin('provincias', function ($join) {
                    $join->on('agendas.provincia_id', '=', 'provincias.id');
                }) ->leftjoin('municipios', function ($join) {
                    $join->on('agendas.municipio_id', '=', 'municipios.id');
                })->join('mayoristas', function ($join) {
                    $join->on('facturas.mayorista_id', '=', 'mayoristas.id');
                })->join('categorias', function ($join) {
                    $join->on('facturas.categoria_id', '=', 'categorias.id');
                })->leftjoin('observaciones', function ($join) {
                    $join->on('facturas.observaciones_id', '=', 'observaciones.id');
                })

                
                ->where('facturas.id', $Id)
                // ->groupBy('facturas.id')
            ;
        return    $query->first();
    }

    public static function crearBilleteAplazos($request,  $facturaId)
    {

        if ($request->input('mayorista_id') == 1) {
            $bilp_precio_proveedor = 0;
            $bilp_saldo_cliente = 0;
            $bilp_saldo_proveedor = 0;
        } else {
            $bilp_precio_proveedor = $request->input('bilp_precio_proveedor') ?? 0;
            $bilp_saldo_cliente = $request->input('bilp_precio_total') ?? 0;
            $bilp_saldo_proveedor = $request->input('bilp_precio_proveedor') ?? 0;
        }

        $billeteplazo = BilletesPlazo::create([

            'factura_id' => $facturaId,
            'agenda_id' => $request->input('agenda_id'),
            'user_id' => auth()->user()->id,

            'mayorista_id' => $request->input('mayorista_id'),
            'categoria_id' => $request->input('categoria_id'),
            'bilp_localizador' => $request->input('bilp_localizador'),
            'bilp_precio_total' => $request->input('bilp_precio_total'),
            'bilp_precio_proveedor' => $bilp_precio_proveedor,
            'bilp_saldo_cliente' => $bilp_saldo_cliente,
            'bilp_saldo_proveedor' => $bilp_saldo_proveedor,
            'bilp_fecha_viaje' => $request->input('bilp_fecha_viaje'),
            'bilp_fecha_retorno' => $request->input('bilp_fecha_retorno'),

        ]);

        return $billeteplazo;
    }

    public static function updateBilleteAplazos($request,$facturaId)
    {
        $billetePlazo = BilletesPlazo::where('factura_id',$facturaId)->first();

        if($billetePlazo->bilp_precio_proveedor != $request->bilp_precio_proveedor){

            if($request->bilp_precio_proveedor > $billetePlazo->bilp_precio_proveedor){
                $bilp_precio_proveedor_dif = ($request->bilp_precio_proveedor - $billetePlazo->bilp_precio_proveedor);
                $bilp_saldo_proveedor = $billetePlazo->bilp_saldo_proveedor + $bilp_precio_proveedor_dif;
            }else{
                $bilp_precio_proveedor_dif = ($billetePlazo->bilp_precio_proveedor - $request->bilp_precio_proveedor);
                $bilp_saldo_proveedor = $billetePlazo->bilp_saldo_proveedor - $bilp_precio_proveedor_dif;
            }
        }

        if($billetePlazo->bilp_precio_total != $request->bilp_precio_total){

            if($request->bilp_precio_total > $billetePlazo->bilp_precio_total){
                $bilp_precio_total_dif = ($request->bilp_precio_total - $billetePlazo->bilp_precio_total);
                $bilp_saldo_cliente = $billetePlazo->bilp_saldo_cliente + $bilp_precio_total_dif;
            }else{
                $bilp_precio_total_dif = ($billetePlazo->bilp_precio_total - $request->bilp_precio_total);
                $bilp_saldo_cliente = $billetePlazo->bilp_saldo_cliente - $bilp_precio_total_dif;
            }
        }

        BilletesPlazo::where('id', $billetePlazo->id)->update([
            'bilp_localizador' => $request->input('bilp_localizador'),
            'bilp_precio_total' => $request->bilp_precio_total,
            'bilp_precio_proveedor' => $request->bilp_precio_proveedor,
            'bilp_saldo_cliente' => !empty($bilp_saldo_cliente) ? $bilp_saldo_cliente : $billetePlazo->bilp_saldo_cliente,
            'bilp_saldo_proveedor' => !empty($bilp_saldo_proveedor) ? $bilp_saldo_proveedor : $billetePlazo->bilp_saldo_proveedor,
            'bilp_fecha_viaje' => $request->input('bilp_fecha_viaje'),
            'bilp_fecha_retorno' => $request->input('bilp_fecha_retorno')]);
        // return $billeteplazo;
    }
    public static function actualizarTotalBilletePlazos($movimiento)
    {
        $billetePlazo = BilletesPlazo::where('id', $movimiento->billetes_plazos_id)->first();

        if($billetePlazo->bilp_saldo_cliente == 0){

            $bilp_saldo_cliente = $billetePlazo->bilp_precio_total - $movimiento->moc_monto;
        }else{
            $bilp_saldo_cliente = $billetePlazo->bilp_saldo_cliente - $movimiento->moc_monto;
        }
        
        // if ($billetePlazo->bilp_precio_total ==  $bilp_saldo_cliente) {
        //     BilletesPlazo::where('id', $movimiento->billetes_plazos_id)->update(['bilp_saldo_cliente' => $bilp_saldo_cliente]);
        // } else {
            BilletesPlazo::where('id', $movimiento->billetes_plazos_id)->update(['bilp_saldo_cliente' => $bilp_saldo_cliente]);
        // }

    }

    public static function actualizarTotalMayoristaBilletePlazos($movimiento)
    {
        $billetePlazo = BilletesPlazo::where('id', $movimiento->billetes_plazos_id)->first();

        if($billetePlazo->bilp_saldo_proveedor == 0){

            $bilp_saldo_proveedor = $billetePlazo->bilp_precio_proveedor - $movimiento->moc_monto;
        }else{
            $bilp_saldo_proveedor = $billetePlazo->bilp_saldo_proveedor - $movimiento->moc_monto;
        }
        
        // if ($billetePlazo->bilp_precio_proveedor ==  $bilp_saldo_proveedor) {
        //     BilletesPlazo::where('id', $movimiento->billetes_plazos_id)->update(['bilp_saldo_proveedor' => $bilp_saldo_proveedor]);
        // } else {
            BilletesPlazo::where('id', $movimiento->billetes_plazos_id)->update(['bilp_saldo_proveedor' => $bilp_saldo_proveedor]);
        // }

    }
    public static function saldos($request)
    {

        $query = Factura::where('user_id', auth()->user()->id)
        ->select(
            DB::raw("SUM(fac_total_pendiente) As saldo_cliente"),
            DB::raw("SUM(fac_total_pendiente) As saldo_proveedor"),
            DB::raw("SUM(fac_total_fee) As total_fee"),
        )
        ->where('fac_tipo_documento','3')
        ->groupBy('facturas.user_id');

        // $query = BilletesPlazo::where('user_id', auth()->user()->id)
        //     ->select(
        //         DB::raw("SUM(bilp_saldo_cliente) As saldo_cliente"),
        //         DB::raw("SUM(bilp_saldo_proveedor) As saldo_proveedor"),
                
        //     )
        //     ->groupBy('billetes_plazos.user_id');

        // Filtrar por Fechas
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];

        if (!empty($start_date) && !empty($end_date)) {
            self::FiltroFechasaldo($query, $start_date, $end_date);
        }

        $mayorista_id =  !empty($request['mayorista_id']) ? $request['mayorista_id'] : null;
        if ($mayorista_id) {
            self::FiltroMayoristaSaldo($query, $mayorista_id);
        }

        $bilp_localizador = $request['localizador'];
        if (!empty($bilp_localizador)) {
            self::FiltroLocalizador($query, $bilp_localizador);
        }

        // dd($query);
        return $query->first();
    }


    public static function movimientos($movimiento, $facturaId)
    {
        $query = MovimientoContable::where('moc_contable', $movimiento)
            ->where('factura_id', $facturaId);

        return $query->get();
    }

    public static function alertas($facturaId)
    {
        $query = MovimientoAlerta::where('factura_id', $facturaId);

        return $query->get();
    }

    public static function observaciones($facturaId)
    {
        $query = MovimientoObservaciones::where('factura_id', $facturaId);

        return $query->get();
    }

    public static function FiltroFechasaldo($query, $start_date, $end_date)
    {
        return  $query->whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date);
    }

    public static function FiltroFecha($query, $start_date, $end_date)
    {
        return  $query->whereDate('facturas.created_at', '>=', $start_date)
            ->whereDate('facturas.created_at', '<=', $end_date);
    }

    public static function FiltroMayoristaSaldo($query, $mayorista_id)
    {
        return $query->where('mayorista_id', $mayorista_id);
    }

    public static function FiltroMayorista($query, $mayorista_id)
    {
        return $query->where('facturas.mayorista_id', $mayorista_id);
    }

    public static function FiltroLocalizador($query, $bilp_localizador)
    {
        return $query->where('bilp_localizador', $bilp_localizador);
    }
}
