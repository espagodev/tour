<?php 

namespace App\Utils;

use App\Models\Observaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObservacionesUtils
{
    public static function newObservacion(Request $request)
    {
        $observaciones = new Observaciones();

        // Fill model with old input
        if (!empty($request->old())) {
            $observaciones->fill($request->old());
        }

        return $observaciones;
    }


    public static function observaciones()
    {

        $query = DB::table('observaciones')
            ->select(
                'id',
                'obs_titulo',
                'obs_observacion'

            );

        $query->orderByDesc('observaciones.id');

        return  $query->get();
    }
}