<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;

    protected $table = 'subcategorias';

    protected $fillable = [
        'nombre',
        'energia_id',
    ];

    public function tarifario()
    {
        return $this->hasMany(Tarifario::class);
    }

    public function tarifas()
    {
        return $this->hasMany(Tarifa::class);
    }
}
