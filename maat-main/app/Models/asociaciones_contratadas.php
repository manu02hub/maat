<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asociaciones_contratadas extends Model
{
    use HasFactory;

    protected $table = 'asociaciones_contratadas';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'plan_contratado_id',
        'organizacion_id'
    ];
}
