<?php

namespace App\Http\Middleware;

use App\Models\AjustesEmpresa;
use App\Models\User;
use App\Utils\AjustesEmpresaUtils;
use Closure;
use Illuminate\Http\Request;

class SetSessionData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (!$request->session()->has('user')) {

            
            $user = User::where('id', auth()->user()->id)->first();
            

            $session_data = [
                'id' => $user->id,
                'nombre' => $user->nombres .' '. $user->apellidos ,
                'email' => $user->email               
            ];

            $empresa = AjustesEmpresaUtils::ajustesEmpresa();
            
            $empresa_data = [
                'date_format' => $empresa->daf_detalle,
                'time_zone' => $empresa->tiz_timezone,
                'symbol_placement' => $empresa->aje_simbolo_moneda,
            ];

            $divisa_data = [
                'code' => $empresa->div_codigo,
                'symbol' => $empresa->div_simbolo,
                'thousand_separator' => $empresa->div_separador_miles,
                'decimal_separator' => $empresa->div_separador_decimal
            ];
            
            $request->session()->put('empresa', $empresa_data);
            $request->session()->put('divisa', $divisa_data);
            $request->session()->put('user', $session_data);
        }
        return $next($request);
    }
}
