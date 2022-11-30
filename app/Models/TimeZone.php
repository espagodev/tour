<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeZone extends Model
{
    use HasFactory;

    public $table = 'time_zone';

    public $fillable = [
        'tiz_nombre',
        'tiz_timezone',
        'is_active',
    ];
}
