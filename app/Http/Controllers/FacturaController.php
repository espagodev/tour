<?php

namespace App\Http\Controllers;

use App\Models\AjustesEmpresa;
use App\Models\BilletesPlazo;
use App\Models\Concepto;
use App\Models\Factura;
use App\Models\Pasajero;
use App\Utils\AjustesDocumentosUtils;
use App\Utils\BilletePlazosUtils;
use App\Utils\ConceptosUtils;
use App\Utils\DescripcionesUtils;
use App\Utils\FacturaUtils;
use App\Utils\movimientoContableUtils;
use App\Utils\movimientosUtils;
use App\Utils\PaisUtils;
use App\Utils\PasajerosUtils;
use App\Utils\Selects;
use App\Utils\SubCategoriaUtils;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class FacturaController extends Controller
{
    public function index() 
    {
        $opcionesPagos = Selects::opcionesPago();
        $mayoristas = Selects::mayorista();
        return view('facturas.index', compact('opcionesPagos','mayoristas'));
    }

    public function nuevaFactura()
    {      

        $categoria = 1;
        $opcionesPagos = Selects::opcionesPago();
        $plazos = Selects::plazos();
        $impuestos = Selects::impuestos();      
        $observaciones = Selects::observaciones();
        $mayoristas = Selects::mayorista();
        $infoFacturas = Selects::infoFacturas();
        $categorias = Selects::categorias();
        $subCategorias = SubCategoriaUtils::sub_categoria($categoria);
        return view('facturas.components.modals.modal_factura', compact('categorias','mayoristas'));
       
    }

    public function storeFactura(Request $request)
    {


        $fac_numero = AjustesDocumentosUtils::codigo('1');

        $fact = FacturaUtils::generarDocumento($request, $fac_numero, $fac_recibo  = null, $fac_nota_credito  = null);

        AjustesDocumentosUtils::conteo('1');
                 
        return redirect()->route('editFactura', ['factura' => $fact->id]);

    }

    public function getListadoFacturas(Request $request)
    {
 
        if ($request->ajax()) {
            $data =  $request->only(['start_date', 'end_date', 'forma_pago_id', 'mayorista_id']);

           
            $facturas = FacturaUtils::facturas($data);
            return DataTables::of($facturas)
            ->editColumn('fecha', '{{@format_date($fecha)}}')
            ->editColumn('fac_total', function ($row) {
                $fac_total = $row->fac_total ? $row->fac_total : 0;
                return '<span class="display_currency fac_total" data-orig-value="' . $fac_total . '" data-currency_symbol = true>' . $fac_total . '</span>';
            })
            ->editColumn('fac_total_pendiente', function ($row) {
                $fac_total_pendiente = $row->fac_total_pendiente ? $row->fac_total_pendiente : 0;
                return '<span class="display_currency fac_total_pendiente" data-orig-value="' . $fac_total_pendiente . '" data-currency_symbol = true>' . $fac_total_pendiente . '</span>';
            })
            ->editColumn('fac_total_pagado', function ($row) {
                $fac_total_pagado = $row->fac_total_pagado ? $row->fac_total_pagado : 0;
                return '<span class="display_currency fac_total_pagado" data-orig-value="' . $fac_total_pagado . '" data-currency_symbol = true>' . $fac_total_pagado . '</span>';
            })
            ->addColumn('action', function ($row) {                  
                
                $estado = '';

                $estado .= '<a href=""  class="btn btn-outline-danger btn-xs"><i class="fa fa-trash-o"></i> </a>';

                if($row->estado_id != 3)
                {
                    $estado .= '<a href="'. route('editFactura', [$row->id]) .'"  class="btn btn-outline-warning btn-xs"><i class="fa fa-pencil-square-o"></i> </a>';
                }
               
                $estado .= '<a href="'. route('showFactura', [$row->id]) .'"  class="btn btn-outline-secondary btn-xs"><i class="fa fa-external-link"></i> </a>';
                if($row->fac_total != '0')
                {
                    if($row->estado_id != 3)
                    {
                        $estado .= '<a class="btn-modal btn btn-outline-success btn-xs" data-container=".view_register_abono"  data-href="'. route('getAbonoFactura', [$row->id]) .'" ><i class="fa fa-dollar"></i></a>';
                    }
                }
                    $estado .= '<a href=""  class="btn btn-modal btn-outline-danger btn-xs" data-container=".view_register_abono" data-href="'. route('anularFactura', [$row->id]) .'"><i class="fa fa-minus-square-o"></i> </a>';
                return $estado;
            })
 
                ->rawColumns(['fac_total','fac_total_pendiente','fac_total_pagado','fecha','action'])
                ->make(true);
        }
    }

    public function editFactura($facturaId)
    {
        $categoria = 1;
        $opcionesPagos = Selects::opcionesPago();
        $plazos = Selects::plazos();

        $impuestos = Selects::impuestos();      
        $observaciones = Selects::observaciones();
        $mayoristas = Selects::mayorista();
        $infoFacturas = Selects::infoFacturas();

        $descripciones = DescripcionesUtils::descripciones();
        $paises = PaisUtils::paises();

        $categorias = Selects::categorias();
        $subCategorias = SubCategoriaUtils::sub_categoria($categoria);

        $factura = FacturaUtils::facturaEditId($facturaId);
        $conceptos = FacturaUtils::facturaConceptos($facturaId);

        $empresa = AjustesEmpresa::first();
        return view('facturas.edit',compact('factura','facturaId','empresa','conceptos', 'opcionesPagos','observaciones','mayoristas','infoFacturas','categorias','impuestos','subCategorias','descripciones', 'paises'));
    }

    public function updateFactura(Request $request, $facturaId)
    {
        $factura = Factura::findOrFail($facturaId);

        $factura->update([
            'observaciones_id' => $request->observaciones_id,
            'info_factura_id' => $request->info_factura_id,   
            'fac_total' => $request->bilp_precio_total ?? 0,
            'fac_total_pendiente' => $request->bilp_precio_total ?? 0,           
        ]);
         
        // Remover pasajeros 
        //    $factura->pasajeros()->delete();

        //     PasajerosUtils::crearPasajero($request, $factura, $facturaId);

          // Remover Conceptos 
        $factura->conceptos()->delete();

        $totalConceptos = ConceptosUtils::guardarConceptos($request, $factura, $facturaId);

        
        FacturaUtils::actualizarTotalPlazos($facturaId, $totalConceptos);

        return redirect()->route('editFactura', ['factura' => $facturaId]);
        
    }

    public function showFactura($facturaId)
    {
        
        $factura = FacturaUtils::facturaEditId($facturaId);
        $conceptos = FacturaUtils::facturaConceptos($facturaId);
        $empresa = AjustesEmpresa::first();
        $abonoClientes = BilletePlazosUtils::movimientos('1',$facturaId);
        $opcionesPagos = Selects::opcionesPago();
       
               
        return view('facturas.show',compact('factura','facturaId','empresa','conceptos','abonoClientes','opcionesPagos'));
    }

    public function viewFactura($facturaId)
    {
        $factura = FacturaUtils::facturaEditId($facturaId);
        $empresa = AjustesEmpresa::first();
        $abonoClientes = BilletePlazosUtils::movimientos('1',$facturaId);
        $abonoMayoristas = BilletePlazosUtils::movimientos('2',$facturaId);
        $alertas = BilletePlazosUtils::alertas($facturaId);
        $observaciones = BilletePlazosUtils::observaciones($facturaId);

        $conceptos = BilletePlazosUtils::facturaConceptos($facturaId);

        return view('facturas.view',compact('factura', 'facturaId','empresa','abonoClientes','abonoMayoristas','alertas','observaciones'));
    }

    public function expedienteFactura($facturaId)
    {        
        $factura = FacturaUtils::facturaEditId($facturaId);
      
        $abonoClientes = BilletePlazosUtils::movimientos('1',$facturaId);
        $abonoMayoristas = BilletePlazosUtils::movimientos('2',$facturaId);
        $alertas = BilletePlazosUtils::alertas($facturaId);
        $observaciones = BilletePlazosUtils::observaciones($facturaId);
        // dd($billetePlazo);
       
        return view('facturas.expediente',compact('factura','facturaId','abonoClientes','abonoMayoristas','alertas','observaciones'));
    }

    public function anularFactura($facturaId)
    {
        $conceptos = FacturaUtils::facturaConceptos($facturaId);

        $factura = FacturaUtils::facturaEditId($facturaId);
        return view('facturas.components.modals.modal_factura_anular', compact('factura','conceptos'));
    }

    public function getPasajero()
    {
        $categoria = 1;
        $subCategorias = SubCategoriaUtils::sub_categoria($categoria);
        return view('facturas.modal.modal_nuevo_pasajero', compact('subCategorias'));
    }

    public function getConcepto()
    {
       
        $categoria = 1;
        $subCategorias = SubCategoriaUtils::sub_categoria($categoria);
        $impuestos = Selects::impuestos();
        return view('facturas.modal.modal_nuevo_concepto', compact('subCategorias','impuestos'));
    }


    public function imprimirFactura($facturaId)
    {
        $data['factura_id'] = $facturaId;

        $factura = FacturaUtils::facturaId($data);
        // dd($factura);
        $empresa = AjustesEmpresa::first();
        return view('facturas.modal.modal_factura',compact('empresa','factura'));
    }

    public function imprimirInfoImportante($factura_id)
    {

    }

    
    public function getPasajeroValueRow(Request $request)
    {

        $categoria = 1;
        $subCategorias = SubCategoriaUtils::sub_categoria($categoria);

        $pasajero_index = $request->input('pasajero_row_index');
        $value_index = $request->input('value_index') + 1;

        $row_type = $request->input('row_type', 'add');

        return view('facturas.partials.pasajero_value_row')->with(compact('pasajero_index', 'value_index', 'row_type','subCategorias'));
    }

    public function getConceptoValueRow(Request $request)
    {

        $categoria = 1;
        $subCategorias = SubCategoriaUtils::sub_categoria($categoria);
        $impuestos = Selects::impuestos();


        $concepto_index = $request->input('concepto_row_index');
        $value_index = $request->input('value_index') + 1;

        $row_type = $request->input('row_type', 'add');

        return view('facturas.partials.concepto_value_row')->with(compact('concepto_index', 'value_index', 'row_type','subCategorias','impuestos'));
    }
}
