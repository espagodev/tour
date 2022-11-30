<?php

namespace App\Http\Controllers;

use App\Models\MovimientoAlerta;
use Illuminate\Http\Request;

class MovimientoAlertaController extends Controller
{
    public function getMovimientoAlerta($facturaId)
    {
        return view('billetes_plazo.components.actions.form_alertas', compact('facturaId'));
    }

    public function storeMovimientoAlerta(Request $request)
    {
        // dd($request);
        $agenda = MovimientoAlerta::create([

            'billetes_plazos_id' => $request->input('billetes_plazos_id'),
            'factura_id' => $request->input('factura_id'),
            'user_id' => auth()->user()->id,
            'moa_fecha' => $request->input('moa_fecha'),
            'moa_descripcion' => $request->input('moa_descripcion'),

        ]);

        return redirect()
            ->route('getNuevoBilletePlazo', $request->input('factura_id'));

    }

    public function destroy(MovimientoAlerta $id, $facturaId)
    {
        $id->delete();
        // MovimientoAlerta::where('id', $id)->delete();
        return redirect()
        ->route('getNuevoBilletePlazo', $facturaId);
    }

}
