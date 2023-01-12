<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    use HasFactory;

    protected $fillable = [
        'factura_id',
        'agenda_id',
        'user_id',
        'pais_id',
        'sub_categoria_id',
        'pas_localizador',
        'pas_fecha_salidad',
        'pas_fecha_regreso',
        'pas_valor_individual',
    ];

        //Mutadores
        public function setPasLocalizadorAttribute($valor)
        {
            $this->attributes['pas_localizador'] = strtolower($valor);
        }
        
        public function getPasLocalizadorAttribute($valor)
        {
            return strtoupper($valor);
        }

}
