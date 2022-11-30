<?php

namespace App\Http\Controllers;

use App\Models\Impuesto;
use App\Utils\ImpuestosUtils;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ImpuestoController extends Controller
{
    public function index()
    {

        return view('admin.impuestos.index');
    }

    public function getNuevoImpuesto(Request $request)
    {      

        $impuesto = ImpuestosUtils::newImpuesto($request);
        return view('admin.impuestos.components.modals.modal_nuevo', compact('impuesto'));  
    }

    public function store(Request $request)
    {
        // dd($request);
        Impuesto::create([

            'imp_nombre' => $request->input('imp_nombre'),
            'imp_valor' => $request->input('imp_valor'),  

        ]);

            
        return redirect()->route('getImpuestos');
    }

    public function edit($impuestoId)   {
        
        $impuesto = ImpuestosUtils::impuestoId($impuestoId);
        return view('admin.impuestos.components.modals.modal_edit',compact('impuesto','impuestoId'));
    }

    public function update(Request $request, $impuestoId)
    {
        $impuesto = Impuesto::findOrFail($impuestoId);

        $impuesto->update([
            'imp_nombre' => $request->imp_nombre,
            'imp_valor' => $request->imp_valor,        
                
        ]);
         

        return redirect()->route('getImpuestos');        
    }

    public function show($impuestoId)
    {
        
        // $factura = FacturaUtils::facturaEditId($impuestoId);
        // $conceptos = ConceptosUtils::conceptos($impuestoId);
        // $empresa = AjustesEmpresa::first();
        // $abonoClientes = BilletePlazosUtils::movimientos('1',$impuestoId);
        // $opcionesPagos = Selects::opcionesPago();
        return view('admin.impuestos.show',compact('factura','impuestoId','empresa','conceptos','abonoClientes','opcionesPagos'));
    }

    public function getListadoImpuestos(Request $request)
    {

        if ($request->ajax()) {
            
           
            $impuestos = ImpuestosUtils::impuestos();

            return DataTables::of($impuestos)
            ->addColumn('action', function ($row) {                  
                
                $estado = '';

                $estado .= '<a href=""  class="btn btn-outline-danger btn-xs"><i class="fa fa-trash-o"></i> </a>';
                $estado .= '<a data-href="'. route('editImpuesto', [$row->id]) .'" data-container=".view_register"  class="btn btn-outline-warning btn-xs btn-modal"><i class="fa fa-pencil-square-o"></i> </a>';

                $estado .= '<a href="'. route('showImpuesto', [$row->id]) .'"  class="btn btn-outline-secondary btn-xs"><i class="fa fa-external-link"></i> </a>';
               
                return $estado;
            })
 
                ->rawColumns(['action'])
                ->make(true);
          
        }
    }
}
