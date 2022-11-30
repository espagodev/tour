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
        'carpeta_id',
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

    public function carpeta()
    {
        return $this->hasOne(\App\Models\Carpeta::class,'id','carpeta_id');
    }

}
