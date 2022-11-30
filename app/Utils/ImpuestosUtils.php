<?php

namespace App\Utils;

use App\Models\Impuesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImpuestosUtils
{

    public static function newImpuesto(Request $request)
    {
        $impuesto = new Impuesto();

        // Fill model with old input
        if (!empty($request->old())) {
            $impuesto->fill($request->old());
        }

        return $impuesto;
    }

    public static function impuestos()
    {

        $query = DB::table('impuestos')
            ->select(
                'id',
                'imp_nombre',
                'imp_valor',

            );

        $query->orderByDesc('impuestos.id');

        return  $query->get();
    }

    public static function impuestoId($Id)
    {

        $query = DB::table('impuestos')
            ->select(
                'id',
                'imp_nombre',
                'imp_valor'
            )->where('impuestos.id', $Id);

        return    $query->first();
        
    }
}
