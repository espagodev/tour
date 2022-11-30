<?php

namespace App\Utils;

use App\Models\Concepto;
use App\Models\Impuesto;
use Illuminate\Support\Facades\DB;

class ConceptosUtils{

    public static function conceptos($Id){
        $query = DB::table('conceptos')
        ->select(
            'con_monto',
            'con_cantidad',
            'con_descripcion',
            'imp_nombre',
            'imp_valor'
        )
        ->join('impuestos', function ($join) {
            $join->on('conceptos.agenda_id', '=', 'impuestos.id');
        })
        ->where('factura_id',$Id)
        ->orderByDesc('conceptos.id');

        return  $query->get();
    }


    public static function guardarConceptos($request, $documento, $facturaId){
      
        
        $totalConceptos = 0;
        $totalDescuento = 0;
        $totalFee = 0;
       
        $con_cantidad = $request->con_cantidad;
        $sub_categoria_id_con = $request->sub_categoria_id_con;
        $con_descripcion = $request->con_descripcion;
        $con_monto = $request->con_monto;
        $impuesto_id = $request->impuesto_id;
        $con_descuento = $request->con_descuento;
        $con_fee = $request->con_fee;

   

        for ($i=0; $i < count($con_cantidad); $i++) {
           
            $con_total = ( $con_cantidad[$i] * $con_monto[$i] );
            

        if(!empty($impuesto_id)){
            $con_impuesto =  utils::get_percent($con_total, $impuesto_id[$i]);
            $impuesto_id = $impuesto_id[$i] ;
        }else{
            $con_impuesto = 0;
            $impuesto_id =  '';
        }
            //    DD($impuesto_id);
            $totalConceptos += $con_total;
            $totalDescuento += $con_descuento[$i];
            $totalFee += $con_fee[$i];

             Concepto::create([
                'factura_id' => $facturaId,
                'agenda_id' => $documento->agenda_id,
                'user_id' => auth()->user()->id,    
                'mayorista_id' => $documento->mayorista_id,
                'sub_categoria_id' => $sub_categoria_id_con[$i],
                'impuesto_id' => $impuesto_id,
                'con_cantidad' => $con_cantidad[$i],
                'con_descripcion' => $con_descripcion[$i],                   
                'con_monto' => $con_monto[$i],
                'con_impuesto' => $con_impuesto,
                'con_total' => $con_total,
                'con_descuento' => $con_descuento[$i],                
                'con_localizador' => '',
                'con_fee' => $con_fee[$i],    
          ]);
       
       
        }
        
        $data = ['fac_total' => $totalConceptos,
         'fac_total_pendiente' => $totalConceptos,
        'fac_total_descuento' => $totalDescuento,
        'fac_total_fee' => $totalFee];
        
        return $data;
    }
}