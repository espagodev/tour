<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Helper\SeederHelper;

class DateFormatSeeder extends SeederHelper
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private static $_DATE_FORMAT_DATA = array(
        ['id' => '1', 'daf_nombre' => 'YYYY-MM-DD', 'daf_detalle' => 'Y-m-d', 'daf_detalle_js' => 'YYYY-MM-DD'],
        ['id' => '2', 'daf_nombre' => 'YY-MM-DD', 'daf_detalle' => 'y-m-d', 'daf_detalle_js' => 'YY-MM-DD'],
        ['id' => '3', 'daf_nombre' => 'MM/DD/YYYY', 'daf_detalle' => 'm/d/Y', 'daf_detalle_js' => 'MM/DD/YYYY'],
        ['id' => '4', 'daf_nombre' => 'MM/DD/YY', 'daf_detalle' => 'm/d/y', 'daf_detalle_js' => 'MM/DD/YY'],
    );

    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('date_format')->truncate();

        $this->saveOrUpdate('date_format', self::$_DATE_FORMAT_DATA);
    }
}
