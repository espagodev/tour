<?php

namespace App\Http\Controllers;

use App\Models\AjustesEmpresa;
use App\Models\Factura;
use App\Utils\AjustesDocumentosUtils;
use App\Utils\BilletePlazosUtils;
use App\Utils\ConceptosUtils;
use App\Utils\FacturaUtils;
use App\Utils\movimientoContableUtils;
use App\Utils\PasajerosUtils;
use App\Utils\ReciboCajaUtils;
use App\Utils\Selects;
use App\Utils\SubCategoriaUtils;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReciboCajaController extends Controller
{
    public function index()
    {
        $opcionesPagos = Selects::opcionesPago();
        $mayoristas = Selects::mayorista();
        return view('recibo_caja.index', compact('opcionesPagos','mayoristas')); 
    }

    public function getNuevoReciboCaja()
    {      
        $mayoristas = Selects::mayorista();
        $categorias = Selects::categorias();

        return view('recibo_caja.components.modals.modal_factura', compact('categorias','mayoristas'));
    }

    public function storeReciboCaja(Request $request)
    {
       

        $fac_recibo = AjustesDocumentosUtils::codigoRecibo();            
        $fact = ReciboCajaUtils::generarDocumento($request, $fac_numero = null, $fac_recibo, $fac_nota_credito  = null);

        AjustesDocumentosUtils::actualizarConteo('2');
                 
        return redirect()->route('editReciboCaja', ['factura' => $fact->id]);

    }

    public function getListadoReciboCaja(Request $request)
    {
 
        if ($request->ajax()) {
            $data =  $request->only(['start_date', 'end_date', 'forma_pago_id', 'mayorista_id']);

           
            $recibos = ReciboCajaUtils::recibosCaja($data);

            return DataTables::of($recibos)
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

                $estado = '';
                $estado .= '<a href=""  class="btn btn-outline-danger btn-xs"><i class="fa fa-trash-o"></i> </a>';

                if($row->estado_id != 3)
                {
                    $estado .= '<a href="'. route('editReciboCaja', [$row->id]) .'"  class="btn btn-outline-warning btn-xs"><i class="fa fa-pencil-square-o"></i> </a>';
                }
                
                $estado .= '<a href="'. route('showReciboCaja', [$row->id]) .'"  class="btn btn-outline-secondary btn-xs"><i class="fa fa-external-link"></i> </a>';
                if($row->fac_total != '0')
                {
                    if($row->estado_id != 3)
                    {
                        $estado .= '<a class="btn-modal btn btn-outline-success btn-xs" data-container=".view_register_abono"  data-href="'. route('getAbonoReciboCaja', [$row->id]) .'" ><i class="fa fa-dollar"></i></a>';
                    }
                }
               
                return $estado;
            })
 
                ->rawColumns(['fac_total','fac_total_pendiente','fac_total_pagado','fecha','action'])
                ->make(true);
        }
    }

    public function editReciboCaja($facturaId)
    {
        $factura = ReciboCajaUtils::reciboCajaEditId($facturaId);

        $observaciones = Selects::observaciones();
        $infoFacturas = Selects::infoFacturas();
        $subCategorias = SubCategoriaUtils::sub_categoria($factura->categoria_id);

        $conceptos = ReciboCajaUtils::facturaConceptos($facturaId);

        $empresa = AjustesEmpresa::first();
        // dd($factura,$facturaId);
        return view('recibo_caja.edit',compact('factura','facturaId','empresa', 'observaciones','infoFacturas','subCategorias','conceptos'));
    }

    public function updateReciboCaja(Request $request, $facturaId)
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
        ReciboCajaUtils::actualizarTotalPlazos($facturaId, $totalConceptos);

        return redirect()->route('editReciboCaja', ['factura' => $facturaId]);
        
    }

    public function getExpedienteReciboCaja($facturaId)
    {        
        $factura = ReciboCajaUtils::reciboCajaEditId($facturaId);
        $empresa = AjustesEmpresa::first();
        $abonoClientes = ReciboCajaUtils::movimientos('1',$facturaId);
        $abonoMayoristas = ReciboCajaUtils::movimientos('2',$facturaId);
        $alertas = ReciboCajaUtils::alertas($facturaId);
        $observaciones = ReciboCajaUtils::observaciones($facturaId);

        $conceptos = ReciboCajaUtils::facturaConceptos($facturaId);

       
        return view('recibo_caja.expediente',compact('factura', 'facturaId','empresa','abonoClientes','abonoMayoristas','alertas','observaciones'));
    }

    public function showReciboCaja($facturaId)
    {
        $factura = ReciboCajaUtils::reciboCajaEditId($facturaId);
        // $conceptos = ConceptosUtils::conceptos($facturaId);
        $empresa = AjustesEmpresa::first();
        $abonoClientes = BilletePlazosUtils::movimientos('1',$facturaId);
        $conceptos = ReciboCajaUtils::facturaConceptos($facturaId);

        return view('recibo_caja.show',compact('factura','facturaId','empresa','conceptos','abonoClientes'));
    }

    public function viewReciboCaja($facturaId)
    {
        $factura = ReciboCajaUtils::reciboCajaId($facturaId);
        $empresa = AjustesEmpresa::first();
        $abonoClientes = ReciboCajaUtils::movimientos('1',$facturaId);
        $abonoMayoristas = ReciboCajaUtils::movimientos('2',$facturaId);
        $alertas = ReciboCajaUtils::alertas($facturaId);
        $observaciones = ReciboCajaUtils::observaciones($facturaId);

        $conceptos = ReciboCajaUtils::facturaConceptos($facturaId);

        return view('recibo_caja.view',compact('factura', 'facturaId','empresa','abonoClientes','abonoMayoristas','alertas','observaciones'));
    }
}
