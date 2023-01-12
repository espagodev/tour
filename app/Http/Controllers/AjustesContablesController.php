<?php

namespace App\Http\Controllers;

use App\Models\MovimientoContable;
use App\Utils\AjusteContableUtils;
use App\Utils\AjustesDocumentosUtils;
use App\Utils\movimientosUtils;
use App\Utils\Selects;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AjustesContablesController extends Controller
{
    public function index()
    {
        $opcionesPagos = Selects::opcionesPago();
        $mayoristas = Selects::mayorista();
       
        return view('ajusteContable.index', compact('opcionesPagos','mayoristas'));
    }

    public function getNuevoAjuste(Request $request)
    {      
        $mayoristas = Selects::mayorista();
        $categorias = Selects::categorias();
        $opcionesPagos = Selects::opcionesPago();
        $ajusteContable = AjusteContableUtils::newAjusteContable($request);
        return view('ajusteContable.components.modals.modal_ajuste', compact('categorias','mayoristas','opcionesPagos','ajusteContable'));
    }

    
    public function editAjuste(Request $request, $ajusteId)
    {      
        $mayoristas = Selects::mayorista();
        $categorias = Selects::categorias();
        $opcionesPagos = Selects::opcionesPago();
        $ajusteContable = AjusteContableUtils::ajusteContableEditId($ajusteId);
        return view('ajusteContable.components.modals.modal_edit_ajuste', compact('categorias','mayoristas','opcionesPagos','ajusteContable'));
    }

    public function storeAjuste(Request $request)
    {
       
        $ajusteContable = MovimientoContable::create([

            'moc_numero' => AjustesDocumentosUtils::codigo('8'), 
            'billetes_plazos_id' => $request->input('billetes_plazos_id'),
            'factura_id' => $request->input('factura_id'),
            'user_id' => auth()->user()->id,
            'forma_pago_id' => $request->input('forma_pago_id'),
            'categoria_id' => $request->input('categoria_id'),
            'sub_categoria_id' => $request->input('sub_categoria_id'),
            'moc_contable' => '5',
            'moc_monto' => $request->input('moc_monto'),
            'moc_fecha' => $request->input('moc_fecha'),
            'moc_descripcion' => $request->input('moc_descripcion'),

        ]);

        // Upload Receipt File
        if ($request->moc_imagen) {
            $request->validate(['moc_imagen' => 'required|image|mimes:png,jpg|max:2048']);
            $path = $request->moc_imagen->storeAs('ajusteContables', 'ajusteContable-'. $ajusteContable->id .'.'.$request->moc_imagen->getClientOriginalExtension(), 'public');
            $ajusteContable->moc_imagen = '/'.$path;
            $ajusteContable->save();
        }
            
        AjustesDocumentosUtils::conteo('8');

        movimientosUtils::guardarMovimiento($request, null, $request->input('moc_monto'), null, $ajusteContable->id);

        return redirect()->route('getListaAjustes');

        
    }
    
    public function updateAjuste(Request $request, $ajusteId)
    {
        $ajusteContable = MovimientoContable::findOrFail($ajusteId);

        $ajusteContable->update([
            'forma_pago_id' => $request->forma_pago_id,
            'categoria_id' => $request->categoria_id,
            'sub_categoria_id' => $request->sub_categoria_id,
            'moc_monto' => $request->moc_monto,
            'moc_fecha' => $request->moc_fecha,
            'moc_descripcion' => $request->moc_descripcion,
        ]);
         

        if ($request->moc_imagen) {
            $request->validate(['moc_imagen' => 'required|image|mimes:png,jpg|max:2048']);
            $path = $request->moc_imagen->storeAs('ajusteContables', 'ajusteContable-'. $ajusteContable->id .'.'.$request->moc_imagen->getClientOriginalExtension(), 'public');
            $ajusteContable->moc_imagen = '/'.$path;
            $ajusteContable->save();
        }


        return redirect()->route('getListaAjustes');
        
    }
    public function getListadoAjustes(Request $request)
    {
 
        if ($request->ajax()) {
            $data =  $request->only(['start_date', 'end_date', 'forma_pago_id']);

           
            $ajusteContable = AjusteContableUtils::ajusteContables($data);
            return DataTables::of($ajusteContable)
            // ->editColumn('moc_fecha', '{{@format_date($moc_fecha)}}')

            ->editColumn('moc_monto', function ($row) {
                $moc_monto = $row->moc_monto ? $row->moc_monto : 0;
                return '<span class="display_currency moc_monto" data-orig-value="' . $moc_monto . '" data-currency_symbol = true>' . $moc_monto . '</span>';
            })
            ->addColumn('action', function ($row) {                  
                
                $estado = '';

                $estado = '';
                $estado .= '<a href=""  class="btn btn-outline-danger btn-xs"><i class="fa fa-trash-o"></i> </a>';

               
                $estado .= '<a data-href="'. route('editAjuste', [$row->id]) .'" data-container=".view_register_ajustes"  class="btn btn-outline-warning btn-xs btn-modal"><i class="fa fa-pencil-square-o"></i> </a>';
                $estado .= '<a href="'. route('showAjuste', [$row->id]) .'"  class="btn btn-outline-secondary btn-xs"><i class="fa fa-external-link"></i> </a>';
               
                return $estado;
            })
 
                ->rawColumns(['moc_monto','action'])
                ->make(true);
        }
    }
}
