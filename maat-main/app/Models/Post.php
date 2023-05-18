<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'post';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id'
    ];

    use HasFactory;
}
