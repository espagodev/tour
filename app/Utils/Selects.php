<?php

namespace App\Utils;

use App\Models\Carpeta;
use App\Models\Categoria;
use App\Models\FormaPago;
use App\Models\Impuesto;
use App\Models\InfoFactura;
use App\Models\Mayorista;
use App\Models\Municipio;
use App\Models\Observaciones;
use App\Models\Pais;
use App\Models\Provincia;

class Selects
{
    public static function opcionesPago()
    {
      return  $opcionesPagos = FormaPago::get();
    }


    public static function documentos()
    {
        return [
            '1' => 'DNI',
            '2' => 'NIE',
            '3' => 'Pasaporte',
            '4' =>  'Otro'
         ];
    }

    public static function plazos()
    {
        return [           
            '0' => 'NO',
            '1' => 'SI'
         ];
    }

    public static function impuestos()
    {
      return  $impuestos = Impuesto::get();
    }

    public static function mayorista()
    {
       return  $mayoristas = Mayorista::get();
    }

    public static function provincias()
    {
       return  $provincias = Provincia::get();
    }

    public static function municipios()
    {
       return  $municipios = Municipio::get();
    }

    public static function observaciones()
    {
       return  $observaciones = Observaciones::get();
    }

    public static function infoFacturas()
    {
       return  $infoFacturas = InfoFactura::get();
    }

    public static function categorias()
    {
       return  $categorias = Categoria::get();
    }

    public static function pais()
    {
       return  $paises = Pais::get();
    }

    public static function carpetas()
    {
       return  $carpetas = Carpeta::get();
    }
}