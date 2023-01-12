<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasajerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasajeros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('factura_id')->references('id')->on('facturas')->nullable(); 
            $table->foreignId('agenda_id')->references('id')->on('agendas')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->nullable();
            $table->foreignId('sub_categoria_id')->references('id')->on('sub_categorias')->nullable();
            $table->foreignId('pais_id')->references('id')->on('pais')->nullable();            
            $table->string('pas_localizador');
            $table->string('pas_fecha_salidad');
            $table->string('pas_fecha_regreso');
            $table->decimal('pas_valor_individual', 22, 2)->default(0);
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
        Schema::dropIfExists('pasajeros');
    }
}
