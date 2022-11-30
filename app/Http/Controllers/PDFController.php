<?php

namespace App\Http\Controllers;

use App\Models\AjustesBasicos;
use App\Models\AjustesEmpresa;
use App\Utils\AgendaUtils;
use App\Utils\AgentesUtils;
use App\Utils\BilletePlazosUtils;
use App\Utils\FacturaUtils;
use App\Utils\ReciboCajaUtils;
use PDF; 
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function factura(Request $request, $facturaId)
    {

        $factura = FacturaUtils::facturaId($facturaId);
        $conceptos = BilletePlazosUtils::facturaConceptos($facturaId);
        $pagos = BilletePlazosUtils::facturaPagos($facturaId);
        $empresa = AjustesEmpresa::first();
        $ajustes = AjustesBasicos::first();
        $logo = $ajustes->logo_base;
        $agente = AgentesUtils::agenteId(session()->get('user.id'));

        $firma_base = isset($factura->fac_firma) ?  base64_encode(file_get_contents($factura->fac_firma)) : base64_encode(file_get_contents(url("img/firma.png")));
        $firma_agente = isset($agente->age_firma_digital) ?  base64_encode(file_get_contents($agente->age_firma_digital)) : base64_encode(file_get_contents(url("img/firma.png")));

        $pdf = PDF::loadView('pdf.factura.template_3', ['factura' => $factura,'empresa'=> $empresa, 'conceptos'=>$conceptos, 'pagos'=>$pagos, 'logo_base' =>$logo, 'firma' => $firma_base, 'firma_agente' => $firma_agente ]);

        //Render or Download
        if($request->has('download')) {
            return $pdf->download($factura->fac_numero .'.pdf');
        } else {
            return $pdf->stream($factura->fac_numero.'_'.$factura->full_name_agenda.'.pdf');
        }
    }

    public function billetePlazos(Request $request, $facturaId)
    {

        $factura = BilletePlazosUtils::BilletePlazoPdfId($facturaId);
        $conceptos = BilletePlazosUtils::facturaConceptos($facturaId);
        $pagos = BilletePlazosUtils::facturaPagos($facturaId);
        $empresa = AjustesEmpresa::first();
        $ajustes = AjustesBasicos::first();
        $logo = $ajustes->logo_base;
        $agente = AgentesUtils::agenteId(session()->get('user.id'));

        $firma_base = isset($factura->fac_firma) ?  base64_encode(file_get_contents($factura->fac_firma)) : base64_encode(file_get_contents(url("img/firma.png")));
        $firma_agente = isset($agente->age_firma_digital) ?  base64_encode(file_get_contents($agente->age_firma_digital)) : base64_encode(file_get_contents(url("img/firma.png")));

        $pdf = PDF::loadView('pdf.plazos.template_3', ['billetePlazo' => $factura,'empresa'=> $empresa, 'conceptos'=>$conceptos, 'pagos'=>$pagos, 'logo_base' =>$logo, 'firma' => $firma_base, 'firma_agente' => $firma_agente]);

        //Render or Download
        if($request->has('download')) {
            return $pdf->download($factura->fac_nota_credito.'.pdf');
        } else {
            return $pdf->stream($factura->fac_nota_credito.'_'.$factura->full_name_agenda.'.pdf');
        }
    }

    public function reciboCaja(Request $request, $facturaId)
    {

        $factura = ReciboCajaUtils::ReciboCajaPdfId($facturaId);
        $conceptos = ReciboCajaUtils::facturaConceptos($facturaId);
        $pagos = ReciboCajaUtils::facturaPagos($facturaId);
        $empresa = AjustesEmpresa::first();
        $ajustes = AjustesBasicos::first();
        $logo = $ajustes->logo_base;
        
        $agente = AgentesUtils::agenteId(session()->get('user.id'));
       
        $firma_base = isset($factura->fac_firma) ?  base64_encode(file_get_contents($factura->fac_firma)) : base64_encode(file_get_contents(url("img/firma.png")));
        $firma_agente = isset($agente->age_firma_digital) ?  base64_encode(file_get_contents($agente->age_firma_digital)) : base64_encode(file_get_contents(url("img/firma.png")));

        $pdf = PDF::loadView('pdf.recibo.template_3', ['factura' => $factura,'empresa'=> $empresa, 'conceptos'=>$conceptos, 'pagos'=>$pagos, 'logo_base' =>$logo, 'firma' => $firma_base, 'firma_agente' => $firma_agente]);

        //Render or Download
        if($request->has('download')) {
            return $pdf->download($factura->fac_recibo.'.pdf');
        } else {
            return $pdf->stream($factura->fac_recibo.'_'.$factura->full_name_agenda.'.pdf');
        }
    }
}
