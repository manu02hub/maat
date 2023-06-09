<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentario';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id',
        'post_id'
    ];


    use HasFactory;
}
