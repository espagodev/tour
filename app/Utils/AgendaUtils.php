<?php

namespace App\Utils;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendaUtils{

    public static function newAgenda(Request $request)
    {
        $agenda = new Agenda();

        // Fill model with old input
        if (!empty($request->old())) {
            $agenda->fill($request->old());
        }

        return $agenda;
    }
    public static function getAgenda($request)
    {
        $agenda = [];
        if ($request->has('q')) {
            $search = $request->q;
            $agenda = Agenda:: select('agendas.id',
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
            ->orWhere('agd_apellidos', 'LIKE', '%' . $search . '%')
            ->orWhere('agd_documento', 'LIKE', '%' . $search . '%')
            ->orWhere('agd_telefono', 'LIKE', '%' . $search . '%')
                ;
        }
 
        return   $agenda->get();
    }

    public static function agendaFiltro($request)
    {
        $query = Agenda::select(
            'agendas.id',
            'user_id',
            'pais_id',
            'provincia_id',
            'municipio_id',
            'tipo_documento_id',
            'agd_nombres',
            'agd_apellidos',
            'agd_email',
            'agd_documento',
            'agd_codigo_postal',
            'agd_direccion',
            'agd_telefono',
            'agd_movil',
            DB::raw("CONCAT(COALESCE(agendas.agd_nombres, ''),' ',COALESCE(agendas.agd_apellidos, '')) as full_name_agenda"),

        ) ; 

      
            $query->orderBy('agendas.agd_nombres');
              return $query->get();
             


    }

    public static function agendaEditId($Id)
    {

        $query = DB::table('agendas')
            ->select(
            'agendas.id',
            'pais_id',
            'provincia_id',
            'municipio_id',
            'tipo_documento_id',
            'agd_nombres',
            'agd_apellidos',
            'agd_email',
            'agd_documento',
            'agd_codigo_postal',
            'agd_direccion',
            'agd_telefono',
            'agd_movil'
            
            )
            ->where('agendas.id', $Id);

        return    $query->first();
        
    }

    public static function agenda($request)
    {
        $query = DB::table('agendas')
            ->select(
                'agendas.id',
                'user_id',
                'pais_id',
                'tipo_documento_id',
                'agd_nombres',
                'agd_apellidos',
                'agd_email',
                'agd_documento',
                'agd_codigo_postal',
                'agd_direccion',
                'agd_telefono',
                'agd_movil',
                'pai_nombre',
                DB::raw("CONCAT(COALESCE(agendas.agd_nombres, ''),' ',COALESCE(agendas.agd_apellidos, '')) as full_name_agenda"),
                DB::raw("CONCAT(COALESCE(tipo_documentos.tid_nombre, ''),' ',COALESCE(agendas.agd_documento, '')) as documento")
            )
            ->leftjoin('pais', function ($join) {
                $join->on('agendas.pais_id', '=', 'pais.id');
            })->join('tipo_documentos', function ($join) {
                $join->on('agendas.tipo_documento_id', '=', 'tipo_documentos.id');
            });


        //     //Filtrar por cliente
            $agd_telefono = $request['agd_telefono'];
            if (!empty($agd_telefono)) {
             self::FiltroTelefono($query, $agd_telefono);
            }

             //Filtrar por fecha
           $agd_nombres = $request['agd_nombres'];
           if (!empty($agd_nombres)) {
            self::FiltroNombre($query, $agd_nombres);
           }

            //Filtrar por agente
            $pais_id = $request['pais_id'];
            if (!empty($pais_id)) {
             self::FiltroPais($query, $pais_id);
            }

             //Filtrar por agente
             $agd_documento = $request['agd_documento'];
             if (!empty($agd_documento)) {
              self::FiltroDocumento($query, $agd_documento);
             }

              //Filtrar por agente
            $agd_apellidos = $request['agd_apellidos'];
            if (!empty($agd_apellidos)) {
             self::FiltroApellido($query, $agd_apellidos);
            }

        $query->orderBy('agendas.agd_nombres', 'asc');
        return  $query->get();
    }

    public static function FiltroNombre($query, $agd_nombres)
    {
       return $query->where('agendas.agd_nombres', $agd_nombres);
    }

    public static function FiltroTelefono($query, $agd_telefono)
    {
       return $query->where('agendas.agd_telefono', $agd_telefono);
    }

    public static function FiltroApellido($query, $agd_apellido)
    {
       return $query->where('agendas.agd_apellidos', $agd_apellido);
    }

    public static function FiltroDocumento($query, $agd_documento)
    {
       return $query->where('agendas.agd_documento', $agd_documento);
    }

    public static function FiltroPais($query, $pais_id)
    {
       return $query->where('agendas.pais_id', $pais_id);
    }
}