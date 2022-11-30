<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agente extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'provincia_id',
        'municipio_id',
        'age_razon_social',
        'age_cargo',
        'tipo_documento_id',
        'age_documento',
        // 'age_pais',
        'age_codigo_postal',
        'age_direccion',
        'age_telefono',
        'age_movil',
        'age_cuentabancaria',
        'age_ultima_entrada',
        'age_titulo_web_horarios',
        'age_whatsapp',
        'age_estado',
        'age_firma_digital',
    ];
}
