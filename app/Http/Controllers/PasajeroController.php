<?php

namespace App\Http\Controllers;

use App\Models\Pasajero;
use Illuminate\Http\Request;

class PasajeroController extends Controller
{

    public function store(Request $request)
    {

        $pasajero = Pasajero::create([

            'factura_id' => $request->input('factura_id'),
            'agenda_id' => $request->input('agenda_id'),
            'categoria_id' => $request->input('categoria_id'),
            'pas_localizador' => $request->input('pas_localizador'),
            'pas_fecha_salidad' => $request->input('pas_fecha_salidad'),
            'pas_fecha_regreso' => $request->input('pas_fecha_regreso'),

        ]);


        return $pasajero;

    }

}
