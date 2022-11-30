<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('categoria_id')->references('id')->on('categorias');
            $table->string('ser_nombre');
            $table->string('ser_imagen')->nullable();
            $table->string('ser_link_especial')->nullable();
            $table->string('ser_link_normal')->nullable();
            $table->string('ser_notas')->nullable();
            $table->string('ser_usuario')->nullable();
            $table->string('ser_password')->nullable();
            $table->integer('ser_estado')->default('1');
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
        Schema::dropIfExists('servicios');
    }
}
