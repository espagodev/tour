<?php 

namespace App\Utils;

use App\Models\Movimiento;
use App\Models\MovimientoContable;

class movimientoContableUtils{

    public static function guardarMovimientoContable($request, $factura_id, $totalAbono, $billetes_plazos_id = null){

        
    $movimiento = MovimientoContable::create([
        'moc_numero' => AjustesDocumentosUtils::codigoAbonoCliente(),
        'billetes_plazos_id' => !empty($billetes_plazos_id) ? $billetes_plazos_id : 0,
        'factura_id' => $factura_id,
        'user_id' => auth()->user()->id,
        'forma_pago_id' => $request->input('forma_pago_id'),
        'moc_contable' => '1',
        'moc_monto' => !empty($request->input('moc_monto')) ? $request->input('moc_monto') : $totalAbono,
        'moc_fecha' => $request->input('moc_fecha'),
        'moc_descripcion' => $request->input('moc_descripcion'),

    ]);

        AjustesDocumentosUtils::actualizarConteo('2');
        movimientosUtils::guardarMovimiento($request, $factura_id, $totalAbono,  $billetes_plazos_id, $movimiento->id );

    }

    public static function movimientos($movimiento, $facturaId)
    {
        $query = MovimientoContable::where('moc_contable', $movimiento)
        
            ->where('factura_id', $facturaId);

        return $query->get();
    }


    // $query = MovimientoContable::where('moc_contable', $movimiento)
    // ->where('factura_id', $facturaId)
    // ->leftjoin('forma_pagos', function ($join) {
    //     $join->on('movimiento_contables.forma_pago_id', '=', 'forma_pagos.id');
    // })
    //    ;
}