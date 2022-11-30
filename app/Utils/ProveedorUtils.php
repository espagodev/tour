<?php

namespace App\Utils;

use App\Models\Proveedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorUtils{

    public static function newProveedor(Request $request)
    {
        $proveedor = new Proveedores();

        // Fill model with old input
        if (!empty($request->old())) {
            $proveedor->fill($request->old());
        }

        return $proveedor;
    }

    public static function proveedores($request)
    {

        $query = DB::table('proveedores')
            ->select(
                'proveedores.id',
                'pro_nombre',
                'pro_imagen',
                'pro_link_especial',
                'pro_link_normal',
                'pro_notas',
                'pro_usuario',
                'pro_password',
                'pro_identificador',
                'pro_url_seg_1',
                'pro_url_seg_2',
                'pro_url_seg_3',
                'pro_data_seg_1',
                'pro_data_seg_2',
                'pro_data_seg_3',
                'pro_estado',
                'cat_nombre'
            )
            ->leftjoin('categorias', function ($join) {
                $join->on('proveedores.categoria_id', '=', 'categorias.id');
            });
              
               //Filtrar por Carpeta
            //    $categoria_id = $request['categoria_id'];
            //    if (!empty($categoria_id)) {
            //     self::FiltroCategoria($query, $categoria_id);
            //    }     
                     


               $query->orderByDesc('proveedores.id');

               return  $query->get();
       
              

    }

    public static function proveedorId($Id)
    {

        $query = DB::table('proveedores')
            ->select(
                'proveedores.id',
                'categoria_id',
                'pro_nombre',
                'pro_imagen',
                'pro_link_especial',
                'pro_link_normal',
                'pro_notas',
                'pro_usuario',
                'pro_password',
                'pro_identificador',
                'pro_url_seg_1',
                'pro_url_seg_2',
                'pro_url_seg_3',
                'pro_data_seg_1',
                'pro_data_seg_2',
                'pro_data_seg_3',
                'pro_estado'              
            )->join('categorias', function ($join) {
                $join->on('proveedores.categoria_id', '=', 'categorias.id');
            })->where('proveedores.id', $Id);

        return    $query->first();
        
    }

    public static function FiltroCategoria($query, $categoria_id)
    {
        return $query->where('proveedores.categoria_id', $categoria_id);
    }

}