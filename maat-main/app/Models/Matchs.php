<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchs extends Model
{
    protected $table = 'match';
    public $timestamps = false;


    use HasFactory;
}
