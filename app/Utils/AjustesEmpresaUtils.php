<?php

namespace App\Utils;

use App\Models\AjustesEmpresa;
use Illuminate\Support\Facades\DB;

class AjustesEmpresaUtils{

    public static function ajustesEmpresa(){

        // $empresa  = AjustesEmpresa::get();

        $query = DB::table('ajustes_empresas')
        ->select('tiz_timezone',
                'tif_detalle',
                'div_codigo',
                'div_simbolo',
                'div_separador_miles',
                'div_separador_decimal',
                'daf_detalle',
                'aje_simbolo_moneda',
                'aje_nombre',
                'aje_codigo_turismo'
            )
        ->join('time_zone', function ($join)  {
            $join->on('ajustes_empresas.time_zone_id', '=', 'time_zone.id');                            
        })->join('time_format', function ($join)  {
            $join->on('ajustes_empresas.time_format_id', '=', 'time_format.id');                            
        })->join('divisa', function ($join)  {
            $join->on('ajustes_empresas.divisa_id', '=', 'divisa.id');                            
        })->join('date_format', function ($join)  {
            $join->on('ajustes_empresas.date_format_id', '=', 'date_format.id');                            
        });
     

        return  $query->first();

    }
}
 