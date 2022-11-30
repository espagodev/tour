<?php

namespace App\Http\Controllers;

use App\Models\MovimientoContable;
use App\Utils\AjustesDocumentosUtils;
use App\Utils\GastosUtils;
use App\Utils\movimientosUtils;
use App\Utils\Selects;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class GastosController extends Controller
{
    public function index()
    {
        $opcionesPagos = Selects::opcionesPago();
        $mayoristas = Selects::mayorista();
       
        return view('gastos.index', compact('opcionesPagos','mayoristas'));
    }

    public function getNuevoGasto(Request $request)
    {      
        $mayoristas = Selects::mayorista();
        $categorias = Selects::categorias();
        $opcionesPagos = Selects::opcionesPago();
        $gasto = GastosUtils::newGasto($request);
        return view('gastos.components.modals.modal_factura', compact('categorias','mayoristas','opcionesPagos','gasto'));
    }

    
    public function editGasto(Request $request, $gastoId)
    {      
        $mayoristas = Selects::mayorista();
        $categorias = Selects::categorias();
        $opcionesPagos = Selects::opcionesPago();
        $gasto = GastosUtils::gastoEditId($gastoId);
        return view('gastos.components.modals.modal_edit_gasto', compact('categorias','mayoristas','opcionesPagos','gasto'));
    }

    public function storeGasto(Request $request)
    {
       
        $gasto = MovimientoContable::create([

            'moc_numero' => AjustesDocumentosUtils::codigoGasto(),
            'billetes_plazos_id' => $request->input('billetes_plazos_id'),
            'factura_id' => $request->input('factura_id'),
            'user_id' => auth()->user()->id,
            'forma_pago_id' => $request->input('forma_pago_id'),
            'categoria_id' => $request->input('categoria_id'),
            'sub_categoria_id' => $request->input('sub_categoria_id'),
            'moc_contable' => '3',
            'moc_monto' => $request->input('moc_monto'),
            'moc_fecha' => $request->input('moc_fecha'),
            'moc_descripcion' => $request->input('moc_descripcion'),

        ]);

        // Upload Receipt File
        if ($request->moc_imagen) {
            $request->validate(['moc_imagen' => 'required|image|mimes:png,jpg|max:2048']);
            $path = $request->moc_imagen->storeAs('gastos', 'gasto-'. $gasto->id .'.'.$request->moc_imagen->getClientOriginalExtension(), 'public');
            $gasto->moc_imagen = '/'.$path;
            $gasto->save();
        }
            
        AjustesDocumentosUtils::actualizarConteo('6');

        movimientosUtils::guardarMovimiento($request, null, $request->input('moc_monto'), null, $gasto->id);


        // return redirect()->route('expedienteBilletePlazo', ['factura' => $request->input('factura_id')]);
        return redirect()->route('getListaGastos');

        
    }
    
    public function updateGasto(Request $request, $gastoId)
    {
        $gasto = MovimientoContable::findOrFail($gastoId);

        $gasto->update([
            'forma_pago_id' => $request->forma_pago_id,
            'categoria_id' => $request->categoria_id,
            'sub_categoria_id' => $request->sub_categoria_id,
            'moc_monto' => $request->moc_monto,
            'moc_fecha' => $request->moc_fecha,
            'moc_descripcion' => $request->moc_descripcion,
        ]);
         

        if ($request->moc_imagen) {
            $request->validate(['moc_imagen' => 'required|image|mimes:png,jpg|max:2048']);
            $path = $request->moc_imagen->storeAs('gastos', 'gasto-'. $gasto->id .'.'.$request->moc_imagen->getClientOriginalExtension(), 'public');
            $gasto->moc_imagen = '/'.$path;
            $gasto->save();
        }


        return redirect()->route('getListaGastos');
        
    }
    public function getListadoGastos(Request $request)
    {
 
        if ($request->ajax()) {
            $data =  $request->only(['start_date', 'end_date', 'forma_pago_id']);

           
            $gastos = GastosUtils::gastos($data);
            return DataTables::of($gastos)
            // ->editColumn('moc_fecha', '{{@format_date($moc_fecha)}}')

            ->editColumn('moc_monto', function ($row) {
                $moc_monto = $row->moc_monto ? $row->moc_monto : 0;
                return '<span class="display_currency moc_monto" data-orig-value="' . $moc_monto . '" data-currency_symbol = true>' . $moc_monto . '</span>';
            })
            ->addColumn('action', function ($row) {                  
                
                $estado = '';

                $estado = '';
                $estado .= '<a href=""  class="btn btn-outline-danger btn-xs"><i class="fa fa-trash-o"></i> </a>';

               
                $estado .= '<a data-href="'. route('editGasto', [$row->id]) .'" data-container=".view_register_abono"  class="btn btn-outline-warning btn-xs btn-modal"><i class="fa fa-pencil-square-o"></i> </a>';
                $estado .= '<a href="'. route('showReciboCaja', [$row->id]) .'"  class="btn btn-outline-secondary btn-xs"><i class="fa fa-external-link"></i> </a>';
               
                return $estado;
            })
 
                ->rawColumns(['moc_monto','action'])
                ->make(true);
        }
    }

}
