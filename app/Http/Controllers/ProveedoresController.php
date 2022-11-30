<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use App\Utils\ProveedorUtils;
use App\Utils\Selects;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProveedoresController extends Controller
{
    public function index()
    {
        return view('admin.proveedor.index');
    }

    public function getNuevoProveedor(Request $request)
    {        
        $categorias = Selects::categorias();
        $proveedor = ProveedorUtils::newProveedor($request);

        return view('admin.proveedor.components.modals.modal_nuevo', compact('categorias','proveedor'));
    }

    public function storeProveedor(Request $request)
    {
        $proveedor = Proveedores::create([

            'categoria_id' => $request->input('categoria_id'),
            'pro_nombre' => $request->input('pro_nombre'),
            'pro_imagen' => $request->input('pro_imagen'),
            'pro_link_especial' => $request->input('pro_link_especial'),
            'pro_link_normal' => $request->input('pro_link_normal'),
            'pro_notas' => $request->input('pro_notas'),
            'pro_usuario' => $request->input('pro_usuario'),
            'pro_password' => $request->input('pro_password'),
            'pro_identificador' => $request->input('pro_identificador'),
            'pro_url_seg_1' => $request->input('pro_url_seg_1'),
            'pro_url_seg_2' => $request->input('pro_url_seg_2'),
            'pro_url_seg_3' => $request->input('pro_url_seg_3'),
            'pro_data_seg_1' => $request->input('pro_data_seg_1'),
            'pro_data_seg_2' => $request->input('pro_data_seg_2'),
            'pro_data_seg_3' => $request->input('pro_data_seg_3'),

        ]);

        // Upload Receipt File
        if ($request->pro_imagen) {
            $request->validate(['pro_imagen' => 'required|image|mimes:png,jpg|max:2048']);
            $path = $request->pro_imagen->storeAs('proveedor', 'proveedor-'. $proveedor->id .'.'.$request->pro_imagen->getClientOriginalExtension(), 'public');
            $proveedor->moc_imagen = '/'.$path;
            $proveedor->save();
        }
            
        return redirect()->route('getListaProveedor');
    }

    public function edit(Request $request, $proveedorId)
    {      
        $categorias = Selects::categorias();
        $proveedor = ProveedorUtils::proveedorId($proveedorId);    


        return view('admin.proveedor.components.modals.modal_edit', compact('categorias','proveedor'));
    }

    public function update(Request $request, $proveedorId)
    {
        $proveedor = Proveedores::findOrFail($proveedorId);

        $proveedor->update([
           
            'categoria_id' => $request->categoria_id,
            'pro_nombre' => $request->pro_nombre,
            'pro_imagen' => $request->pro_imagen,
            'pro_link_especial' => $request->pro_link_especial,
            'pro_link_normal'=> $request->pro_link_normal,
            'pro_notas' => $request->pro_notas,
            'pro_usuario' => $request->pro_usuario,
            'pro_password' => $request->pro_password,
            'pro_identificador' => $request->pro_identificador,
            'pro_url_seg_1' => $request->pro_url_seg_1,
            'pro_url_seg_2' => $request->pro_url_seg_2,
            'pro_url_seg_3' => $request->pro_url_seg_3,
            'pro_data_seg_1' => $request->pro_data_seg_1,
            'pro_data_seg_2' => $request->pro_data_seg_2,
            'pro_data_seg_3' => $request->pro_data_seg_3,
        ]);
         

        if ($request->pro_imagen) {
            $request->validate(['pro_imagen' => 'required|image|mimes:png,jpg|max:2048']);
            $path = $request->pro_imagen->storeAs('proveedor', 'proveedor-'. $proveedor->id .'.'.$request->pro_imagen->getClientOriginalExtension(), 'public');
            $proveedor->pro_imagen = '/'.$path;
            $proveedor->save();
        }


        return redirect()->route('getListaProveedor');
        
    }
    
    public function getListadoProveedor(Request $request)
    {

        if ($request->ajax()) {
            
            $data =  $request->only(['start_date', 'end_date', 'categoria_id']);
            $proveedor = ProveedorUtils::proveedores($data);

            return DataTables::of($proveedor)
            ->addColumn('action', function ($row) {                  
                
                $estado = '';

                $estado = '';
                $estado .= '<a href=""  class="btn btn-outline-danger btn-xs"><i class="fa fa-trash-o"></i> </a>';

               
                $estado .= '<a data-href="'. route('editProveedor', [$row->id]) .'" data-container=".view_register"  class="btn btn-outline-warning btn-xs btn-modal"><i class="fa fa-pencil-square-o"></i> </a>';
                $estado .= '<a href="'. route('showReciboCaja', [$row->id]) .'"  class="btn btn-outline-secondary btn-xs"><i class="fa fa-external-link"></i> </a>';
               
                return $estado;
            })
 
                ->rawColumns(['action'])
                ->make(true);
          
        }
    }
}
