<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planes extends Model
{
    use HasFactory;

    protected $table = 'tipos_plan';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre',
        'precio',
        'num_max_asociaciones',
        'duracion'
    ];
}
