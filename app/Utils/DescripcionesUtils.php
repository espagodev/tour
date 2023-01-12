<?php 

namespace App\Utils;

use App\Models\Descripciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DescripcionesUtils
{
    public static function newDescripcion(Request $request)
    {
        $descripciones = new Descripciones();

        // Fill model with old input
        if (!empty($request->old())) {
            $descripciones->fill($request->old());
        }

        return $descripciones;
    }


    public static function descripciones()
    {

        $query = DB::table('descripciones')
            ->select(
                'id',
                'des_nombre'

            );

        $query->orderByDesc('descripciones.id');

        return  $query->get();
    }
}