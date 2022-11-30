<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AjustesEmpresa extends Model
{
    use HasFactory;
    protected $fillable = [
        'aje_nombre',
        'time_zone_id',
        'time_format_id',
        'divisa_id',
        'date_format_id',
        'aje_simbolo_moneda',
        'aje_codigo_turismo',
        'aje_codigo_postal',
        'aje_direccion',
        'aje_pais',
        'aje_provincia',
        'aje_municipio',
        'aje_telefono',
        'aje_movil',
        'aje_email',
        'aje_web',
        'aje_zona_horaria',
        'aje_moneda',
        'aje_ubicacion_simbolo',
        'aje_formato_fecha',
        'aje_formato_hora',
    ];


    public static function newIngreso(Request $request)
    {
        $empresa = new AjustesEmpresa();

        // Fill model with old input
        if (!empty($request->old())) {
            $empresa->fill($request->old());
        }

        return $empresa;
    }

        //Mutadores
        public function setAjeCodigoTurismoAttribute($valor)
        {
            $this->attributes['aje_codigo_turismo'] = strtolower($valor);
        }

        public function setAjeDireccionAttribute($valor)
        {
            $this->attributes['aje_direccion'] = strtolower($valor);
        }

        public function setAjeNombreAttribute($valor)
        {
            $this->attributes['aje_nombre'] = strtolower($valor);
        }

        public function setAjeEmailAttribute($valor)
        {
            $this->attributes['aje_email'] = strtolower($valor);
        }

        public function setAjeWebAttribute($valor)
        {
            $this->attributes['aje_web'] = strtolower($valor);
        }

         //Asecsor
    public function getAjeCodigoTurismoAttribute($valor)
    {
        return strtoupper($valor);
    }
    
    public function getAjeDireccionAttribute($valor)
    {
        return ucwords($valor);
    }

    public function getAjeNombreAttribute($valor)
    {
        return strtoupper($valor);
    }

     /**
     * Obtener el time_zone.
     */
    public function timeZone()
    {
        return $this->hasOne(\App\Models\TimeZone::class,'id');
    }

     /**
     * Obtener el time_format.
     */
    public function timeFormat()
    {
        return $this->hasOne(\App\Models\TimeFormat::class,'id');
    }

        /**
     * Obtener el divisa.
     */
    public function divisa()
    {
        return $this->hasOne(\App\Models\Divisa::class,'id');
    }

    /**
     * Obtener el date_format.
     */
    public function dateFormat()
    {
        return $this->hasOne(\App\Models\DateFormat::class,'id');
    }

}
