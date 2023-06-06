<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dominio extends Model
{

    protected $table = 'dominio';

    protected $fillable = [
        'nombre',
        'entidad_id'
    ];

    public $timestamps = false;

    use HasFactory;
}
