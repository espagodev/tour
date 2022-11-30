<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;
    protected $fillable = [
        'categoria_id',
        'pro_nombre',
        'pro_imagen',
        'pro_link_especial',
        'pro_link_normal',
        'pro_notas',
        'pro_usuario',
        'pro_password',
        'pro_identificador',
        'pro_url_seg_1',
        'pro_url_seg_2',
        'pro_url_seg_3',
        'pro_data_seg_1',
        'pro_data_seg_2',
        'pro_data_seg_3',
        'pro_estado',       
    ];


    public function categoria()
    {
        return $this->hasOne(\App\Models\Categoria::class,'id');
    }
}
