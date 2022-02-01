<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaGas extends Model
{
    use HasFactory;

    protected $table = 'categoria_gas';

    protected $fillable = [
        'nombre',        
    ];
}
