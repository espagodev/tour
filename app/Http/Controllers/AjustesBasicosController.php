<?php

namespace App\Http\Controllers;

use App\Models\AjustesBasicos;
use App\Utils\Selects;
use Illuminate\Http\Request;

class AjustesBasicosController extends Controller
{
    public function index()
    {
        $opcionesPagos = Selects::opcionesPago();
        $mayoristas = Selects::mayorista();
       
        return view('ajusteContable.index', compact('opcionesPagos','mayoristas'));
    }

    public function update(Request $request, $id)
    {
        $ajuste = AjustesBasicos::where('id',$id)->first();          
            

    if ($request->logo) {
        $request->validate(['logo' => 'required|image|mimes:png,jpg|max:2048']);
        $path = $request->logo->storeAs('ajustes', 'logo'.'.'.$request->logo->getClientOriginalExtension(), 'public_dir');
        $ajuste->logo = '/uploads/'.$path;
        $ajuste->save();
    }

    if ($request->favicon) {
        $request->validate(['favicon' => 'required|image|mimes:png,jpg|max:2048']);
        $path = $request->favicon->storeAs('ajustes', 'favicon'.'.'.$request->favicon->getClientOriginalExtension(), 'public_dir');
        $ajuste->favicon = '/uploads/'.$path;
        $ajuste->save();
    }

        return redirect()->back();

    }
}
