<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curiosidad extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'imagen'];
}
