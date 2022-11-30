<?php

namespace App\Http\Controllers;

use App\Utils\ItinerariosUtils;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class ItinerariosController extends Controller
{
    public function index()
    {
        return view('itinerarios.index');
    }

    public function getNuevoItinerario()
    {        
        return view('itinerarios.modal.modal_nuevo');
    }

    public function getListadoItinerarios(Request $request)
    {
 
        if ($request->ajax()) {
            $data =  $request->only(['start_date', 'end_date', 'localizador']);

           
            $itinerarios = ItinerariosUtils::itinerarios($data);
            // dd($itinerarios);
            return DataTables::of($itinerarios)
            // ->editColumn('pas_fecha_salidad', '{{@format_date($pas_fecha_salidad)}}')
            // ->editColumn('pas_fecha_regreso', '{{@format_date($pas_fecha_regreso)}}')
          
            ->addColumn('action', function ($row) {                  
                
                $estado = '';

                $estado = '';
                $estado .= '<a href=""  class="btn btn-outline-danger btn-xs"><i class="fa fa-trash-o"></i> </a>';

                $estado .= '<a href="'. route('editFactura', [$row->id]) .'"  class="btn btn-outline-warning btn-xs"><i class="fa fa-pencil-square-o"></i> </a>';
               
                $estado .= '<a href="'. route('showFactura', [$row->id]) .'"  class="btn btn-outline-secondary btn-xs"><i class="fa fa-external-link"></i> </a>';

               
                return $estado;
            })
 
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
