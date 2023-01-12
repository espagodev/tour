<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Apuntes extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id',
        'apu_detalle',

    ];


    public static function newApunte(Request $request)
    {
        $apunte = new Apuntes();

        // Fill model with old input
        if (!empty($request->old())) {
            $apunte->fill($request->old());
        }

        return $apunte;
    }
}
