<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('factura_id')->references('id')->on('facturas');
            $table->foreignId('billetes_plazos_id')->references('id')->on('billetes_plazos');
            $table->foreignId('movimiento_contable_id')->references('id')->on('movimiento_contables');
            $table->foreignId('user_id')->references('id')->on('users');
            // $table->foreignId('categoria_id')->references('id')->on('categorias');
            // $table->foreignId('sub_categoria_id')->references('id')->on('sub_categorias');
            $table->foreignId('forma_pago_id')->references('id')->on('forma_pagos');
            $table->string('mov_monto');
            // $table->string('mov_descripcion');
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
        Schema::dropIfExists('movimientos');
    }
}
