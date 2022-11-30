<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('categoria_id')->references('id')->on('categorias');
            $table->string('pro_nombre');
            $table->string('pro_imagen')->nullable();
            $table->string('pro_link_especial')->nullable();
            $table->string('pro_link_normal')->nullable();
            $table->string('pro_notas')->nullable();
            $table->string('pro_usuario')->nullable();
            $table->string('pro_password')->nullable();
            $table->string('pro_identificador')->nullable();
            $table->string('pro_url_seg_1')->nullable();
            $table->string('pro_url_seg_2')->nullable();
            $table->string('pro_url_seg_3')->nullable();
            $table->string('pro_data_seg_1')->nullable();
            $table->string('pro_data_seg_2')->nullable();
            $table->string('pro_data_seg_3')->nullable();
            $table->integer('pro_estado')->default('0');
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
        Schema::dropIfExists('proveedores');
    }
}
