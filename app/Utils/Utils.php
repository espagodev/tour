<?php

namespace App\Utils;

use App\Models\DateFormat;
use App\Models\Divisa;
use App\Models\Impuesto;
use App\Models\TimeFormat;
use App\Models\TimeZone;

class Utils{

    public static function totalDigitos()
    {
        return [
            '4' => '4',
            '5' => '5',
            '6' => '6',
        ];
    }

    public static function timeZone()
    {
        return   TimeZone::get();

    }

    public static function timeFormat()
    {
        return   TimeFormat::get();
        
    }

    public static function dateFormat()
    {
        return   DateFormat::get();
        
    }


         /**
     * Retorna Ubicacion simbolo moneda
     */
    public static function ubicacionSimboloMoneda()
    {
        return [
            'before' => 'Antes de la Cantidad',
            'after' => 'Después de la Cantidad'
        ];
    }

    public static function divisa()
    {
        return   Divisa::get();
    }

    public static function get_percent($valor, $impuesto)
    {
        $impuestoValor = Impuesto::select('imp_valor')->where('id',$impuesto)->first();
        // $porcentaje = ((float)$valor * $impuestoValor->imp_valor) / 100; // Regla de tres
        $porcentaje = ((float)$valor * $impuestoValor->imp_valor); // Regla de tres
        $porcentaje = round($porcentaje, 2);  // Quitar los decimales
        return $porcentaje;
    }

    public static function tiposDocumentos()
    {
        return [
            '1' => 'Factura',
            '2' => 'Nota Credito',
            '3' => 'Recibo de Caja'
            // '4' => 'Devolucion'
        ];
    }
}