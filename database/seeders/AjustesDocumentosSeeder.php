<?php

namespace Database\Seeders;

use App\Models\AjustesDocumentos;
use Illuminate\Database\Seeder;

class AjustesDocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AjustesDocumentos::create([
            'ajd_prefijo_factura' => 'FA - ',
            'ajd_prefijo_recibo' => 'RC - ',
            'ajd_prefijo_nota' => 'NC - ',
            'ajd_prefijo_gastos' => 'GT - ',
            'ajd_prefijo_abono_cliente' => 'AC - ',
            'ajd_prefijo_abono_mayorista' => 'AM - ',
            'ajd_inicial' => '1',
            'ajd_incremento' => '1',
            'ajd_digitos' => '4',
            'ajd_conteo_factura' => '0',
            'ajd_conteo_recibo' => '0',
            'ajd_conteo_nota' => '0',
            'ajd_conteo_gastos' => '0',
            'ajd_conteo_abono_cliente' => '0',
            'ajd_conteo_abono_mayorista' => '0', 
        ]);
    }
}
