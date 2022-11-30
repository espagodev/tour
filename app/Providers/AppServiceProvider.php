<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ini_set('memory_limit', '-1');
        set_time_limit(0);

        if (config('app.debug')) {
            error_reporting(E_ALL & ~E_USER_DEPRECATED);
        } else {
            error_reporting(0);
        }

        Schema::defaultStringLength(191);

        //Blade directive para formatear el número en el formato requerido.
        Blade::directive('num_format', function ($expression) {
            return "number_format($expression, config('constants.currency_precision', 2), session('divisa')['decimal_separator'], session('divisa')['thousand_separator'])";
        });

        //Blade directive para formatear los valores de cantidad en el formato requerido.
        Blade::directive('format_quantity', function ($expression) {
            return "number_format($expression, config('constants.quantity_precision', 2), session('divisa')['decimal_separator'], session('divisa')['thousand_separator'])";
        });

        //Blade directive  para formatear fecha.
        Blade::directive('format_date', function ($date) {
            if (!empty($date)) {
                return "Carbon\Carbon::createFromTimestamp(strtotime($date))->format(session('empresa')['date_format'])";
            } else {
                return null;
            }
        });

                //Blade directive to return appropiate class according to transaction status
                Blade::directive('factura_estado', function ($status) {
                    return "<?php if($status == '1'){
                        echo 'bg-aqua';
                    }elseif($status == '2'){
                        echo 'bg-red';
                    }elseif ($status == '3') {
                        echo 'bg-light-green';
                    }?>";
                });

        //Blade directive to format currency.
        Blade::directive('format_currency', function ($number) {
            return '<?php 
                    $formated_number = "";
                    if (session("empresa.symbol_placement") == "before") {
                        $formated_number .= session("divisa")["symbol"] . " ";
                    } 
                    $formated_number .= number_format((float) ' . $number . ', config("constants.currency_precision", 2) , session("divisa")["decimal_separator"], session("divisa")["thousand_separator"]);
        
                    if (session("empresa.symbol_placement") == "after") {
                        $formated_number .= " " . session("divisa")["symbol"];
                    }
                    echo $formated_number; ?>';
        });

        $this->registerCommands();
    }


    /**
     * Register commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
    }
}
