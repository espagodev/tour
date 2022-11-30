<?php

namespace Database\Seeders;

use App\Models\AjustesEmpresa;
use Illuminate\Database\Seeder;

class AjustesEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AjustesEmpresa::create([
            'time_zone_id' => '1',
            'time_format_id' => '1',
            'divisa_id' => '1',
            'date_format_id' => '1',
            'aje_simbolo_moneda' => '1',
            'aje_nombre' => '1',
            'aje_codigo_turismo' => '1',
            'aje_codigo_postal' => '1',
            'aje_direccion' => '1',
            'aje_pais' => '1',
            'aje_provincia' => '1',
            'aje_municipio' => '1',
            'aje_telefono' => '1',
            'aje_movil' => '1',
            'aje_email' => '1',
            'aje_web' => '1',            
        ]);
    }
}
