<?php

namespace App\Http\Controllers;

use App\Models\Apuntes;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $date_filters['this_month']['start'] = date('Y-m-01');
        $date_filters['this_month']['end'] = date('Y-m-t');
        $date_filters['this_week']['start'] = date('Y-m-d', strtotime('monday this week'));
        $date_filters['this_week']['end'] = date('Y-m-d', strtotime('sunday this week'));

        $apuntes = Apuntes::get();
        return view('dashboard.index', compact('date_filters','apuntes'));
    }
}
