<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizaciones extends Model
{
    use HasFactory;

    protected $table = 'organizacion';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'entidad_id'
    ];
}
