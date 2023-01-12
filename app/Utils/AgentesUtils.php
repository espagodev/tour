<?php

namespace App\Utils;

use App\Models\Agenda;
use App\Models\Agente;
use Illuminate\Support\Facades\DB;

class AgentesUtils{
    public static function getAgenda($request)
    {
        $agenda = [];
        if ($request->has('q')) {
            $search = $request->q;
            $agenda = Agenda:: select('id','pais_id',
            'provincia_id',
            'municipio_id',
            'tipo_documento_id',
            'agd_nombres AS text',
            'agd_apellidos',
            'agd_email',
            'agd_documento',
            'agd_codigo_postal',
            'agd_direccion',
            'agd_telefono',
            'agd_movil')
            ->where('agd_nombres', 'LIKE', "%$search%")
                ->orWhere('agd_apellidos', 'like', '%' . $search . '%')
                ->orWhere('agd_documento', 'like', '%' . $search . '%')
                ->orWhere('agd_movil', 'like', '%' . $search . '%')
                ;
        }

        return   $agenda->get();
    }    
    public static function agentes($request)
    {
        $query = DB::table('users')
                    ->select('users.id',
                    'nombres',
                    'apellidos',
                    'email',
                    'age_telefono',
                    'age_movil',
                    'age_estado',
                    'provincia_id')
                    ->join('agentes', function ($join)  {
                        $join->on('users.id', '=', 'agentes.user_id');                            
                    });
                    
                    $query->orderByDesc('users.id');
           
            
       return  $query->get();
    }
    public static function agenteId($Id)
    {

        $query = DB::table('users')
            ->select(
                'agentes.id',
                'nombres',
                'apellidos',
                'email', 
                'provincia_id',
                'municipio_id',
                'age_razon_social',
                'age_cargo',
                'tipo_documento_id',
                'age_documento',
                'age_codigo_postal',
                'age_direccion',
                'age_telefono',
                'age_movil',
                'age_cuentabancaria',
                'age_ultima_entrada',
                'age_titulo_web_horarios',
                'age_whatsapp',
                'age_estado',
                'age_firma_digital'
                )
            ->leftjoin('agentes', function ($join) {
                $join->on('users.id', '=', 'agentes.user_id');
             })->where('users.id', $Id);

        return    $query->first();
        
    }

    public static function FiltroNombre($query, $agd_nombres)
    {
       return $query->where('agendas.agd_nombres', $agd_nombres);
    }

    public static function postNuevoAgente($request){

        $agente = Agente::create([
            'user_id' => $request->input('user_id'),
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
            'age_estado' => '1',
            

        ]);

        if ($request->age_firma_digital) {
            $request->validate(['age_firma_digital' => 'required|image|mimes:png,jpg|max:2048']);
            $path = $request->age_firma_digital->storeAs('agente_firma', 'agente_firma-'. $agente->id .'.'.$request->age_firma_digital->getClientOriginalExtension(), 'public');
            $agente->age_firma_digital = '/'.$path;
            $agente->save();
        }

    }
}