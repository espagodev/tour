<?php

namespace App\Http\Controllers;

use App\Models\Servicios;
use App\Utils\Selects;
use App\Utils\ServiciosUtils;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServiciosController extends Controller
{
    public function index()
    {
        return view('admin.servicios.index');
    }

    public function getNuevoServicio(Request $request)
    {      
        $categorias = Selects::categorias();
        $servicio = ServiciosUtils::newServicios($request);

        return view('admin.servicios.components.modals.modal_nuevo', compact('categorias','servicio'));  
    }

    public function store(Request $request)
    {
        $servicio = Servicios::create([

            'categoria_id' => $request->input('categoria_id'),
            'ser_nombre' => $request->input('ser_nombre'),
            'ser_imagen' => $request->input('ser_imagen'),
            'ser_link_especial' => $request->input('ser_link_especial'),
            'ser_link_normal' => $request->input('ser_link_normal'),
            'ser_notas' => $request->input('ser_notas'),
            'ser_usuario' => $request->input('ser_usuario'),
            'ser_password' => $request->input('ser_password'),

        ]);

        // Upload Receipt File
        if ($request->ser_imagen) {
            $request->validate(['ser_imagen' => 'required|image|mimes:png,jpg|max:2048']);
            $path = $request->ser_imagen->storeAs('servicio', 'servicio-'. $servicio->id .'.'.$request->ser_imagen->getClientOriginalExtension(), 'public');
            $servicio->ser_imagen = '/'.$path;
            $servicio->save();
        }
            
        return redirect()->route('getListaServicios');
    }

    public function edit(Request $request, $servicioId)
    {      
        $categorias = Selects::categorias();
        $servicio = ServiciosUtils::servicioId($servicioId);    


        return view('admin.servicios.components.modals.modal_edit', compact('categorias','servicio'));
    }

    public function update(Request $request, $servicioId)
    {
        $servicio = Servicios::findOrFail($servicioId);

        $servicio->update([
           
            'categoria_id' => $request->input('categoria_id'),
            'ser_nombre' => $request->input('ser_nombre'),
            'ser_imagen' => $request->input('ser_imagen'),
            'ser_link_especial' => $request->input('ser_link_especial'),
            'ser_link_normal' => $request->input('ser_link_normal'),
            'ser_notas' => $request->input('ser_notas'),
            'ser_usuario' => $request->input('ser_usuario'),
            'ser_password' => $request->input('ser_password'),
        ]);
         

        if ($request->ser_imagen) {
            $request->validate(['ser_imagen' => 'required|image|mimes:png,jpg|max:2048']);
            $path = $request->ser_imagen->storeAs('servicio', 'servicio-'. $servicio->id .'.'.$request->ser_imagen->getClientOriginalExtension(), 'public');
            $servicio->ser_imagen = '/'.$path;
            $servicio->save();
        }


        return redirect()->route('getListaServicios');
        
    }

    public function getListadoServicio(Request $request)
    {

        if ($request->ajax()) {
            
            $data =  $request->only(['start_date', 'end_date', 'categoria_id']);
            $servicios = ServiciosUtils::servicios($data);

            return DataTables::of($servicios)
            ->addColumn('action', function ($row) {                  
                
                $estado = '';

                $estado = '';
                $estado .= '<a href=""  class="btn btn-outline-danger btn-xs"><i class="fa fa-trash-o"></i> </a>';

               
                $estado .= '<a data-href="'. route('editServicio', [$row->id]) .'" data-container=".view_register"  class="btn btn-outline-warning btn-xs btn-modal"><i class="fa fa-pencil-square-o"></i> </a>';
                $estado .= '<a href="'. route('showReciboCaja', [$row->id]) .'"  class="btn btn-outline-secondary btn-xs"><i class="fa fa-external-link"></i> </a>';
               
                return $estado;
            })
 
                ->rawColumns(['action'])
                ->make(true);
          
        }
    }
}
