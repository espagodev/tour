<?php

namespace App\Utils;

use App\Models\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiciosUtils{

    public static function newServicios(Request $request)
    {
        $servicios = new Servicios();

        // Fill model with old input
        if (!empty($request->old())) {
            $servicios->fill($request->old());
        }

        return $servicios;
    }

    public static function servicios($request)
    {

        $query = DB::table('servicios')
            ->select(
                'servicios.id',
                'ser_nombre',
                'ser_imagen',
                'ser_link_especial',
                'ser_link_normal',
                'ser_notas',
                'ser_usuario',
                'ser_password',
                'cat_nombre'
            )
            ->leftjoin('categorias', function ($join) {
                $join->on('servicios.categoria_id', '=', 'categorias.id');
            });
              
               //Filtrar por Carpeta
            //    $categoria_id = $request['categoria_id'];
            //    if (!empty($categoria_id)) {
            //     self::FiltroCategoria($query, $categoria_id);
            //    }     
                     


               $query->orderByDesc('servicios.id');

               return  $query->get();
       
              

    }

    public static function servicioId($Id)
    {

        $query = DB::table('servicios')
            ->select(
                'servicios.id',
                'categoria_id',
                'ser_nombre',
                'ser_imagen',
                'ser_link_especial',
                'ser_link_normal',
                'ser_notas',
                'ser_usuario',
                'ser_password',
                'ser_estado',     
            )->join('categorias', function ($join) {
                $join->on('servicios.categoria_id', '=', 'categorias.id');
            })->where('servicios.id', $Id);

        return    $query->first();
        
    }


    public static function FiltroCategoria($query, $categoria_id)
    {
        return $query->where('servicios.categoria_id', $categoria_id);
    }

}