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
            'agd_movil',
            'car_nombre')
            ->join('carpetas', function ($join) {
                $join->on('agendas.carpeta_id', '=', 'carpetas.id');
            }) 
            ->where('agd_nombres', 'LIKE', "%$search%")
                ->orWhere('agd_apellidos', 'like', '%' . $search . '%')
                ->orWhere('agd_documento', 'like', '%' . $search . '%')
                ->orWhere('agd_movil', 'like', '%' . $search . '%')
                ;
        }
 
        return   $agenda->get();
    }

    public static function agenda($request)
    {
        $query = Agenda::select(
            'agendas.id',
            'user_id',
            'pais_id',
            'provincia_id',
            'municipio_id',
            'carpeta_id',
            'tipo_documento_id',
            'agd_nombres',
            'agd_apellidos',
            'agd_email',
            'agd_documento',
            'agd_codigo_postal',
            'agd_direccion',
            'agd_telefono',
            'agd_movil',
            'car_nombre'
        )->join('carpetas', function ($join) {
            $join->on('agendas.carpeta_id', '=', 'carpetas.id');
        }) ; 

      
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
            'carpeta_id',
            'tipo_documento_id',
            'agd_nombres',
            'agd_apellidos',
            'agd_email',
            'agd_documento',
            'agd_codigo_postal',
            'agd_direccion',
            'agd_telefono',
            'agd_movil',
            'car_nombre'
            
            )->join('carpetas', function ($join) {
                $join->on('agendas.carpeta_id', '=', 'carpetas.id');
            }) 
            ->where('agendas.id', $Id);

        return    $query->first();
        
    }
    public static function FiltroCarpeta($query, $carpeta_id)
    {
        return $query->where('agendas.carpeta_id', $carpeta_id);
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
       return $query->where('agendas.agd_apellido', $agd_apellido);
    }

    public static function FiltroDocumento($query, $agd_documento)
    {
       return $query->where('agendas.agd_documento', $agd_documento);
    }
}