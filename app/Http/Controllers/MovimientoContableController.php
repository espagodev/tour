<?php

namespace App\Http\Controllers;

use App\Models\BilletesPlazo;
use App\Models\Factura;
use App\Models\MovimientoContable;
use App\Utils\AbonoUtils;
use App\Utils\AjustesDocumentosUtils;
use App\Utils\BilletePlazosUtils;
use App\Utils\FacturaUtils;
use App\Utils\movimientosUtils;
use App\Utils\Selects;
use Illuminate\Http\Request;

class MovimientoContableController extends Controller
{
    public function getAbonoCliente($facturaId)
    {
        $factura = Factura::findOrFail($facturaId);
        $opcionesPagos = Selects::opcionesPago();

        if($factura->fac_tipo_documento == '3'){
            $plazos = BilletesPlazo::where('factura_id',$facturaId)->first();
            $billetePlazoId = $plazos->id;
        }

       
        
        return view('billetes_plazo.components.actions.form_abono_cliente', compact('factura','facturaId','opcionesPagos', 'billetePlazoId'));
    }

    public function getAbonoReciboCaja($facturaId)
    {
        $factura = Factura::findOrFail($facturaId);
        $opcionesPagos = Selects::opcionesPago();
        
        return view('recibo_caja.components.actions.form_abono_cliente', compact( 'factura','facturaId','opcionesPagos'));
    }

    public function getAbonoFactura($facturaId)
    {
        $factura = Factura::findOrFail($facturaId);
        $opcionesPagos = Selects::opcionesPago();

        return view('facturas.components.actions.form_abono_cliente', compact( 'factura','facturaId','opcionesPagos'));
    }

    public function getAbonoMayorista($facturaId, $billetePlazoId)
    {
        return view('billetes_plazo.components.actions.form_abono_mayorista', compact('facturaId','billetePlazoId'));
    }

    public function storeAbonoCliente(Request $request)
    {


       
        $movimiento = MovimientoContable::create([

            'moc_numero' => AjustesDocumentosUtils::codigo('5'), 
            'billetes_plazos_id' => $request->input('billetes_plazos_id'),
            'factura_id' => $request->input('factura_id'),
            'user_id' => auth()->user()->id,
            'forma_pago_id' => $request->input('forma_pago_id'),
            'moc_contable' => '1',
            'moc_monto' => $request->input('moc_monto'),
            'moc_fecha' => $request->input('moc_fecha'),
            'moc_descripcion' => $request->input('moc_descripcion'),

        ]); 
            
        AjustesDocumentosUtils::conteo('5');

        movimientosUtils::guardarMovimiento($request, $request->input('factura_id'), $request->input('moc_monto'), $request->input('billetes_plazos_id'), $movimiento->id);

        BilletePlazosUtils::actualizarTotalBilletePlazos($movimiento); 

        FacturaUtils::actulizarAbonoCliente($request->input('factura_id'),$request->input('moc_monto'),$request->input('forma_pago_id'), '2');

        return redirect()->route('expedienteBilletePlazo', ['factura' => $request->input('factura_id')]);

    }

    public function storeAbonoReciboCaja(Request $request)
    {
       
        $movimiento = MovimientoContable::create([

            'moc_numero' => AjustesDocumentosUtils::codigo('5'),
            'billetes_plazos_id' => '',
            'factura_id' => $request->input('factura_id'),
            'user_id' => auth()->user()->id,
            'forma_pago_id' => $request->input('forma_pago_id'),
            'moc_contable' => '1',
            'moc_monto' => $request->input('moc_monto'),
            'moc_fecha' => $request->input('moc_fecha'),
            'moc_descripcion' => $request->input('moc_descripcion'),

        ]);
            
        AjustesDocumentosUtils::conteo('5');

        movimientosUtils::guardarMovimiento($request, $request->input('factura_id'), $request->input('moc_monto'),  $movimiento->id, null);

        FacturaUtils::actulizarAbonoCliente($request->input('factura_id'),$request->input('moc_monto'),$request->input('forma_pago_id'),'3');

        return redirect()->route('showReciboCaja', ['factura' => $request->input('factura_id')]);
 

    }

    public function storeAbonoFactura(Request $request)
    {
       
        $movimiento = MovimientoContable::create([

            'moc_numero' => AjustesDocumentosUtils::codigo('5'),
            'billetes_plazos_id' => '',
            'factura_id' => $request->input('factura_id'),
            'user_id' => auth()->user()->id,
            'forma_pago_id' => $request->input('forma_pago_id'),
            'moc_contable' => '1',
            'moc_monto' => $request->input('moc_monto'),
            'moc_fecha' => $request->input('moc_fecha'),
            'moc_descripcion' => $request->input('moc_descripcion'),

        ]);
            
        AjustesDocumentosUtils::conteo('5');

        movimientosUtils::guardarMovimiento($request, $request->input('factura_id'), $request->input('moc_monto'),  $movimiento->id, null);

        FacturaUtils::actulizarAbonoCliente($request->input('factura_id'),$request->input('moc_monto'),$request->input('forma_pago_id'),'3');

        return redirect()->route('showFactura', ['factura' => $request->input('factura_id')]);
 

    }

    public function storeAbonoMayorista(Request $request)
    {
       
        $movimiento =   MovimientoContable::create([

            'moc_numero' => AjustesDocumentosUtils::codigo('7'),
            'billetes_plazos_id' => $request->input('billetes_plazos_id'),
            'factura_id' => $request->input('factura_id'),
            'user_id' => auth()->user()->id,
            'moc_contable' => '2',
            'moc_monto' => $request->input('moc_monto'),
            'moc_fecha' => $request->input('moc_fecha'),
            'moc_descripcion' => $request->input('moc_descripcion'),

        ]);
        AjustesDocumentosUtils::conteo('7');

        BilletePlazosUtils::actualizarTotalMayoristaBilletePlazos($movimiento);

        return redirect()->route('expedienteBilletePlazo', ['factura' => $request->input('factura_id')]);

    }

    public function editAbonoCliente($abonoId)
    {
        $abono = AbonoUtils::abonoId($abonoId);
        $opcionesPagos = Selects::opcionesPago();
        return view('billetes_plazo.components.actions.form_edit_abono_cliente', compact('abonoId', 'abono','opcionesPagos'));
    }

    public function update(Request $request, $abonoId)
    {
        $abono = MovimientoContable::findOrFail($abonoId);

        $abono->update([           
            'forma_pago_id' => $request->input('forma_pago_id'),
            'moc_monto' => $request->input('moc_monto'),
            'moc_fecha' => $request->input('moc_fecha'),
            'moc_descripcion' => $request->input('moc_descripcion'),   
        ]);
         
       

        return redirect()->route('expedienteBilletePlazo', ['factura' => $request->input('factura_id')]);
        
    }

    public function destroy(MovimientoContable $id, $facturaId)
    {
        
        FacturaUtils::actulizarUpdateAbonoCliente($facturaId, $id->moc_monto, null, '1');

        $id->delete();
        return redirect()->route('expedienteBilletePlazo', ['factura' => $facturaId]);
    }
}
