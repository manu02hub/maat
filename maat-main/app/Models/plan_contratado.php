<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan_contratado extends Model
{
    use HasFactory;

    protected $table = 'plan_contratado';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'activo',
        'fecha_inicio',
        'fecha_fin',
<<<<<<< HEAD
        'tipos_plan_id',
        'empresa_id'
=======
        'tipos_plan_',
        'descripcion',
        'tamaño'
>>>>>>> carlos
    ];
}
