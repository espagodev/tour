<?php

namespace App\Utils;

use App\Models\SubCategoria;

class SubCategoriaUtils{

    public  static function sub_categoria($categoria_id){

        $query = SubCategoria::select('id','subc_nombre');

         //Filtrar por Nombre
        
         if (!empty($categoria_id)) {
          self::FiltroCategoria($query, $categoria_id);
         }
 


         $query->orderByDesc('sub_categorias.subc_nombre');

       return   $query->get();

    }


    public static function FiltroCategoria($query, $categoria_id)
    {
        return $query->where('sub_categorias.categoria_id', $categoria_id);
    }
}