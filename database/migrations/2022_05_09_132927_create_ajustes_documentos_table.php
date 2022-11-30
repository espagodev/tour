<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAjustesDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajustes_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('ajd_prefijo_factura')->nullable();
            $table->string('ajd_prefijo_recibo')->nullable();
            $table->string('ajd_prefijo_nota')->nullable();
            $table->string('ajd_prefijo_gastos')->nullable();
            $table->string('ajd_prefijo_ingresos')->nullable();
            $table->string('ajd_prefijo_ajustes')->nullable();
            $table->string('ajd_prefijo_abono_cliente')->nullable();
            $table->string('ajd_prefijo_abono_mayorista')->nullable();
            $table->string('ajd_inicial')->default(1);
            $table->integer('ajd_incremento')->default(1);
            $table->integer('ajd_digitos');            
            $table->string('ajd_conteo_factura')->default(0);
            $table->string('ajd_conteo_recibo')->default(0);
            $table->string('ajd_conteo_nota')->default(0);
            $table->string('ajd_conteo_gastos')->default(0);
            $table->string('ajd_conteo_ingresos')->default(0);
            $table->string('ajd_conteo_ajustes')->default(0);
            $table->string('ajd_conteo_abono_cliente')->default(0);
            $table->string('ajd_conteo_abono_mayorista')->default(0);
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
        Schema::dropIfExists('ajustes_documentos');
    }
}
