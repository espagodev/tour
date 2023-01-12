<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentosContable extends Model
{
    use HasFactory;

    protected $fillable = [
        'doc_nombre',
        'doc_prefijo',        
        'doc_inicial',
        'doc_incremento',
        'doc_digitos',
        'doc_conteo',
        'doc_vencimiento_recordatorio_1',
        'doc_vencimiento_recordatorio_2',
        'doc_vencida_recordatorio_1',
        'doc_vencida_recordatorio_2',
        'doc_color',
        'doc_footer',
        'doc_template',
    ];

    public function setDocNombreAttribute($valor)
    {
        $this->attributes['doc_nombre'] = strtolower($valor);
    }

    
    public function getDocNombreAttribute($valor)
    {
        return ucwords($valor);
    }
}
