<?php

namespace App\Utils;

use App\Models\AjustesDocumentos;
use App\Models\DocumentosContable;

class AjustesDocumentosUtils
{

    public static function codigo($movimiento)  
    {

        $data =  DocumentosUtils::documentoId($movimiento);
      
        $prefijo = $data->doc_prefijo;

        $ultimoMovimiento = $data->doc_conteo;

        $nuevoMovimiento =  $ultimoMovimiento + $data->doc_incremento;
        $movimiento =   str_pad($nuevoMovimiento,  $data->doc_digitos, "0", STR_PAD_LEFT);
        return $prefijo . " " . $movimiento;
    }

    public static function conteo($movimiento)
    {
        $data =  DocumentosUtils::documentoId($movimiento);

        $ultimoMovimiento = $data->doc_conteo;
        $nuevoMovimiento =  $ultimoMovimiento + $data->doc_incremento;

        DocumentosContable::where('id', $movimiento)->update(['doc_conteo' => $nuevoMovimiento]);
        
    }

    // public static function codigoFactura() 
    // {

    //     $data =  AjustesDocumentos::select('ajd_prefijo_factura', 'ajd_incremento', 'ajd_conteo_factura', 'ajd_digitos')->first();

    //     $prefijo = $data->ajd_prefijo_factura;

    //     $ultimoMovimiento = $data->ajd_conteo_factura;

    //     $nuevoMovimiento =  $ultimoMovimiento + $data->ajd_incremento;

    //     $movimiento =   str_pad($nuevoMovimiento,  $data->ajd_digitos, "0", STR_PAD_LEFT);

    //     return $prefijo . " " . $movimiento;
    // }

    // public static function codigoNotaCredito()
    // {

    //     $data =  AjustesDocumentos::select('ajd_prefijo_nota', 'ajd_incremento', 'ajd_conteo_nota', 'ajd_digitos')->first();

    //     $prefijo = $data->ajd_prefijo_nota;

    //     $ultimoMovimiento = $data->ajd_conteo_nota;

    //     $nuevoMovimiento =  $ultimoMovimiento + $data->ajd_incremento;

    //     $movimiento =   str_pad($nuevoMovimiento,  $data->ajd_digitos, "0", STR_PAD_LEFT);

    //     return $prefijo . " " . $movimiento;
    // }
    
    // public static function codigoRecibo()
    // {

    //     $data =  AjustesDocumentos::select('ajd_prefijo_recibo', 'ajd_incremento', 'ajd_conteo_recibo', 'ajd_digitos')->first();

    //     $prefijo = $data->ajd_prefijo_recibo;

    //     $ultimoMovimiento = $data->ajd_conteo_recibo;

    //     $nuevoMovimiento =  $ultimoMovimiento + $data->ajd_incremento;

    //     $movimiento =   str_pad($nuevoMovimiento,  $data->ajd_digitos, "0", STR_PAD_LEFT);

    //     return $prefijo . " " . $movimiento;
    // }

    // public static function codigoGasto()
    // {

    //     $data =  AjustesDocumentos::select('ajd_prefijo_gastos', 'ajd_incremento', 'ajd_conteo_gastos', 'ajd_digitos')->first();

    //     $prefijo = $data->ajd_prefijo_gastos;

    //     $ultimoMovimiento = $data->ajd_conteo_gastos;

    //     $nuevoMovimiento =  $ultimoMovimiento + $data->ajd_incremento;

    //     $movimiento =   str_pad($nuevoMovimiento,  $data->ajd_digitos, "0", STR_PAD_LEFT);

    //     return $prefijo . " " . $movimiento;
    // }

    // public static function codigoIngreso()
    // {

    //     $data =  AjustesDocumentos::select('ajd_prefijo_ingresos', 'ajd_incremento', 'ajd_conteo_ingresos', 'ajd_digitos')->first();

    //     $prefijo = $data->ajd_prefijo_ingresos;

    //     $ultimoMovimiento = $data->ajd_conteo_ingresos;

    //     $nuevoMovimiento =  $ultimoMovimiento + $data->ajd_incremento;

    //     $movimiento =   str_pad($nuevoMovimiento,  $data->ajd_digitos, "0", STR_PAD_LEFT);

    //     return $prefijo . " " . $movimiento;
    // }

    // public static function codigoAjuste()
    // {

    //     $data =  AjustesDocumentos::select('ajd_prefijo_ajustes', 'ajd_incremento', 'ajd_conteo_ajustes', 'ajd_digitos')->first();

    //     $prefijo = $data->ajd_prefijo_ajustes;

    //     $ultimoMovimiento = $data->ajd_conteo_ajustes;

    //     $nuevoMovimiento =  $ultimoMovimiento + $data->ajd_incremento;

    //     $movimiento =   str_pad($nuevoMovimiento,  $data->ajd_digitos, "0", STR_PAD_LEFT);

    //     return $prefijo . " " . $movimiento;
    // }

    // public static function codigoAbonoCliente()
    // {

    //     $data =  AjustesDocumentos::select('ajd_prefijo_abono_cliente', 'ajd_incremento', 'ajd_conteo_abono_cliente', 'ajd_digitos')->first();

    //     $prefijo = $data->ajd_prefijo_abono_cliente;

    //     $ultimoMovimiento = $data->ajd_conteo_abono_cliente;

    //     $nuevoMovimiento =  $ultimoMovimiento + $data->ajd_incremento;

    //     $movimiento =   str_pad($nuevoMovimiento,  $data->ajd_digitos, "0", STR_PAD_LEFT);

    //     return $prefijo . " " . $movimiento;
    // }

    // public static function codigoAbonoMayorista()
    // {

    //     $data =  AjustesDocumentos::select('ajd_prefijo_abono_mayorista', 'ajd_incremento', 'ajd_conteo_abono_mayorista', 'ajd_digitos')->first();

    //     $prefijo = $data->ajd_prefijo_abono_mayorista;

    //     $ultimoMovimiento = $data->ajd_conteo_abono_mayorista;

    //     $nuevoMovimiento =  $ultimoMovimiento + $data->ajd_incremento;

    //     $movimiento =   str_pad($nuevoMovimiento,  $data->ajd_digitos, "0", STR_PAD_LEFT);

    //     return $prefijo . " " . $movimiento;
    // }



    // public static function actualizarConteo($movimiento)
    // {
    //     $data =  AjustesDocumentos::select('ajd_incremento', 'ajd_conteo_factura', 'ajd_conteo_recibo', 'ajd_conteo_nota', 'ajd_conteo_gastos', 'ajd_conteo_ingresos','ajd_conteo_ajustes','ajd_conteo_abono_cliente', 'ajd_conteo_abono_mayorista')->first();


        
    //     switch ($movimiento) {
    //         case 1:
    //             $ultimoMovimiento = $data->ajd_conteo_factura;
    //             $nuevoMovimiento =  $ultimoMovimiento + $data->ajd_incremento;

    //             AjustesDocumentos::where('id', '1')->update(['ajd_conteo_factura' => $nuevoMovimiento]);
    //             break;
            

    //         case 3:
    //             $ultimoMovimiento = $data->ajd_conteo_nota;
    //             $nuevoMovimiento =  $ultimoMovimiento + $data->ajd_incremento;

    //             AjustesDocumentos::where('id', '1')->update(['ajd_conteo_nota' => $nuevoMovimiento]);
    //             break;
    //         case 2:
    //             $ultimoMovimiento = $data->ajd_conteo_recibo;
    //             $nuevoMovimiento =  $ultimoMovimiento + $data->ajd_incremento;

    //             AjustesDocumentos::where('id', '1')->update(['ajd_conteo_recibo' => $nuevoMovimiento]);
    //             break;
    //         case 4:
    //             $ultimoMovimiento = $data->ajd_conteo_abono_cliente;
    //             $nuevoMovimiento =  $ultimoMovimiento + $data->ajd_incremento;

    //             AjustesDocumentos::where('id', '1')->update(['ajd_conteo_abono_cliente' => $nuevoMovimiento]);
    //             break;
    //         case 5:
    //             $ultimoMovimiento = $data->ajd_conteo_abono_mayorista;
    //             $nuevoMovimiento =  $ultimoMovimiento + $data->ajd_incremento;

    //             AjustesDocumentos::where('id', '1')->update(['ajd_conteo_abono_mayorista' => $nuevoMovimiento]);
    //             break;

    //         case 6:
    //             $ultimoMovimiento = $data->ajd_conteo_gastos;
    //             $nuevoMovimiento =  $ultimoMovimiento + $data->ajd_incremento;

    //             AjustesDocumentos::where('id', '1')->update(['ajd_conteo_gastos' => $nuevoMovimiento]);
    //             break;

    //         case 7:
    //             $ultimoMovimiento = $data->ajd_conteo_ingresos;
    //             $nuevoMovimiento =  $ultimoMovimiento + $data->ajd_incremento;

    //             AjustesDocumentos::where('id', '1')->update(['ajd_conteo_ingresos' => $nuevoMovimiento]);
    //             break;

    //         case 8:
    //             $ultimoMovimiento = $data->ajd_conteo_ajustes;
    //             $nuevoMovimiento =  $ultimoMovimiento + $data->ajd_incremento;

    //             AjustesDocumentos::where('id', '1')->update(['ajd_conteo_ajustes' => $nuevoMovimiento]);
    //             break;
           
    //     }
        
    // }
}
