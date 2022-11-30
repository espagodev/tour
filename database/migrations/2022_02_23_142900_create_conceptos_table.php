<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('factura_id')->references('id')->on('facturas')->nullable(); 
            $table->foreignId('agenda_id')->references('id')->on('agendas')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->nullable(); 
            $table->foreignId('mayorista_id')->references('id')->on('mayoristas')->nullable();
            $table->foreignId('impuesto_id')->references('id')->on('impuestos')->nullable();
            $table->foreignId('sub_categoria_id')->references('id')->on('sub_categorias')->nullable(); 
            $table->text('con_descripcion')->nullable();
            $table->string('con_cantidad')->nullable();
            $table->string('con_localizador')->nullable();
            $table->decimal('con_monto', 22, 2)->default(0);
            $table->decimal('con_impuesto', 22, 2)->default(0);
            $table->decimal('con_descuento', 22, 2)->default(0);
            $table->decimal('con_total', 22, 2)->default(0);           
            $table->decimal('con_fee', 22, 2)->default(0);  
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
        Schema::dropIfExists('conceptos');
    }
}
