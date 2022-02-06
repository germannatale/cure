<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifario extends Model
{
    use HasFactory;

    protected $table = 'tarifarios';

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'proveedor_id',
        'localidad_id',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }

    public function tarifas()
    {
        return $this->hasMany(Tarifa::class);
    }
}
