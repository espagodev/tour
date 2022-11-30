<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mayorista extends Model
{
    use HasFactory;

    protected $fillable = [
        'may_nombre',        
    ];


        //Mutadores
        public function setMayNombreAttribute($valor)
        {
            $this->attributes['may_nombre'] = strtolower($valor);
        }
        
        public function getMayNombreAttribute($valor)
        {
            return ucwords($valor);
        }

        /**
     * Obtener factura.
     */
    public function factura()
    {
        return $this->hasMany(\App\Models\Factura::class);
    }
}
