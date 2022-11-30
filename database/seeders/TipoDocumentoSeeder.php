<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Helper\SeederHelper;

class TipoDocumentoSeeder extends SeederHelper
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private static $_DATE_TIPO_DOCUMENTO = array(
        ['id' => '1', 'tid_nombre' => 'DNI'],
        ['id' => '2', 'tid_nombre' => 'NIE'],
        ['id' => '3', 'tid_nombre' => 'Pasaporte'],
        ['id' => '4', 'tid_nombre' => 'Otro'],
    );

    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('tipo_documentos')->truncate();

        $this->saveOrUpdate('tipo_documentos', self::$_DATE_TIPO_DOCUMENTO);
    }
}
