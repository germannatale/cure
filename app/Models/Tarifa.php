<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;

    protected $table = 'tarifas';

    protected $fillable = [
        'tarifario_id',
        'categoria_id',
        'subcategoria_id',
        'precio_fijo',
        'precio_variable',
        'consumo_maximo',
        'consumo_minimo',
    ];

    public function tarifario()
    {
        return $this->belongsTo(Tarifario::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }
}
