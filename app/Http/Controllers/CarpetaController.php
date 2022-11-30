<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarpetaController extends Controller
{
    public function index()
    {
        return view('admin/carpetas.index');
    }
}
