<?php

namespace App\Http\Controllers;

use App\Models\DocumentosContable;
use App\Utils\DocumentosUtils;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DocumentosContableController extends Controller
{
    public function index()
    {

        return view('admin.documentos.index');
    }

    public function getNuevoDocumento(Request $request)
    {      

        $documento = DocumentosUtils::newDocumento($request);
        $digitos = Utils::totalDigitos();
        return view('admin.documentos.components.modals.modal_nuevo', compact('documento','digitos'));  
    }

    public function store(Request $request)
    {
        // dd($request);
        DocumentosContable::create([

            'doc_nombre' => $request->input('doc_nombre'),
            'doc_prefijo' => $request->input('doc_prefijo'),        
            'doc_inicial' => $request->input('doc_inicial'),
            'doc_incremento' => $request->input('doc_incremento'),
            'doc_digitos' => $request->input('doc_digitos'),
            // 'doc_conteo' => $request->input('doc_conteo'),
            // 'doc_vencimiento_recordatorio_1' => $request->input('doc_vencimiento_recordatorio_1'),
            // 'doc_vencimiento_recordatorio_2' => $request->input('doc_vencimiento_recordatorio_2'),
            // 'doc_vencida_recordatorio_1' => $request->input('doc_vencida_recordatorio_1'),
            // 'doc_vencida_recordatorio_2' => $request->input('doc_vencida_recordatorio_2'),
            // 'doc_color' => $request->input('doc_color'),
            // 'doc_footer' => $request->input('doc_footer'),
            // 'doc_template' => $request->input('doc_template'),

        ]);

            
        return redirect()->route('getDocumentos');
    }

    public function edit($documentoId)   {
        


        $documento = DocumentosUtils::documentoId($documentoId);
        $digitos = Utils::totalDigitos();
        return view('admin.documentos.edit',compact('documento','documentoId','digitos'));
    }

    public function update(Request $request, $documentoId)
    {
        $documento = DocumentosContable::findOrFail($documentoId);

        $documento->update([
            'doc_nombre' => $request->doc_nombre,
            'doc_prefijo' => $request->doc_prefijo,        
            'doc_inicial' => $request->doc_inicial,
            'doc_incremento' => $request->doc_incremento,
            'doc_digitos' => $request->doc_digitos,
            'doc_conteo' => $request->doc_conteo,                  
        ]);
         

            return redirect()->route('editDocumentos', ['documento' => $documentoId]);
        
    }

    public function show($documentoId)
    {
        
        // $factura = FacturaUtils::facturaEditId($documentoId);
        // $conceptos = ConceptosUtils::conceptos($documentoId);
        // $empresa = AjustesEmpresa::first();
        // $abonoClientes = BilletePlazosUtils::movimientos('1',$documentoId);
        // $opcionesPagos = Selects::opcionesPago();
        return view('admin.documentos.show',compact('factura','documentoId','empresa','conceptos','abonoClientes','opcionesPagos'));
    }

    public function getListadoDocumentos(Request $request)
    {

        if ($request->ajax()) {
            
           
            $documentos = DocumentosUtils::documentos();

            return DataTables::of($documentos)
            ->addColumn('action', function ($row) {                  
                
                $estado = '';

                $estado .= '<a href=""  class="btn btn-outline-danger btn-xs"><i class="fa fa-trash-o"></i> </a>';
                $estado .= '<a href="'. route('editDocumentos', [$row->id]) .'"  class="btn btn-outline-warning btn-xs"><i class="fa fa-pencil-square-o"></i> </a>';
                $estado .= '<a href="'. route('showDocumentos', [$row->id]) .'"  class="btn btn-outline-secondary btn-xs"><i class="fa fa-external-link"></i> </a>';
               
                return $estado;
            })
 
                ->rawColumns(['action'])
                ->make(true);
          
        }
    }
}
