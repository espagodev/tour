<?php

return [
    
     /*
    |--------------------------------------------------------------------------
    | App Constants
    |--------------------------------------------------------------------------
    |Lista de todas las constantes para la aplicación
    */


    
    'document_size_limit' => '5000000', //in Bytes,
    'image_size_limit' => '5000000', //in Bytes

    'asset_version' => 1,

    'disable_purchase_in_other_currency' => true,
    
    'currency_precision' => 2, //Maximum 4
    'quantity_precision' => 2,  //Maximum 4

    
    'product_img_path' => 'img',

    'enable_sell_in_diff_currency' => false,
    'currency_exchange_rate' => 1,

    'default_date_format' => 'm/d/Y', //Formato de fecha predeterminado que se utilizará si la sesión no está configurada. Todos los formatos válidos se pueden encontrar en https://www.php.net/manual/en/function.date.php
    
];
