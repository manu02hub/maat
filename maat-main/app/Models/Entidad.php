<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    use HasFactory;

    protected $table = 'entidad';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre',
        'logo',
        'numero_tarjeta',
        'ubicacion',
        'web',
        'descripcion',
        'tamano',
        'numero_tarjeta'
    ];
}
