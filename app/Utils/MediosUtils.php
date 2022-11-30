<?php

namespace App\Utils;

use App\Models\FormaPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MediosUtils
{
    public static function newFormaPago(Request $request)
    {
        $pago = new FormaPago();

        // Fill model with old input
        if (!empty($request->old())) {
            $pago->fill($request->old());
        }

        return $pago;
    }

    public static function medioPagos()
    {

        $query = DB::table('forma_pagos')
            ->select(
                'id',
                'fop_nombre',

            );

        $query->orderByDesc('forma_pagos.id');

        return  $query->get();
    }

    public static function medioPagoId($Id)
    {

        $query = DB::table('forma_pagos')
            ->select(
                'id',
                'fop_nombre',
            )->where('forma_pagos.id', $Id);

        return    $query->first();
        
    }
}