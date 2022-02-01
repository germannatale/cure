<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaLuz extends Model
{
    use HasFactory;

    protected $table = 'categoria_luz';

    protected $fillable = [
        'nombre',        
    ];
}
