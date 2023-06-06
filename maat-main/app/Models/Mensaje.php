<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensaje';
    public $timestamps = false;

    protected $fillable = [
        'id', 'contenido', 'fecha', 'hora', 'chat_id', 'id_origen', 'id_destino'

    ];

    use HasFactory;
}
