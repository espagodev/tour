<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoBilletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_billetes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('factura_id')->references('id')->on('facturas');
            $table->foreignId('billetes_plazo_id')->references('id')->on('billetes_plazos');
            $table->decimal('pagb_monto', 22, 2)->default(0);
            $table->text('pagb_descripcion')->nullable();            
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
        Schema::dropIfExists('pago_billetes');
    }
}
