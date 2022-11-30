<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosContablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_contables', function (Blueprint $table) {
            $table->id();
            $table->string('doc_nombre')->nullable();
            $table->string('doc_prefijo')->nullable();
            $table->string('doc_inicial')->default(1);
            $table->integer('doc_incremento')->default(1);
            $table->integer('doc_digitos');            
            $table->string('doc_conteo')->default(0);
            $table->integer('doc_vencimiento_recordatorio_1')->default(0);
            $table->integer('doc_vencimiento_recordatorio_2')->default(0);
            $table->integer('doc_vencida_recordatorio_1')->default(0);
            $table->integer('doc_vencida_recordatorio_2')->default(0);
            $table->string('doc_color')->default('#308AF3');
            $table->string('doc_footer')->nullable();
            $table->string('doc_template')->default(1);
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
        Schema::dropIfExists('documentos_contables');
    }
}
