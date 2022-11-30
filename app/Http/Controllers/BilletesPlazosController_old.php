<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BilletesPlazosController extends Controller
{
    public function index()
    {
        return view('billetes_plazo.index');
    }

    public function getNuevoBilletePlazo()
    {        
        return view('billetes_plazo.form.form_nuevo');
    }
}
