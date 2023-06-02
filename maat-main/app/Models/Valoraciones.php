<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoraciones extends Model
{
    use HasFactory;

    protected $table = 'valoraciones';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'comentario',
        'estrellas',
        'user_id',
        'evento_id',
    ];
}
