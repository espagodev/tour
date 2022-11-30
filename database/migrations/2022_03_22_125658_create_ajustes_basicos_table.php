<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAjustesBasicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajustes_basicos', function (Blueprint $table) {
            $table->id();
            $table->string('favicon')->nullable();
            $table->string('logo')->nullable();
            $table->tinyInteger('preloader_status')->default('1');
            $table->string('preloader')->nullable();
            $table->string('website_title')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('footer_text')->nullable();
            $table->longText('copyright_text');
            $table->tinyInteger('copyright_section')->default('1');
            $table->tinyInteger('maintainance_mode')->default('0');
            $table->string('maintainance_text')->nullable();
            $table->string('maintenance_img')->nullable();
            $table->tinyInteger('maintenance_status')->default('0');
            $table->string('secret_path')->nullable();
            $table->tinyInteger('is_recaptcha')->default('0');
            $table->string('google_recaptcha_site_key')->nullable();
            $table->string('google_recaptcha_secret_key')->nullable();
            $table->tinyInteger('is_whatsapp')->default('1');
            $table->string('whatsapp_number')->nullable();
            $table->string('whatsapp_header_title')->nullable();
            $table->text('whatsapp_popup_message');
            $table->tinyInteger('whatsapp_popup')->default('1');
            $table->timestamps();

        });

        Schema::create('date_format', function (Blueprint $table) { 
            $table->id();
            $table->string('daf_nombre');
            $table->string('daf_detalle')->nullable();
            $table->string('daf_detalle_js')->nullable();
            $table->timestamps();
        });

        Schema::create('time_format', function (Blueprint $table) {
            $table->id();
            $table->string('tif_nombre');
            $table->string('tif_detalle')->nullable();
            $table->string('tif_detalle_js')->nullable();
            $table->timestamps();
        });

        Schema::create('time_zone', function (Blueprint $table) { 
            $table->id();
            $table->string('tiz_nombre');
            $table->string('tiz_timezone');
            $table->boolean('is_active');
            $table->timestamps();
        });

        Schema::create('divisa', function (Blueprint $table) { 
            $table->id();
            $table->string('div_pais', 100);
            $table->string('div_moneda', 100);
            $table->string('div_codigo', 25);
            $table->string('div_simbolo', 25);
            $table->string('div_separador_miles', 10);
            $table->string('div_separador_decimal', 10);
            $table->boolean('div_active')->default(true);
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
        Schema::dropIfExists('ajustes_basicos');
        Schema::dropIfExists('time_format');
        Schema::dropIfExists('date_format');
        Schema::dropIfExists('time_zone');
        Schema::dropIfExists('divisa');
    }
}
