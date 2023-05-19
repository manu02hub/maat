<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public $timestamps = false;

    protected $table = 'chat';

    protected $fillable = [
        'id',
        'empresa_id',
        'organizacion_id'
    ];

    use HasFactory;
}
