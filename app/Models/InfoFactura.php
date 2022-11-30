<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoFactura extends Model
{
    use HasFactory;

    protected $fillable = [
        'inf_titulo',
        'inf_html',       
    ];

    
}
