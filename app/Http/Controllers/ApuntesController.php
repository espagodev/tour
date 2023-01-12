<?php

namespace App\Http\Controllers;

use App\Models\Apuntes;
use Illuminate\Http\Request;

class ApuntesController extends Controller
{
    public function nuevoApunte(Request $request)    {      

        $apunte = Apuntes::newApunte($request);
        return view('dashboard.components.modals.modal_apunte', compact('apunte'));
       
    }

    public function store(Request $request)
    {
        $apunte = Apuntes::create([
            'user_id' => auth()->user()->id,
            'apu_detalle' => $request->input('apu_detalle')
        ]);
    
        return redirect()->route('dashboard');
    }

    public function destroy(Apuntes $id)
    {
        
        FacturaUtils::actulizarUpdateAbonoCliente($facturaId, $id->moc_monto, null, '1');

        $id->delete();
        return redirect()->route('dashboard');    }
}
