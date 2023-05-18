<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{

    protected $table = 'likes';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id',
        'post_id',
        'isLiked',
    ];


    use HasFactory;

    // HALA MADRID
}
