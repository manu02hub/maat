<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Img_post extends Model
{
    public $timestamps = false;

    protected $table = 'img_post';

    protected $fillable = [
        'id',
        'ruta',
        'post_id'
    ];

    use HasFactory;
}
