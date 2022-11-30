<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjustesBasicos extends Model
{
    use HasFactory;

    protected $appends = ['logo_base'];
    protected $fillable = [
        'favicon',
        'logo',
        'preloader_status',
        'preloader',
        'website_title',
        'footer_logo',
        'footer_text',
        'copyright_text',
        'copyright_section',
        'maintainance_mode',
        'maintainance_text',
        'maintenance_img',
        'maintenance_status',
        'secret_path',
        'is_recaptcha',
        'google_recaptcha_site_key',
        'google_recaptcha_secret_key',
        'is_whatsapp',
        'whatsapp_number',
        'whatsapp_header_title',
        'whatsapp_popup_message',
        'whatsapp_popup',
    ];

    public function getLogoAttribute($valor)
    {
        return isset($valor) ?  url("{$valor}") : url("img/logo-provisional.png");
    }

    public function getLogoBaseAttribute()
    {
        //  return $this->tcon_logo;

        $imageData = base64_encode(file_get_contents($this->logo));
        return isset($imageData) ?  $imageData : url("img/logo-provisional.png");
    }

}
