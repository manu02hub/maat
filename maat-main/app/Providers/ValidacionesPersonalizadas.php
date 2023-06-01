<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
class ValidacionesPersonalizadas extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('palabra_larga_menor_de_quince_caracteres', function ($attribute, $value, $parameters, $validator) {
            $palabras = preg_split('/\s+/', $value);

            foreach ($palabras as $palabra) {
                if (strlen($palabra) > 15) {
                    return false;
                }
            }

            return true;
        });
    }
}
