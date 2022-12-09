<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;

class DashboardUtils
{
     public static function facturasDashboard()
    {
        $query = DB::table('facturas')
            ->select()
            ->where('facturas.id', $Id);
            return    $query->first();
    }
}