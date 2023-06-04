<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Img_eventos extends Model
{
    use HasFactory;

    protected $table = 'img_eventos';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'ruta',
        'evento_id'
    ];
}
