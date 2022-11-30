<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAjustesEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajustes_empresas', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('pais_id')->references('id')->on('pais');
            $table->foreignId('time_zone_id')->references('id')->on('time_zone')->nullable(); 
            $table->foreignId('time_format_id')->references('id')->on('time_format')->nullable(); 
            $table->foreignId('divisa_id')->references('id')->on('divisa')->nullable(); 
            $table->foreignId('date_format_id')->references('id')->on('date_format')->nullable(); 
            $table->string('aje_simbolo_moneda')->nullable();
            $table->string('aje_nombre')->nullable();
            $table->string('aje_codigo_turismo')->nullable();            
            $table->string('aje_codigo_postal')->nullable();
            $table->string('aje_direccion')->nullable();
            $table->string('aje_pais')->nullable();
            $table->string('aje_provincia')->nullable();
            $table->string('aje_municipio')->nullable();
            $table->string('aje_telefono')->nullable();
            $table->string('aje_movil')->nullable();
            $table->string('aje_email')->nullable();
            $table->string('aje_web')->nullable();         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ajustes_empresas');
    }
}
