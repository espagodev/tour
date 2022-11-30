<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carpeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_nombre'
    ];

    //Mutadores
    public function setCarNombreAttribute($valor)
    {
        $this->attributes['car_nombre'] = strtolower($valor);
    }
    
    public function getCarNombreAttribute($valor)
    {
        return strtoupper($valor);
    }

}
