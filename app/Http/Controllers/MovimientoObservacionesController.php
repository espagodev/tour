<?php

namespace App\Http\Controllers;

use App\Models\MovimientoObservaciones;
use Illuminate\Http\Request;

class MovimientoObservacionesController extends Controller
{
    public function getMovimientoObservacion($facturaId)
    {
        return view('billetes_plazo.components.actions.form_observaciones', compact('facturaId'));
    }

    public function storeMovimientoObservacion(Request $request)
    {
        MovimientoObservaciones::create([

            'billetes_plazos_id' => $request->input('billetes_plazos_id'),
            'factura_id' => $request->input('factura_id'),
            'user_id' => auth()->user()->id,
            'moo_descripcion' => $request->input('moo_descripcion'),

        ]);

        return redirect()
            ->route('getNuevoBilletePlazo', $request->input('factura_id'));
    }

    public function destroy(MovimientoObservaciones $id, $facturaId)
    {
        $id->delete();
        // MovimientoAlerta::where('id', $id)->delete();
        return redirect()
        ->route('getNuevoBilletePlazo', $facturaId);
    }
}
