<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientoObservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_observaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('billetes_plazos_id')->references('id')->on('billetes_plazos'); 
            $table->foreignId('factura_id')->references('id')->on('facturas');  
            $table->foreignId('user_id')->references('id')->on('users');  
            $table->text('moo_descripcion');   
            $table->enum('estado', ['0','1'])->default('1');
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
        Schema::dropIfExists('movimiento_observaciones');
    }
}
