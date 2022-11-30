<?php 

namespace App\Utils;

use App\Models\Movimiento;

class movimientosUtils{

    public static function guardarMovimiento($request, $factura_id = null, $totalAbono,  $billetes_plazos_id = null, $movimiento_id = null){
       
        if($request->input('forma_pago_id') == '3'){

            $total_abono = !empty($request->input('moc_monto')) ? $request->input('moc_monto') : $totalAbono;

            $total_tarjeta =  $total_abono - $request->input('mov_monto');

            $tarjeta = Movimiento::create([
                'factura_id' => $factura_id,
                'user_id' => auth()->user()->id,
                'billetes_plazos_id' => !empty($billetes_plazos_id) ? $billetes_plazos_id : 0,
                'movimiento_contable_id' =>  $movimiento_id,
                // 'categoria_id' => $request->input('categoria_id'),
                // 'sub_categoria_id' => $request->input('sub_categoria_id'),
                'forma_pago_id' => '2', //Tarjeta
                'mov_monto' => $total_tarjeta,
                // 'mov_descripcion' => $request->input('mov_descripcion'),
            
            ]);

            $efectivo = Movimiento::create([
                'factura_id' => $factura_id,
                'user_id' => auth()->user()->id,
                'billetes_plazos_id' => !empty($billetes_plazos_id) ? $billetes_plazos_id : 0,
                'movimiento_contable_id' => $movimiento_id,
                // 'categoria_id' => $request->input('categoria_id'),
                // 'sub_categoria_id' => $request->input('sub_categoria_id'),
                'forma_pago_id' => '1', //Efectivo
                'mov_monto' => $request->input('mov_monto'),
                // 'mov_descripcion' => $request->input('mov_descripcion'),
            ]);

        }else{
            $normal = Movimiento::create([
                'factura_id' => $factura_id,
                'user_id' => auth()->user()->id,
                'billetes_plazos_id' => !empty($billetes_plazos_id) ? $billetes_plazos_id : 0,
                'movimiento_contable_id' => $movimiento_id,
                // 'categoria_id' => $request->input('categoria_id'),
                // 'sub_categoria_id' => $request->input('sub_categoria_id'),
                'forma_pago_id' => $request->input('forma_pago_id'),
                'mov_monto' =>  !empty($request->input('moc_monto')) ? $request->input('moc_monto') : $totalAbono,
                // 'mov_descripcion' => $request->input('mov_descripcion'),
            ]);
        }
    }


}