<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjustesDocumentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'ajd_prefijo_factura',
        'ajd_prefijo_abono_cliente',
        'ajd_prefijo_abono_mayorista',
        'ajd_prefijo_nota',
        'ajd_prefijo_recibo',
        'ajd_inicial',
        'ajd_incremento',
        'ajd_digitos',
        'ajd_conteo_factura',
        'ajd_conteo_abono_cliente',
        'ajd_conteo_abono_mayorista',        
        'ajd_conteo_recibo',
        'ajd_conteo_nota',
        'ajd_prefijo_gastos',
        'ajd_conteo_gastos',
    ];
}
