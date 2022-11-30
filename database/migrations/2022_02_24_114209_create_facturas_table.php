<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agenda_id')->references('id')->on('agendas'); 
            $table->foreignId('user_id')->references('id')->on('users');  
            $table->foreignId('observaciones_id')->references('id')->on('observaciones')->nullable();
            $table->foreignId('info_factura_id')->references('id')->on('info_facturas')->nullable();
            $table->foreignId('mayorista_id')->references('id')->on('mayoristas')->nullable();
            $table->foreignId('categoria_id')->references('id')->on('categorias')->nullable();   
            $table->foreignId('sub_categoria_id')->references('id')->on('sub_categorias')->nullable(); 
            $table->foreignId('forma_pago_id')->references('id')->on('forma_pagos')->nullable();
            $table->foreignId('estado_id')->references('id')->on('estados')->nullable();            
            $table->string('fac_numero')->nullable();
            $table->string('fac_recibo')->nullable();
            $table->string('fac_nota_credito')->nullable();              
            $table->decimal('fac_total', 22, 2)->default(0);
            $table->decimal('fac_total_pagado', 22, 2)->default(0);
            $table->decimal('fac_total_pendiente', 22, 2)->default(0);
            $table->decimal('fac_total_fee', 22, 2)->default(0);
            $table->decimal('fac_total_descuento', 22, 2)->default(0);
            $table->enum('fac_tipo_documento', ['1','2','3'])->default('1');
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
        Schema::dropIfExists('facturas');
    }
}
