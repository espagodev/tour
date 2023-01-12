<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoFacturaController extends Controller
{
    public function index()
    {
        return view('admin.infoFactura.index');
    }

    public function nuevo(Request $request)
    {        
      

        return view('admin.proveedor.components.modals.modal_nuevo', compact('categorias','proveedor'));
    }
}
