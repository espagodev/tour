<?php

namespace App\Http\Controllers;

use App\Models\FormaPago;
use App\Utils\MediosUtils;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FormaPagoController extends Controller
{
    public function index()
    {
        return view('admin.formaPago.index');
    }

    public function getNuevoFormaPago(Request $request)
    {
        $formaPago = MediosUtils::newFormaPago($request);
        return view('admin.formaPago.components.modals.modal_nuevo', compact('formaPago'));
    }

    public function store(Request $request)
    {
        // dd($request);
        FormaPago::create([

            'fop_nombre' => $request->input('fop_nombre'),
        ]);

        return redirect()->route('getListaPagos');
    }

    public function edit($formaPagoId)
    {

        $formaPago = MediosUtils::medioPagoId($formaPagoId);
        return view('admin.formaPago.components.modals.modal_edit', compact('formaPago', 'formaPagoId'));
    }

    public function update(Request $request, $formaPagoId)
    {
        $pago = FormaPago::findOrFail($formaPagoId);

        $pago->update([
            'fop_nombre' => $request->fop_nombre,

        ]);


        return redirect()->route('getListaPagos');
    }

    public function show($impuestoId)
    {

        // $factura = FacturaUtils::facturaEditId($impuestoId);
        // $conceptos = ConceptosUtils::conceptos($impuestoId);
        // $empresa = AjustesEmpresa::first();
        // $abonoClientes = BilletePlazosUtils::movimientos('1',$impuestoId);
        // $opcionesPagos = Selects::opcionesPago();
        return view('admin.impuestos.show', compact('factura', 'impuestoId', 'empresa', 'conceptos', 'abonoClientes', 'opcionesPagos'));
    }

    public function getListadoFormaPagos(Request $request)
    {

        if ($request->ajax()) {


            $pagos = MediosUtils::medioPagos();

            return DataTables::of($pagos)
                ->addColumn('action', function ($row) {

                    $estado = '';

                    $estado .= '<a href=""  class="btn btn-outline-danger btn-xs"><i class="fa fa-trash-o"></i> </a>';
                    $estado .= '<a data-href="' . route('editFormaPago', [$row->id]) . '" data-container=".view_register"  class="btn btn-outline-warning btn-xs btn-modal"><i class="fa fa-pencil-square-o"></i> </a>';
                    return $estado;
                })

                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
