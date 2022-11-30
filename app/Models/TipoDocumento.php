<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;

    public $fillable = [
        'tid_nombre',       
    ];

        // //Mutadores
        // public function setTidNombreAttribute($valor)
        // {
        //     $this->attributes['tid_nombre'] = strtolower($valor);
        // }
        
        // public function getTidNombreAttribute($valor)
        // {
        //     return ucwords($valor);
        // }
}
