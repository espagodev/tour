<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');  
            $table->foreignId('pais_id')->references('id')->on('pais');
            $table->foreignId('provincia_id')->references('id')->on('provincias');
            $table->foreignId('municipio_id')->references('id')->on('municipios');
            $table->foreignId('tipo_documento_id')->references('id')->on('tipo_documentos'); 
            $table->string('agd_nombres');
            $table->string('agd_apellidos');       
            $table->string('agd_email');
            $table->string('agd_documento');
            $table->string('agd_codigo_postal');
            $table->string('agd_direccion');
            $table->string('agd_telefono');
            $table->string('agd_movil')->nullable();    
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
        Schema::dropIfExists('agendas');
    }
}
