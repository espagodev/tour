<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Helper\SeederHelper;

class CarpetaSeeder extends SeederHelper
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private static $_DATE_CARPETA = array(
        ['id' => '1', 'car_nombre' => 'argentinos'],
        ['id' => '2', 'car_nombre' => 'bolivianos'],
        ['id' => '3', 'car_nombre' => 'BRASILEÑOS'],
        ['id' => '4', 'car_nombre' => 'camerun'],
        ['id' => '5', 'car_nombre' => 'chilenos'],
        ['id' => '6', 'car_nombre' => 'CLIENTES ESPECIALES'],
        ['id' => '7', 'car_nombre' => 'CLIENTES MBS'],
        ['id' => '8', 'car_nombre' => 'COLOMBIANOS'],
        ['id' => '9', 'car_nombre' => 'COSTA DE MARFIL'],
        ['id' => '10', 'car_nombre' => 'COSTA RICA'],
        ['id' => '11', 'car_nombre' => 'CUBANOS'],
        ['id' => '12', 'car_nombre' => 'DOMINICANOS'],
        ['id' => '13', 'car_nombre' => 'ECUATORIANOS'],
        ['id' => '14', 'car_nombre' => 'ESPAÑOLES'],
        ['id' => '15', 'car_nombre' => 'ESTADOS UNIDOS'],
        ['id' => '16', 'car_nombre' => 'FILIPINAS'],
        ['id' => '17', 'car_nombre' => 'GAMBIA'],
        ['id' => '18', 'car_nombre' => 'hondureños'],
        ['id' => '19', 'car_nombre' => 'imserso'],
        ['id' => '20', 'car_nombre' => 'marruecos'],
        ['id' => '21', 'car_nombre' => 'mexicanos'],
        ['id' => '22', 'car_nombre' => 'otros'],
        ['id' => '23', 'car_nombre' => 'PANAMÁ'],
        ['id' => '24', 'car_nombre' => 'PARAGUAYOS'],
        ['id' => '25', 'car_nombre' => 'PERUANOS'],
        ['id' => '26', 'car_nombre' => 'RUMANIA'],
        ['id' => '27', 'car_nombre' => 'SENEGALESES'],
        ['id' => '28', 'car_nombre' => 'UCRANIA'],
        ['id' => '29', 'car_nombre' => 'URUGUAYOS'],
        ['id' => '30', 'car_nombre' => 'venezolanos'],
        ['id' => '31', 'car_nombre' => 'Nigeria'],
        ['id' => '32', 'car_nombre' => 'Guinea'],
        ['id' => '33', 'car_nombre' => 'ESTADOS UNIDOS'],
        ['id' => '34', 'car_nombre' => 'Registrado desde la Web'],
        ['id' => '35', 'car_nombre' => 'Ghana'],
        ['id' => '36', 'car_nombre' => 'Indonesia'],
        ['id' => '37', 'car_nombre' => 'Guatemala'],
        ['id' => '38', 'car_nombre' => 'BieloRusia'],
        ['id' => '39', 'car_nombre' => 'Rusia'],
        ['id' => '40', 'car_nombre' => 'Cabo Verde'],
        ['id' => '41', 'car_nombre' => 'Mauritania'],
        ['id' => '42', 'car_nombre' => 'Kenia'],
        ['id' => '43', 'car_nombre' => 'Mali'],
        ['id' => '44', 'car_nombre' => 'Moldavia'],
        ['id' => '45', 'car_nombre' => 'Nicaragua'],
        ['id' => '46', 'car_nombre' => 'Togo'],

        
    );


    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('carpetas')->truncate();

        $this->saveOrUpdate('carpetas', self::$_DATE_CARPETA);
    }
}
