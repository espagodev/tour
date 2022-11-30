<?php

namespace Database\Seeders;

use App\Helper\SeederHelper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeFormatSeeder extends SeederHelper
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private static $_TIME_FORMAT_DATA = array(
        ['id' => '1', 'tif_nombre' => '24H', 'tif_detalle' => 'H:i','tif_detalle_js'=>'HH:mm'],
        ['id' => '2', 'tif_nombre' => '12H', 'tif_detalle' => 'h:i A','tif_detalle_js'=>'h:mm A'],
    );

    public function run()
    {
        DB::table('time_format')->truncate();

        $this->saveOrUpdate('time_format', self::$_TIME_FORMAT_DATA);
    }
}
