<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Failed_jobs extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id', 'uuid', 'connection', 'queue', 'payload', 'exception', 'failed_at'
    ];

    use HasFactory;
}
