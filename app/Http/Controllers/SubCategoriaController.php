<?php

namespace App\Http\Controllers;

use App\Models\SubCategoria;
use Illuminate\Http\Request;

class SubCategoriaController extends Controller
{
    public function getSubcategorias(Request $request){
        $categoria_id = $request->input('categoriaId');
        $subCategorias  = SubCategoria::where('categoria_id',$categoria_id)->get();

        return $subCategorias;
    }
}
