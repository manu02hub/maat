<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $table = 'transaccion';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'titular',
        'concepto',
        'fecha',
        'hora',
        'cantidad',
        'entidad_id',
    ];
}
