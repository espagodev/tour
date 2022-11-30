<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Utils\Selects;
use App\Utils\AgendaUtils;
use App\Utils\FacturaUtils;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        
        return view('agenda.index');
    }

    public function getNuevoCliente(Request $request)
    {
        $documentos = Selects::documentos();
        $provincias = Selects::provincias();
        $municipios = Selects::municipios();
        $paises = Selects::pais();
        $carpetas = Selects::carpetas();
        $agenda = AgendaUtils::newAgenda($request);
        return view('agenda.components.modals.modal_nuevo_cliente', compact('agenda','documentos', 'provincias', 'municipios', 'carpetas', 'paises'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $agenda = Agenda::create([
            'user_id' => '1',
            'pais_id' => $request->input('pais_id'),
            'provincia_id' => $request->input('provincia_id'),
            'municipio_id' => $request->input('municipio_id'),
            'carpeta_id' => $request->input('carpeta_id'),
            'tipo_documento_id' => $request->input('tipo_documento_id'),
            'agd_nombres' => $request->input('agd_nombres'),
            'agd_apellidos' => $request->input('agd_apellidos'),
            'agd_email' => $request->input('agd_email'),
            'agd_documento' => $request->input('agd_documento'),
            'agd_codigo_postal' => $request->input('agd_codigo_postal'),
            'agd_direccion' => $request->input('agd_direccion'),
            'agd_telefono' => $request->input('agd_telefono'),
            'agd_movil' => $request->input('agd_movil'),

        ]);

        return view('agenda.index');
    }


    public function edit(Request $request, $agendaId)
    {
        $documentos = Selects::documentos();
        $provincias = Selects::provincias();
        $municipios = Selects::municipios();
        $paises = Selects::pais();
        $carpetas = Selects::carpetas();
        $agenda = AgendaUtils::agendaEditId($agendaId);

        return view('agenda.components.modals.modal_edit', compact('agenda','documentos', 'provincias', 'municipios', 'carpetas', 'paises'));
    }

    public function update(Request $request, $agendaId)
    {
        $agenda = Agenda::findOrFail($agendaId);

      
        $agenda->update([
           
            'pais_id' => $request->pais_id,
            'provincia_id' => $request->provincia_id,
            'municipio_id' => $request->municipio_id,
            'carpeta_id' => $request->carpeta_id,
            'tipo_documento_id' => $request->tipo_documento_id,
            'agd_nombres' => $request->agd_nombres,
            'agd_apellidos' => $request->agd_apellidos,
            'agd_email' => $request->agd_email,
            'agd_documento' => $request->agd_documento,
            'agd_codigo_postal' => $request->agd_codigo_postal,
            'agd_direccion' => $request->agd_direccion,
            'agd_telefono' => $request->agd_telefono,
            'agd_movil' => $request->agd_movil,
        ]);
         

        return redirect()->route('getListaAgenda');
        
    }

    public function show($agendaId)
    {

        $agenda = AgendaUtils::agendaEditId($agendaId);
        $facturas = FacturaUtils::facturasCliente($agendaId);
        // $conceptos = ConceptosUtils::conceptos($impuestoId);
        // $empresa = AjustesEmpresa::first();
        // $abonoClientes = BilletePlazosUtils::movimientos('1',$impuestoId);
        // $opcionesPagos = Selects::opcionesPago();
        // return view('agenda.show', compact('factura', 'impuestoId', 'empresa', 'conceptos', 'abonoClientes', 'opcionesPagos'));
        return view('agenda.show',compact('agenda','facturas'));

    }

    public function getAgenda(Request $request)
    {

        $agenda = AgendaUtils::getAgenda($request);
        return response()->json($agenda);

    }

    public function getListadoClientes(Request $request)
    {

        if ($request->ajax()) {
            $data['agd_nombres'] = !empty($request->agd_nombres) ?  $request->agd_nombres : '';
            $data['carpeta_id'] = !empty($request->carpeta_id) ?  $request->carpeta_id : '';

            $agenda = AgendaUtils::agenda($data);

            return DataTables::of($agenda)
            ->addColumn('action', function ($row) {    
                $estado = '';               
                $estado .= '<a data-href="'. route('editAgenda', [$row->id]) .'" data-container=".view_register_abono"  class="btn btn-outline-warning btn-xs btn-modal"><i class="fa fa-pencil-square-o"></i> </a>';
                $estado .= '<a href="'. route('showAgenda', [$row->id]) .'"  class="btn btn-outline-primary btn-xs"><i class="fa fa-tasks"></i></a>';
                $estado .= '<a href=""  class="btn btn-outline-danger btn-xs"><i class="fa fa-trash-o"></i> </a>';
                
                return $estado;
            })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
