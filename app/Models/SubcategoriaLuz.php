<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcategoriaLuz extends Model
{
    use HasFactory;

    protected $table = 'subcategoria_luz';

    protected $fillable = [
        'nombre',        
    ];
}
