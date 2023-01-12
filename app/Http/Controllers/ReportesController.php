<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function ventas()
    {
        return view('reportes.ventas');
    }

    public function movimientos()
    {
        return view('reportes.movimientos');
    }

    public function ingresos()
    {
        return view('reportes.ventas');
    }

    public function gastos()
    {
        return view('reportes.ventas');
    }
}
