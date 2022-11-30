<?php

namespace App\Http\Controllers;

use App\Models\AjustesDocumentos;
use Illuminate\Http\Request;

class AjustesDocumentosController extends Controller
{
    public function update(Request $request, $id)
    {
        // dd($request, $id);
        $ajuste = AjustesDocumentos::updateOrCreate(
            [
                'id' => $id               
            ],
            [
            'ajd_prefijo_factura' => $request->input('ajd_prefijo_factura'),
            'ajd_prefijo_nota' => $request->input('ajd_prefijo_nota'),
            'ajd_prefijo_recibo' => $request->input('ajd_prefijo_recibo'),
            'ajd_prefijo_abono_cliente' => $request->input('ajd_prefijo_abono_cliente'),
            'ajd_prefijo_gastos' => $request->input('ajd_prefijo_gastos'),
            'ajd_prefijo_abono_mayorista' => $request->input('ajd_prefijo_abono_mayorista'),
            'ajd_inicial' => $request->input('ajd_inicial'),
            'ajd_incremento' => $request->input('ajd_incremento'),
            'ajd_digitos' => $request->input('ajd_digitos'),
        ]
    );

        return redirect()->back();

    }
}
