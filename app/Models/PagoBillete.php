<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoBillete extends Model
{
    use HasFactory;

    protected $fillable = [
        'factura_id',
        'billetes_plazo_id',
        'pagb_monto',
        'pagb_descripcion',
    ];

            //Mutadores
            public function setPagbDescripcionAttribute($valor)
            {
                $this->attributes['pagb_descripcion'] = strtolower($valor);
            }
            
            public function getPagbDescripcionAttribute($valor)
            {
                return ucfirst($valor);
            }
}
