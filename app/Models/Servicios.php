<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria_id',
        'ser_nombre',
        'ser_imagen',
        'ser_link_especial',
        'ser_link_normal',
        'ser_notas',
        'ser_usuario',
        'ser_password',
        'ser_estado',       
    ];


    public function categoria()
    {
        return $this->hasOne(\App\Models\Categoria::class,'id');
    }
}
