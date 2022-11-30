<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientoAlertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_alertas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('billetes_plazos_id')->references('id')->on('billetes_aplazos'); 
            $table->foreignId('factura_id')->references('id')->on('facturas');  
            $table->foreignId('user_id')->references('id')->on('users');  
            $table->string('moa_fecha'); 
            $table->text('moa_descripcion');        
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
        Schema::dropIfExists('movimiento_alertas');
    }
}
