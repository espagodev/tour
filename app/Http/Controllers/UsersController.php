<?php

namespace App\Http\Controllers;

use App\Models\Agente;
use App\Models\User;
use App\Utils\AgentesUtils;
use App\Utils\Selects;
use App\Utils\UsuariosUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.usuarios.index');
    }

    public function getNuevoUsuario(Request $request)
    {      
        $categorias = Selects::categorias();
        $usuario = UsuariosUtils::newUsuarios($request);

        return view('admin.usuarios.components.modals.modal_nuevo', compact('categorias','usuario'));  
    }

    public function store(Request $request)
    {
        $usuario = User::create([

            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Upload Receipt File
        if ($request->ser_imagen) {
            $request->validate(['ser_imagen' => 'required|image|mimes:png,jpg|max:2048']);
            $path = $request->ser_imagen->storeAs('usuario', 'usuario-'. $usuario->id .'.'.$request->ser_imagen->getClientOriginalExtension(), 'public');
            $usuario->moc_imagen = '/'.$path;
            $usuario->save();
        }
            
        return redirect()->route('getListaUsuarios');
    }


   

    public function getListadoUsuarios(Request $request)
    {

        if ($request->ajax()) {
            
            $data =  $request->only(['start_date', 'end_date', 'categoria_id']);
            $usuarios = UsuariosUtils::usuarios($data);

            return DataTables::of($usuarios)
            ->addColumn('action', function ($row) {                  
                
                $estado = '';
                $estado .= '<a data-href="'. route('getNuevoUsuarioAgente', [$row->id]) .'" data-container=".view_register"  class="btn btn-outline-primary btn-xs btn-modal"><i class="fa fa-user"></i> </a>';
                $estado .= '<a href="'. route('editUsuario', [$row->id]) .'"  class="btn btn-outline-secondary btn-xs"><i class="fa fa-pencil-square-o"></i> </a>';
                $estado .= '<a data-href="'. route('editGasto', [$row->id]) .'" data-container=".view_register_abono"  class="btn btn-outline-warning btn-xs btn-modal"><i class="fa fa-external-link"></i> </a>';

                return $estado;
            })
 
                ->rawColumns(['action'])
                ->make(true);
          
        }
    }


    public function getNuevoUsuarioAgente(Request $request, $usuarioId){

       
        $documentos = Selects::documentos();
        $provincias = Selects::provincias();
        $municipios = Selects::municipios();

       return view('admin.usuarios.components.modals.modal_nuevo_agente', compact('documentos', 'provincias', 'municipios', 'usuarioId'));
    }


    public function edit($usuarioId){

        $agente = Agente::where('user_id',$usuarioId)->first();
        $documentos = Selects::documentos();
        $provincias = Selects::provincias();
        $municipios = Selects::municipios();

        $usuario = User::findOrFail($usuarioId);

        return view('admin.usuarios.edit', compact('agente', 'usuario','usuarioId','documentos', 'provincias', 'municipios'));
    }

    public function update(Request $request, $userId)
    {
        $usuario = User::findOrFail($userId);

        $usuario->update([
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            // 'email' => $request->input('email'),
        ]);


        return redirect()->route('editUsuario', ['usuario' => $userId]);
    }

    public function postNuevoUsuarioAgente(Request $request)
    {

       $agente = AgentesUtils::postNuevoAgente($request);

        // return $agenda;
        return view('agentes.index');
    }
}
