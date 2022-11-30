<?php

namespace App\Utils;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosUtils{

    public static function newUsuarios(Request $request)
    {
        $usuario = new User();

        // Fill model with old input
        if (!empty($request->old())) {
            $usuario->fill($request->old());
        }

        return $usuario;
    }

    public static function usuarios($request)
    {

        $query = DB::table('users')
            ->select(
            'users.id',
            'nombres',
            'apellidos',
            'email'

    );
            // ->leftjoin('categorias', function ($join) {
            //     $join->on('users.categoria_id', '=', 'categorias.id');
            // });
              
               //Filtrar por Carpeta
            //    $categoria_id = $request['categoria_id'];
            //    if (!empty($categoria_id)) {
            //     self::FiltroCategoria($query, $categoria_id);
            //    }     
                     


               $query->orderByDesc('users.id');

               return  $query->get();
       
              

    }

    public static function FiltroCategoria($query, $categoria_id)
    {
        return $query->where('servicios.categoria_id', $categoria_id);
    }

}