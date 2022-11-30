<?php

namespace App\Http\Controllers;

use App\Utils\ContabilidadUtils;
use App\Utils\Selects;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContabilidadController extends Controller
{
    public function index()
    {
        $opcionesPagos = Selects::opcionesPago();
        return view('contabilidad.index', compact('opcionesPagos'));
    }

    public function getListadoContable(Request $request)
    {
        // dd($request);
        if ($request->ajax()) { 

            $data =  $request->only(['start_date', 'end_date', 'forma_pago_id']);
           
            $contabilidad = ContabilidadUtils::contabildad($data);

            $balance = 0;
            return DataTables::of($contabilidad)
            
                ->editColumn('monto', function ($row) {
                    $monto = $row->mov_monto ? $row->mov_monto : 0;

                    if ($row->forma_pago_id_mov == '1') 
                    {
                        return '<span class="display_currency monto font-primary" data-orig-value="' . $monto . '" data-currency_symbol = true>' . '+' . $monto . '</span>';

                    }elseif ($row->forma_pago_id_mov == '2'){
                       
                        return '<span class="display_currency monto font-blue"  data-orig-value="' . $monto . '" data-currency_symbol = true>' . $monto . '</span>';
                    }else{

                        $monto = $row->moc_monto ? $row->moc_monto : 0;
                        return '<span class="display_currency monto font-primary" data-orig-value="' . $monto . '" data-currency_symbol = true>' . $monto . '</span>';
                    //     return '<span class="display_currency monto font-danger" data-orig-value="' . $monto . '" data-currency_symbol = true>' . $monto . '</span>';
                    }
                })
                ->editColumn('forma', function ($row) {
                    
                    if ($row->forma_pago_id_mov == '1') 
                    {
                        return 'Efectivo';

                    }elseif ($row->forma_pago_id_mov == '2'){
                       
                        return 'Tarjeta';
                    }else{

                    return $row->fop_nombre;
                   
                    }
                })
                ->editColumn('numero', function ($row) {
                    
                    if ($row->fac_tipo_documento == '1') 
                    {
                        return $row->fac_numero;

                    }elseif ($row->fac_tipo_documento == '2'){
                       
                        return $row->fac_recibo;
                    }else{

                    return $row->fac_nota_credito;
                   
                    }
                })

                ->rawColumns(['numero','forma','monto'])
                ->make(true);
        }
    }

    public function getNuevoMovimiento()
    {
        return view('contabilidad.modal.modal_nuevo_movimiento');
    }
}
