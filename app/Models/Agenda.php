<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $appends = ['full_name_agenda'];
    protected $fillable = [
        'user_id',
        'pais_id',
        'provincia_id',
        'municipio_id',
        'tipo_documento_id',
        'agd_nombres',
        'agd_apellidos',
        'agd_email',
        'agd_documento',
        'agd_codigo_postal',
        'agd_direccion',
        'agd_telefono',
        'agd_movil',
    ];


    public function setAgdNombresttribute($valor)
    {
        $this->attributes['agd_nombres'] = strtolower($valor);
    }

    public function setAgdApellidosAttribute($valor)
    {
        $this->attributes['agd_apellidos'] = strtolower($valor);
    }

    public function setAgdDireccionAttribute($valor)
    {
        $this->attributes['agd_direccion'] = strtolower($valor);
    }
    
    public function getAgdNombresAttribute($valor)
    {
        return ucwords($valor);
    }

    
    public function getAgdApellidosAttribute($valor)
    {
        return ucwords($valor);
    }

    public function getAgdDireccionAttribute($valor)
    {
        return ucwords($valor);
    }

    public function getFullNameAgendaAttribute()
    {
        return $this->agd_nombres .' '. $this->agd_apellidos;
    }


}
