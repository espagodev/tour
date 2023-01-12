<?php 

namespace App\Utils;

use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisUtils
{
    public static function newPais(Request $request)
    {
        $paises = new Pais();

        // Fill model with old input
        if (!empty($request->old())) {
            $paises->fill($request->old());
        }

        return $paises;
    }


    public static function paises()
    {

        $query = DB::table('pais')
            ->select(
                'id',
                'pai_iso',
                'pai_nombre',
                'pai_gentilicio'

            );

        $query->orderBy('pais.pai_nombre','asc');

        return  $query->get();
    }
}