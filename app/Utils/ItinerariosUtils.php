<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;

class ItinerariosUtils{

    public static function itinerarios($request)
    {

        $query = DB::table('pasajeros')
            ->select(
                'pasajeros.id',
                'pas_localizador',
                'pas_fecha_salidad',
                'pas_fecha_regreso',
                'agd_email',
                'fac_numero',
                'fac_recibo',
                'fac_nota_credito',
                'subc_nombre',
               
                DB::raw("CONCAT(COALESCE(agendas.agd_nombres, ''),' ',COALESCE(agendas.agd_apellidos, '')) as full_name_agenda"),
            )
           ->join('agendas', function ($join) {
                $join->on('pasajeros.agenda_id', '=', 'agendas.id');
            })->join('sub_categorias', function ($join) {
                $join->on('pasajeros.sub_categoria_id', '=', 'sub_categorias.id');
            })->join('facturas', function ($join) {
                $join->on('pasajeros.factura_id', '=', 'facturas.id');
            })
            ;

        // Filtrar por Fechas
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];

        if (!empty($start_date) && !empty($end_date)) {
            self::FiltroFecha($query, $start_date, $end_date);
        }

        // $mayorista_id = $request['mayorista_id'];
        // if (!empty($mayorista_id)) {
        //     self::FiltroMayorista($query, $mayorista_id);
        // }

        $pas_localizador = $request['localizador'];
        if (!empty($pas_localizador)) {
            self::FiltroLocalizador($query, $pas_localizador);
        }

        $query->orderByDesc('pasajeros.id');


        return  $query->get();

    }

    public static function FiltroFecha($query, $start_date, $end_date)
    {
        return  $query->whereDate('pasajeros.created_at', '>=', $start_date)
            ->whereDate('pasajeros.created_at', '<=', $end_date);
    }

    public static function FiltroMayoristaSaldo($query, $mayorista_id)
    {
        return $query->where('mayorista_id', $mayorista_id);
    }
    public static function FiltroMayorista($query, $mayorista_id)
    {
        return $query->where('facturas.mayorista_id', $mayorista_id);
    }

    public static function FiltroLocalizador($query, $pas_localizador)
    {
        return $query->where('pas_localizador', $pas_localizador);
    }
}