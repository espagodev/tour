<?php

namespace App\Utils;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DocumentosContable;

class DocumentosUtils
{

    public static function newDocumento(Request $request)
    {
        $documento = new DocumentosContable();

        // Fill model with old input
        if (!empty($request->old())) {
            $documento->fill($request->old());
        }

        return $documento;
    }

    public static function documentos()
    {

        $query = DB::table('documentos_contables')
            ->select(
                'id',
                'doc_nombre',
                'doc_prefijo',
                'doc_incremento',
                'doc_digitos',
                'doc_conteo'
            );

        $query->orderByDesc('documentos_contables.id');

        return  $query->get();
    }

    public static function documentoId($Id)
    {

        $query = DB::table('documentos_contables')
            ->select(
                'id',
                'doc_nombre',
                'doc_prefijo',        
                'doc_inicial',
                'doc_incremento',
                'doc_digitos',
                'doc_conteo',
                'doc_vencimiento_recordatorio_1',
                'doc_vencimiento_recordatorio_2',
                'doc_vencida_recordatorio_1',
                'doc_vencida_recordatorio_2',
                'doc_color',
                'doc_footer',
                'doc_template'
            )->where('documentos_contables.id', $Id);

        return    $query->first();
        
    }
}
