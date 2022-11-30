<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilletesPlazosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billetes_plazos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('factura_id')->references('id')->on('facturas')->nullable(); 
            $table->foreignId('agenda_id')->references('id')->on('agendas');
            $table->foreignId('user_id')->references('id')->on('users'); 
            $table->foreignId('mayorista_id')->references('id')->on('mayoristas');            
            $table->foreignId('categoria_id')->references('id')->on('categorias');
            $table->foreignId('sub_categoria_id')->references('id')->on('sub_categorias');
            $table->string('bilp_localizador');            
            $table->decimal('bilp_precio_total', 22, 2)->default(0);
            $table->decimal('bilp_precio_proveedor', 22, 2)->default(0);
            $table->decimal('bilp_saldo_cliente', 22, 2)->default(0); //debe
            $table->decimal('bilp_saldo_proveedor', 22, 2)->default(0); //debemos
            $table->string('bilp_fecha_viaje'); //fecha_ida
            $table->string('bilp_fecha_retorno');//fecha_retorno
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
        Schema::dropIfExists('billetes_plazos');
    }
}
