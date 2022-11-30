<?php

namespace App\Http\Controllers;

use App\Models\AjustesBasicos;
use App\Models\AjustesDocumentos;
use App\Models\AjustesEmpresa;
use App\Utils\Utils;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    
    public function index()
    {
            $digitos = Utils::totalDigitos();
             //HELPER
             $zonasHoraria = Utils::timeZone();
             $formatoHoras = Utils::timeFormat();
             $formatoFechas = Utils::dateFormat();
             $ubicacionSiombolos = Utils::ubicacionSimboloMoneda();
             $divisas = Utils::divisa();

             $empresa = AjustesEmpresa::first();
             $prefijo = AjustesDocumentos::first();
             $ajuste = AjustesBasicos::first();
            
        return view('setting.index', compact('digitos','zonasHoraria','formatoFechas','formatoHoras','ubicacionSiombolos','divisas','empresa','prefijo','ajuste'));
    }
}
