<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agentes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('pais_id')->references('id')->on('pais')->nullable();
            $table->foreignId('provincia_id')->references('id')->on('provincias')->nullable();
            $table->foreignId('municipio_id')->references('id')->on('municipios')->nullable();
            $table->foreignId('tipo_documento_id')->references('id')->on('tipo_documentos')->nullable();
            $table->string('age_razon_social')->nullable();
            $table->string('age_cargo')->nullable();
            $table->string('age_documento')->nullable();
            $table->string('age_codigo_postal')->nullable();
            $table->string('age_direccion')->nullable();
            $table->string('age_telefono')->nullable();
            $table->string('age_movil')->nullable();
            $table->string('age_cuentabancaria')->nullable();
            $table->string('age_ultima_entrada')->nullable();
            $table->string('age_titulo_web_horarios')->nullable();
            $table->string('age_whatsapp')->nullable();
            $table->string('age_estado')->nullable();
            $table->string('age_firma_digital')->nullable();            
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
        Schema::dropIfExists('agentes');
    }
}
