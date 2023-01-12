<?php

namespace App\Utils;

use App\Models\BilletesPlazo;
use App\Models\Factura;
use App\Models\MovimientoAlerta;
use App\Models\MovimientoContable;
use App\Models\MovimientoObservaciones;
use App\Models\PagoBillete;
use Illuminate\Support\Facades\DB;

class ReciboCajaUtils
{


    public static function recibosCaja($request)
    {
        $query = DB::table('facturas')
            ->select(
                'facturas.id',
                'fac_recibo',
                'fac_total_pagado',
                'fac_total_pendiente',                
                'agd_telefono',
                'facturas.created_at as fecha',
                'may_nombre',
                'fac_total',
                'fop_nombre',
                'est_nombre',
                'estado_id',
                DB::raw("CONCAT(COALESCE(agendas.agd_nombres, ''),' ',COALESCE(agendas.agd_apellidos, '')) as full_name_agenda"),
                DB::raw("CONCAT(COALESCE(tipo_documentos.tid_nombre, ''),' ',COALESCE(agendas.agd_documento, '')) as documento")
            )
            ->join('agendas', function ($join) {
                $join->on('facturas.agenda_id', '=', 'agendas.id');
            })->join('mayoristas', function ($join) {
                $join->on('facturas.mayorista_id', '=', 'mayoristas.id');
            })->join('tipo_documentos', function ($join) {
                $join->on('agendas.tipo_documento_id', '=', 'tipo_documentos.id');
            })->leftjoin('forma_pagos', function ($join) {
                $join->on('facturas.forma_pago_id', '=', 'forma_pagos.id');
            })->leftjoin('estados', function ($join) {
                $join->on('facturas.estado_id', '=', 'estados.id');
            })
            ->where('facturas.user_id', auth()->user()->id)
            ->where('facturas.fac_tipo_documento', '2')
            ;


        // Filtrar por Fechas
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];

        if (!empty($start_date) && !empty($end_date)) {
            self::FiltroFecha($query, $start_date, $end_date);
        }
        //    //Filtrar por mayorista
        $mayorista_id = $request['mayorista_id'];
        if (!empty($mayorista_id)) {
            self::FiltroMayorista($query, $mayorista_id);
        }

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

    public static function reciboCajaId($Id)
    {

        $query = DB::table('facturas')
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

    public static function facturaConceptos($Id)
    {
        $query = DB::table('facturas')->select(
            'CON.id',
            'CON.impuesto_id', 
            'CON.sub_categoria_id', 
            'CON.descripcion_id', 
            'CON.con_descripcion', 
            'CON.con_cantidad', 
            'SUBC.subc_nombre', 
            'CON.con_monto', 
            'CON.con_fee', 
            'CON.con_descuento',
            'DESC.des_nombre'
        )->leftjoin('conceptos as CON', function ($join) {
            $join->on('facturas.id', '=', 'CON.factura_id');
        }) ->leftjoin('sub_categorias AS SUBC', function ($join) {
            $join->on('CON.sub_categoria_id', '=', 'SUBC.id');
        }) ->leftjoin('descripciones AS DESC', function ($join) {
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
        $query = DB::table('facturas')
        ->select(
        'PAS.id',
        'factura_id',
        'agenda_id',
        'user_id',
        'pais_id',
        'sub_categoria_id',
        'pas_localizador',
        'pas_fecha_salidad',
        'pas_fecha_regreso',
        'pas_valor_individual'
        )
        ->leftjoin('pasajeros as PAS', function ($join) {
            $join->on('facturas.id', '=', 'PAS.factura_id');
        }) ->leftjoin('pasajeros as PAS', function ($join) {
            $join->on('facturas.id', '=', 'PAS.factura_id');
        }) ->where('facturas.id', $Id);

        return    $query->get();
    }

    public static function ReciboCajaPdfId($Id)
    {
        $query = DB::table('facturas')
            ->select(
                'facturas.id',
                'facturas.fac_recibo',
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
                'fop_nombre',
                'obs_observacion',
                DB::raw("CONCAT(COALESCE(agendas.agd_nombres, ''),' ',COALESCE(agendas.agd_apellidos, '')) as full_name_agenda"),
                DB::raw("CONCAT(COALESCE(users.nombres, ''),' ',COALESCE(users.apellidos, '')) as full_name_agente"),
                DB::raw("CONCAT(COALESCE(tipo_documentos.tid_nombre, ''),' ',COALESCE(agendas.agd_documento, '')) as documento")
                
                )

                 ->join('agendas', function ($join) {
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
    public static function reciboCajaEditId($Id) 
    {

        $query = DB::table('facturas')
            ->select(
                'facturas.id',
                'facturas.fac_recibo',
                'agd_telefono', 
                'agd_direccion',
                'agd_codigo_postal',
                'agd_email',
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
                'facturas.estado_id',
                'facturas.fac_fecha',
                'facturas.fac_fecha_vencimiento',
                'pai_nombre',
                'pro_nombre',
                'mun_nombre',
                'cat_nombre',
                'may_nombre',
                'pai_gentilicio',
                DB::raw("CONCAT(COALESCE(agendas.agd_nombres, ''),' ',COALESCE(agendas.agd_apellidos, '')) as full_name_agenda"),
                DB::raw("CONCAT(COALESCE(users.nombres, ''),' ',COALESCE(users.apellidos, '')) as full_name_agente"),
                DB::raw("CONCAT(COALESCE(tipo_documentos.tid_nombre, ''),' ',COALESCE(agendas.agd_documento, '')) as documento")         
               
                    )  
                
                ->join('agendas', function ($join) {
                    $join->on('facturas.agenda_id', '=', 'agendas.id');
                })->join('users', function ($join) {
                    $join->on('facturas.user_id', '=', 'users.id');
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
                })
            ->where('facturas.id', $Id);

        return    $query->first();
        
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

    public function crearPago($request, $billetes_plazo_id, $factura_id)
    {
        PagoBillete::create([

            'factura_id' => !empty($factura_id) ?  $factura_id : '1-1',
            'billetes_plazo_id' => $billetes_plazo_id,
            'user_id' => auth()->user()->id,
            'pagb_monto' => $request->input('pagb_monto'),
            'pagb_descripcion' => $request->input('pagb_descripcion'),

        ]);
    }


    public static function actualizarTotalPlazos($factura_id, $data)
    {

        Factura::where('id', $factura_id)->update($data); 
    }
    
    public static function actulizarAbonoCliente($factura_id, $total)
    {
        $factura = Factura::where('id', $factura_id)->first();

        $fac_total_pagado = $factura->fac_total_pagado + $total;

        $totalPendiente = $factura->fac_total_pendiente - $total;

        if ($factura->fac_total ==  $fac_total_pagado) {
            Factura::where('id', $factura_id)->update(['fac_total_pendiente' => '0', 'fac_total_pagado' => $fac_total_pagado]);
        } else {
            Factura::where('id', $factura_id)->update(['fac_total_pendiente' => $totalPendiente, 'fac_total_pagado' => $fac_total_pagado]);
        }
    }

    public static function generarDocumento($request, $fac_numero, $fac_recibo, $fac_nota_credito){


        $factura = Factura::create([
            'fac_numero' => $fac_numero,
            'fac_recibo' => $fac_recibo,
            'fac_nota_credito' => $fac_nota_credito,
            'mayorista_id' => $request->input('mayorista_id'),
            'agenda_id' => $request->input('agenda_id'),
            'user_id' => auth()->user()->id,
            'categoria_id' => $request->input('categoria_id'),  
            'fac_tipo_documento' => $request->input('fac_tipo_documento'),
            'fac_fecha' => $request->input('fac_fecha'),
            'fac_fecha_vencimiento' => $request->input('fac_fecha_vencimiento'),
            'estado_id' => '1'            
        ]);
        

        return $factura;
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
}
