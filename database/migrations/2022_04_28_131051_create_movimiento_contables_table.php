<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientoContablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_contables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('factura_id')->references('id')->on('facturas'); 
            $table->foreignId('billetes_plazos_id')->references('id')->on('billetes_aplazos')->nullable();
            $table->foreignId('forma_pago_id')->references('id')->on('forma_pagos');
            $table->foreignId('categoria_id')->references('id')->on('categorias')->nullable();
            $table->foreignId('sub_categoria_id')->references('id')->on('sub_categorias')->nullable();            
            $table->string('moc_numero');
            $table->text('moc_imagen')->nullable(); 
            $table->decimal('moc_monto', 22, 2)->default(0);
            $table->string('moc_fecha')->nullable(); 
            $table->text('moc_descripcion')->nullable();
            $table->enum('moc_contable', ['1','2','3','4','5'])->default('1');
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
        Schema::dropIfExists('movimiento_contables');
    }
}
