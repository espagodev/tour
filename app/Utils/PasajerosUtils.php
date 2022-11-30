<?php

namespace App\Utils;

use App\Models\Pasajero;

class PasajerosUtils{

    public static function crearPasajero($request, $documento, $facturaId){

        if($request->pas_localizador_ind != ''){
            Pasajero::create([
                'factura_id' => $facturaId,
                'user_id' => auth()->user()->id,
                'pas_localizador' =>  $request->pas_localizador_ind,
                'agenda_id' => $documento->agenda_id,
                'pas_fecha_salidad' => $request->pas_fecha_salidad_ind,
                'pas_fecha_regreso' => $request->pas_fecha_regreso_ind,
                'sub_categoria_id' => $request->sub_categoria_id_ind,
 
            ]);

        }

        $pas_localizador = $request->pas_localizador;
        $agenda_id = $request->agenda_id;
        $pas_fecha_salidad = $request->pas_fecha_salidad;
        $pas_fecha_regreso = $request->pas_fecha_regreso;
        $sub_categoria_id = $request->sub_categoria_id_pas;

        for ($i=0; $i < count($pas_localizador); $i++) {

            Pasajero::create([
                'factura_id' => $facturaId,
                'user_id' => auth()->user()->id,
                'pas_localizador' =>  $pas_localizador[$i],
                'agenda_id' => $agenda_id[$i],
                'pas_fecha_salidad' => $pas_fecha_salidad[$i],
                'pas_fecha_regreso' => $pas_fecha_regreso[$i],
                'sub_categoria_id' => $sub_categoria_id[$i],
 
            ]);
        }
    }
}