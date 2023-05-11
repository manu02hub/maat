<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    use HasFactory;

    protected $table = 'evento';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_final',
        'hora_inicio',
        'hora_final',
        'plazas',
        'organizacion_id'
    ];
}
