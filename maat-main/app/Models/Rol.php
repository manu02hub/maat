<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'rol';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre'
    ];

    public function usuarios()
    {
        return $this->hasMany(Users::class, 'rol_id');
    }
}
