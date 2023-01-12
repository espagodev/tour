<?php

namespace App\Http\Controllers;

use App\Models\AjustesEmpresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AjustesEmpresaController extends Controller
{
    public function index()
    {
        $empresa = AjustesEmpresa::first();
      
        return view('ajustes.empresa.index', compact('empresa'));
    }


    public function store(Request $request)
    {

        $empresa = AjustesEmpresa::updateOrCreate(
            [
                'id' => $request->id               
            ],
            [
            'aje_nombre' => $request->input('aje_nombre'),
            'aje_codigo_turismo' => $request->input('aje_codigo_turismo'),
            'aje_direccion' => $request->input('aje_direccion'),
            'aje_pais' => $request->input('aje_pais'),
            'aje_provincia' => $request->input('aje_provincia'),
            'aje_municipio' => $request->input('aje_municipio'),
            'aje_telefono' => $request->input('aje_telefono'),
            'aje_movil' => $request->input('aje_movil'),
            'aje_codigo_postal' => $request->input('aje_codigo_postal'),

            'time_zone_id' => $request->input('time_zone_id'),
            'time_format_id' => $request->input('time_format_id'),
            'divisa_id' => $request->input('divisa_id'),
            'date_format_id' => $request->input('date_format_id'),
            'aje_simbolo_moneda' => $request->input('aje_simbolo_moneda'),
            'aje_email' => $request->input('aje_email'),
            'aje_web' => $request->input('aje_web'),
            ]
        );

        // $empresa = AjustesEmpresa::create([

        //     'time_zone_id' => $request->input('time_zone_id'),
        //     'time_format_id' => $request->input('time_format_id'),
        //     'divisa_id' => $request->input('divisa_id'),
        //     'date_format_id' => $request->input('date_format_id'),
        //     'aje_simbolo_moneda' => $request->input('aje_simbolo_moneda'),

        // ]);


        return $empresa;

    }
    public function update(Request $request, $empresa)
    {

        // dd($request);
        // $rules = [
        //     'aje_nombre' => 'required|max:255',
        //     'aje_codigo_turismo' => 'required',
        //     'aje_direccion' => 'required',
        //     'aje_pais' => 'required',
        //     'aje_provincia' => 'required',
        //     'aje_municipio' => 'required',
        //     'aje_telefono' => 'required|integer',

        // ];

        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->fails()) {
        //     $errmsgs = $validator->getMessageBag()->add('error', 'true');
        //     return response()->json($validator->errors());
        // }
        // dd($request,$id );
         AjustesEmpresa::updateOrCreate(
            [
                'id' => $empresa               
            ],
            [
            'aje_nombre' => $request->input('aje_nombre'),
            'aje_codigo_turismo' => $request->input('aje_codigo_turismo'),
            'aje_direccion' => $request->input('aje_direccion'),
            'aje_pais' => $request->input('aje_pais'),
            'aje_provincia' => $request->input('aje_provincia'),
            'aje_municipio' => $request->input('aje_municipio'),
            'aje_telefono' => $request->input('aje_telefono'),
            'aje_movil' => $request->input('aje_movil'),
            'aje_web' => $request->input('aje_web'),
            'aje_email' => $request->input('aje_email')

            ]
        );


        // $empresa = AjustesEmpresa::findOrFail($id);
        // $empresa->aje_nombre = $request->aje_nombre;
        // $empresa->aje_codigo_turismo = $request->aje_codigo_turismo;
        // $empresa->aje_direccion = $request->aje_direccion;
        // $empresa->aje_pais = $request->aje_pais;
        // $empresa->aje_provincia = $request->aje_provincia;
        // $empresa->aje_municipio = $request->aje_municipio;
        // $empresa->aje_telefono = $request->aje_telefono;

        // $empresa->aje_codigo_postal = $request->aje_codigo_postal;
        // $empresa->aje_movil = $request->aje_movil;
        // $empresa->aje_email = $request->aje_email;
        // $empresa->aje_web = $request->aje_web;
      

        // $empresa->save();

        // Session::flash('success', 'Blog category updated successfully!');

        return redirect()->back();
        // return view('setting.index', compact('empresa'));
    }

    public function updateAjustes(Request $request, $empresa)
    {

       
         AjustesEmpresa::updateOrCreate(
            [
                'id' => $empresa               
            ],
            [

            'time_zone_id' => $request->input('time_zone_id'),
            'time_format_id' => $request->input('time_format_id'),
            'divisa_id' => $request->input('divisa_id'),
            'date_format_id' => $request->input('date_format_id'),
            'aje_simbolo_moneda' => $request->input('aje_simbolo_moneda'),
            ]
        );



        return redirect()->back();
        // return view('setting.index', compact('empresa'));
    }
}
