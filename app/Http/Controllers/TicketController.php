<?php

namespace App\Http\Controllers;

use App\Models\AjustesEmpresa;
use App\Utils\AbonoUtils;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    
    public function getVerAbono(Request $request, $abonoId)
    {
        $data['empresas_id'] = session()->get('user.emp_id');
        $data['printer_type'] =  !empty(session()->get('banca.impresora')) ? session()->get('banca.impresora') : 'browser';
        $data['getImagen'] =   !empty($request->getImagen) ? $request->getImagen : 1;
        $data['abono'] =  $abonoId;

        $abono = AbonoUtils::abonoId($abonoId);
        $empresa = AjustesEmpresa::first();
        return view('ticket.modal.moda_abono')->with(compact('abono','empresa'));

        // return view('ticket.modal.moda_abono')->with(compact('abono','abonoId'));
    }
}
