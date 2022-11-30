<?php

namespace App\Http\Controllers;

use App\Models\AjustesEmpresa;
use App\Models\BilletesPlazo;
use App\Models\Factura;
use App\Utils\AjustesDocumentosUtils;
use App\Utils\BilletePlazosUtils;
use App\Utils\ConceptosUtils;
use App\Utils\FacturaUtils;
use App\Utils\Selects;
use App\Utils\SubCategoriaUtils;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BilletesPlazoController extends Controller
{
    public function index()
    {
        $mayoristas = Selects::mayorista();
        $categorias = Selects::categorias();
        return view('billetes_plazo.index', compact('mayoristas','categorias'));
    }


    public function showBilletePlazo($facturaId)
    {
        $billetePlazo = BilletePlazosUtils::BilletePlazoId($facturaId);
        $empresa = AjustesEmpresa::first();
        $abonoClientes = BilletePlazosUtils::movimientos('1',$facturaId);
        $abonoMayoristas = BilletePlazosUtils::movimientos('2',$facturaId);
        $alertas = BilletePlazosUtils::alertas($facturaId);
        $observaciones = BilletePlazosUtils::observaciones($facturaId);
        return view('billetes_plazo.show',compact('billetePlazo','facturaId','empresa','abonoClientes','abonoMayoristas','alertas','observaciones'));
    }

    public function viewBilletePlazo($facturaId)
    {
        $billetePlazo = BilletePlazosUtils::BilletePlazoId($facturaId);
        $empresa = AjustesEmpresa::first();
        $abonoClientes = BilletePlazosUtils::movimientos('1',$facturaId);
        $abonoMayoristas = BilletePlazosUtils::movimientos('2',$facturaId);
        $alertas = BilletePlazosUtils::alertas($facturaId);
        $observaciones = BilletePlazosUtils::observaciones($facturaId);

        $conceptos = BilletePlazosUtils::facturaConceptos($facturaId);

        return view('billetes_plazo.view',compact('billetePlazo', 'facturaId','empresa','abonoClientes','abonoMayoristas','alertas','observaciones'));
    }

    public function getNuevoBilletePlazo()
    {        
        $categorias = Selects::categorias();
        $mayoristas = Selects::mayorista();
        return view('billetes_plazo.components.modals.modal_billete_plazos', compact('categorias','mayoristas'));
        // return view('billetes_plazo.form.form_nuevo',compact('factura','facturaId','abonoClientes','abonoMayoristas','alertas','observaciones'));
    }
    public function getExpedienteBilletePlazo($facturaId)
    {        
        $billetePlazo = BilletePlazosUtils::BilletePlazoId($facturaId);
        
        $abonoClientes = BilletePlazosUtils::movimientos('1',$facturaId);
        $abonoMayoristas = BilletePlazosUtils::movimientos('2',$facturaId);
        $alertas = BilletePlazosUtils::alertas($facturaId);
        $observaciones = BilletePlazosUtils::observaciones($facturaId);
        // dd($billetePlazo);
       
        return view('billetes_plazo.expediente',compact('billetePlazo','facturaId','abonoClientes','abonoMayoristas','alertas','observaciones'));
    }

    public function storeBilletePlazos(Request $request)
    {
  
        $fac_nota_credito = AjustesDocumentosUtils::codigoNotaCredito();
        $fact = FacturaUtils::generarDocumento($request, $fac_numero = null, $fac_recibo = null, $fac_nota_credito);
        BilletePlazosUtils::crearBilleteAplazos($request,  $fact->id);

        AjustesDocumentosUtils::actualizarConteo('3');
                 
        return redirect()->route('editBilletePlazos', ['factura' => $fact->id]);
    }
    
    public function editBilletePlazos($facturaId)
    {
       
        $impuestos = Selects::impuestos();      

       
        $observaciones = Selects::observaciones();
        $infoFacturas = Selects::infoFacturas();

        $billetePlazo = BilletePlazosUtils::BilletePlazoId($facturaId);
        $subCategorias = SubCategoriaUtils::sub_categoria($billetePlazo->categoria_id);
        $conceptos =  BilletePlazosUtils::facturaConceptos($facturaId);
        // dd($billetePlazo);
        return view('billetes_plazo.edit',compact('billetePlazo','impuestos','subCategorias','observaciones','infoFacturas','facturaId','conceptos'));

    }

    public function updateBilletePlazos(Request $request, $facturaId)
    {
        $notaCredito = Factura::findOrFail($facturaId);

        $notaCredito->update([
            'observaciones_id' => $request->observaciones_id,
            'info_factura_id' => $request->info_factura_id,            
            'fac_total' => $request->bilp_precio_total ?? 0,
            'fac_total_pendiente' => $request->bilp_precio_total ?? 0,           
        ]);
         
        BilletePlazosUtils::updateBilleteAplazos($request,$facturaId);

          // Remover Conceptos 
          $notaCredito->conceptos()->delete();

        $totalConceptos = ConceptosUtils::guardarConceptos($request, $notaCredito, $facturaId);

        FacturaUtils::actualizarTotalPlazos($facturaId, $totalConceptos);

        return redirect()->route('editBilletePlazos', ['factura' => $facturaId]);
        
    }

    public function getListadoBilletePlazos(Request $request)
    {
       
        if ($request->ajax()) {

            $data =  $request->only(['start_date', 'end_date', 'mayorista_id', 'localizador']);

           
            $billetes = BilletePlazosUtils::billetesPlazos($data);
            // dd($billetes);
            return DataTables::of($billetes)

            ->editColumn('fecha', '{{@format_date($fecha)}}')

            ->editColumn('bilp_precio_total', function ($row) {
                $bilp_precio_total = $row->bilp_precio_total ? $row->bilp_precio_total : 0;

                return '<span class="display_currency bilp_precio_total" data-orig-value="' . $bilp_precio_total . '" data-currency_symbol = true>' . $bilp_precio_total . '</span>';
            })

    
            ->editColumn('bilp_saldo_cliente', function ($row) {

                 $bilp_saldo_cliente = $row->bilp_saldo_cliente;   
                
                return '<span class="display_currency totalFee" data-orig-value="' . $bilp_saldo_cliente . '" data-currency_symbol = true>' . $bilp_saldo_cliente . '</span>';

            })
            ->editColumn('bilp_saldo_proveedor', function ($row) {

                 $bilp_saldo_proveedor = $row->bilp_saldo_proveedor ;   
                
                return '<span class="display_currency totalFee" data-orig-value="' . $bilp_saldo_proveedor . '" data-currency_symbol = true>' . $bilp_saldo_proveedor . '</span>';

            })
            ->editColumn('fee', function ($row) {
                $totalFee = 0;
                 $totalFee =  ($row->bilp_precio_total - $row->bilp_precio_proveedor);   
                
                return '<span class="display_currency totalFee" data-orig-value="' . $totalFee . '" data-currency_symbol = true>' . $totalFee . '</span>';

            })
            
            ->addColumn('action', function ($row) {                     
                

                $estado = '';

                $estado = '';
                $estado .= '<a href="'. route('getNuevoBilletePlazo', [$row->id]) .'"  class="btn btn-outline-danger btn-xs"><i class="fa fa-trash-o"></i> </a>';

                $estado .= '<a href="'. route('editBilletePlazos', [$row->id]) .'"  class="btn btn-outline-warning btn-xs"><i class="fa fa-pencil-square-o"></i> </a>';
               
                // $estado .= '<a data-container=".view_factura_modal" href="#" data-href="'. route('imprimirFactura', [$row->id]) .'"  class="btn btn-outline-info  btn-xs btn-modal"><i class="fa fa-external-link"></i> </a>';
                $estado .= '<a href="'. route('getNuevoBilletePlazo', [$row->id]) .'"  class="btn btn-outline-info btn-xs"><i class="fa fa-external-link"></i> </a>';



                // $estado = '';

                // $estado .= '<a href="'. route('getNuevoBilletePlazo', [$row->id]) .'"  class="btn btn-outline-primary  btn-xs"><i class="fa fa-list-alt"></i> </a>';
                // $estado .= '<a data-container=".view_factura_modal" href="#" data-href="'. route('imprimirExpediente', [$row->id]) .'"  class="btn btn-outline-info  btn-xs btn-modal"><i class="fa fa-eye"></i> </a>';

                // $estado .= '<button type="button"  data-href=""  class="btn btn-outline-secondary  btn-xs"
                // data-container=".view_factura_modal"><i class="fa fa-print"></i></button> ';
               
                return $estado;
            })
                ->rawColumns(['bilp_precio_total', 'bilp_saldo_proveedor', 'bilp_saldo_cliente','action','fecha', 'fee'])
                ->make(true);
        }
    }

    public function getBilletePlazosSaldos(Request $request){
        if (request()->ajax()) {         

            $data =  $request->only(['start_date', 'end_date', 'mayorista_id', 'localizador']);
           
            $saldos = BilletePlazosUtils::saldos($data);
            
            $saldoCliente = !empty($saldos['saldo_cliente']) ? $saldos['saldo_cliente'] : 0;
            $saldoProveedor = !empty($saldos['saldo_proveedor']) ? $saldos['saldo_proveedor'] : 0;
            $totalFee = !empty($saldos['total_fee']) ? $saldos['total_fee'] : 0;

            $output['saldoCliente'] =  $saldoCliente;
            $output['saldoProveedor'] =  $saldoProveedor; 
            $output['totalFee'] =   !empty($totalFee) ? $totalFee : 0;



            return $output;
        }
    }

    public function imprimirExpediente($facturaId)
    {
        $factura = BilletePlazosUtils::BilletePlazoId($facturaId);
        $abonoClientes = BilletePlazosUtils::movimientos('1', $facturaId);
        $abonoMayoristas = BilletePlazosUtils::movimientos('2', $facturaId);
        $alertas = BilletePlazosUtils::alertas($facturaId);
        $observaciones = BilletePlazosUtils::observaciones($facturaId);


        return view('billetes_plazo.modal_expediente',compact('factura','facturaId','abonoClientes','abonoMayoristas','alertas','observaciones'));
    }
}
