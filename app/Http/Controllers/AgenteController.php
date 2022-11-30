<?php

namespace App\Http\Controllers;

use App\Models\Agente;
use App\Models\User;
use App\Utils\AgentesUtils;
use App\Utils\Selects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
class AgenteController extends Controller
{
    public function index()
    {
        return view('agentes.index');
    }

    public function getNuevoAgente()
    {        
        $documentos = Selects::documentos();
        $provincias = Selects::provincias();
        $municipios = Selects::municipios();

        return view('agentes.components.modals.modal_nuevo', compact('documentos', 'provincias', 'municipios'));
    }

    public function store(Request $request)
    {
        // dd($request->input('age_documento'));
        $user = User::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
            // dd($user);
        $agente = Agente::create([
            'user_id' => $user->id,
            'pais_id' => $request->input('pais_id'),
            'provincia_id' => $request->input('provincia_id'),
            'municipio_id' => $request->input('municipio_id'),          
            'tipo_documento_id' => $request->input('tipo_documento_id'),
            'age_razon_social' => $request->input('age_razon_social'),
            'age_cargo' => $request->input('age_cargo'),
            'age_cuentabancaria' => $request->input('age_cuentabancaria'),
            'age_documento' => $request->input('age_documento'),
            'age_codigo_postal' => $request->input('age_codigo_postal'),
            'age_direccion' => $request->input('age_direccion'),
            'age_telefono' => $request->input('age_telefono'),
            'age_movil' => $request->input('age_movil'),
            'age_whatsapp' => $request->input('age_whatsapp'),
            

        ]);

        if ($request->age_firma_digital) {
            $request->validate(['age_firma_digital' => 'required|image|mimes:png,jpg|max:2048']);
            $path = $request->age_firma_digital->storeAs('agente_firma', 'agente_firma-'. $agente->id .'.'.$request->age_firma_digital->getClientOriginalExtension(), 'public');
            $agente->age_firma_digital = '/'.$path;
            $agente->save();
        }

        // return $agenda;
        return view('agentes.index');


    }

    public function edit($agenteId)
    {        
        $documentos = Selects::documentos();
        $provincias = Selects::provincias();
        $municipios = Selects::municipios();

        $agente = AgentesUtils::agenteId($agenteId);

        return view('agentes.components.modals.modal_edit', compact('agente','documentos', 'provincias', 'municipios'));
    }

    public function update(Request $request, $agenteId)
    {
        $agente = Agente::findOrFail($agenteId);

        $agente->update([

            'provincia_id'  => $request->provincia_id,
            'municipio_id'  => $request->municipio_id,
            'age_razon_social'  => $request->age_razon_social,
            'age_cargo'  => $request->age_cargo,
            'tipo_documento_id'  => $request->tipo_documento_id,
            'age_documento'  => $request->age_documento,
            'age_codigo_postal'  => $request->age_codigo_postal,
            'age_direccion'  => $request->age_direccion,
            'age_telefono'  => $request->age_telefono,
            'age_movil'  => $request->age_movil,
            'age_cuentabancaria'  => $request->age_cuentabancaria,
            'age_ultima_entrada'  => $request->age_ultima_entrada,
            'age_titulo_web_horarios'  => $request->age_titulo_web_horarios,
            'age_whatsapp'  => $request->age_whatsapp,
        ]);
         
        if ($request->age_firma_digital) {
            $request->validate(['age_firma_digital' => 'required|image|mimes:png,jpg|max:2048']);
            $path = $request->age_firma_digital->storeAs('agente_firma', 'agente_firma-'. $agente->id .'.'.$request->age_firma_digital->getClientOriginalExtension(), 'public');
            $agente->age_firma_digital = '/'.$path;
            $agente->save();
        }


        if($request->usuario == '1'){
            return redirect()->route('editUsuario', ['usuario' => $agente->user_id]);
        }else{
            return view('agentes.index');
        }
       
        
    }

    public function getListadoAgentes(Request $request)
    {

        if ($request->ajax()) {
            $data['agd_nombres'] = !empty($request->agd_nombres) ?  $request->agd_nombres : '';
            $data['carpeta_id'] = !empty($request->carpeta_id) ?  $request->carpeta_id : '';

            $agentes = AgentesUtils::agentes($data);
            return DataTables::of($agentes)
            ->addColumn('estado', function ($row){
                $estado = '';
                if($row->age_estado == '1'){
                    $estado .=   '<span class="badge badge-primary">Activo</span>';
                }else{
                    $estado .=  '<span class="badge  badge-danger">Inactivo</span>';
                }
                return $estado;
            })
            ->addColumn('action', function ($row) {                  
                
                $action = '';
                $action .= '<a href="'. route('firmaAgente', [$row->id]) .'"  class="btn btn-outline-primary btn-xs"><i class="fa fa-italic"></i> </a>';

                $action .= '<a data-container=".view_register" href="#" data-href="'. route('editAgente', [$row->id]) .'"  class="btn btn-outline-warning btn-xs  btn-modal"><i class="fa fa-pencil-square-o"></i> </a>';
                $action .= '<a data-container=".view_register" href="#" data-href="'. route('imprimirExpediente', [$row->id]) .'"  class="btn btn-outline-info  btn-xs btn-modal"><i class="fa fa-external-link"></i> </a>';
                $action .= '<a href="'. route('getNuevoBilletePlazo', [$row->id]) .'"  class="btn btn-outline-danger btn-xs"><i class="fa fa-trash-o"></i> </a>';

                return $action;
            })

                ->rawColumns(['action','estado'])
                ->make(true);
        }
    }


}
