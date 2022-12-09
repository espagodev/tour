<?php

namespace App\Http\Controllers;

use App\Models\Agente;
use App\Models\Factura;
use Illuminate\Http\Request;

class FirmaController extends Controller
{
    public function getFirmaFactura($facturaId)
    {
        $factura = Factura::findOrFail($facturaId);
        return view('firma.index', compact( 'factura','facturaId'));
    }

    public function getFirmaPlazo($facturaId)
    {
        $billetePlazo = Factura::findOrFail($facturaId);
        return view('firma.plazos', compact( 'billetePlazo','facturaId'));
    }

    public function getFirmaRecibo($facturaId)
    {
        $factura = Factura::findOrFail($facturaId);
        return view('firma.recibo', compact( 'factura','facturaId'));
    }


    public function firmaAgente($agenteId)
    {
        // $agente = Agentes::findOrFail($agenteId);
        // dd($agente);
        return view('firma.agente', compact( 'agenteId'));
    }

    public function storeFirma(Request $request){

        $facturaId = $request->factura_id;
        $factura = Factura::findOrFail($facturaId);
        $folderPath = public_path('storage/firma/'); // create signatures folder in public directory

      
        $image_parts = explode(";base64,", $request->fac_firma);        
        $image_type_aux = explode("image/", $image_parts[0]);       
        $image_type = $image_type_aux[1];      
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . 'firma-'.$factura->id . '.' . $image_type;

        file_put_contents($file, $image_base64);
       
        
        $factura->update([
            'fac_firma' => $file          
        ]);

        if($factura->fac_tipo_documento == '1'){
            return redirect()->route('showFactura', ['factura' => $facturaId]);
        }elseif($factura->fac_tipo_documento == '2'){
            return redirect()->route('showReciboCaja', ['factura' => $facturaId]);
        }else{
            return redirect()->route('showBilletePlazo', ['factura' => $facturaId]);
        }
    }

    public function storeFirmaAgente(Request $request){

        $agenteId = $request->agente_id;
        
        $agente = Agente::where('user_id', $agenteId)->first();
       
        $folderPath = 'storage/agente_firma/'; // create signatures folder in public directory
     
        $image_parts = explode(";base64,", $request->age_firma_digital);        
        $image_type_aux = explode("image/", $image_parts[0]);       
        $image_type = $image_type_aux[1];      
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . 'agente_firma-'.$agente->id . '.' . $image_type;

        file_put_contents($file, $image_base64);
            
        $agente->update([
            'age_firma_digital' => $file          
        ]);


        return view('agentes.index');
  
    }
}
