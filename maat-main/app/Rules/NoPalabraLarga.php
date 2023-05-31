<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NoPalabraLarga implements Rule
{
    public function passes($attribute, $value)
    {
        $palabras = preg_split('/\s+/', $value);

        foreach ($palabras as $palabra) {
            if (strlen($palabra) > 20) {
                return false;
            }
        }

        return true;
    }

    public function message()
    {
        return 'La descripción no puede contener palabras con más de 20 caracteres.';
    }
}
