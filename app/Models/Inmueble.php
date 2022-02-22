<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    use HasFactory;

    protected $table = 'inmuebles';

    protected $fillable = [
        'nombre',
        'direccion',
        'localidad_id',
        'antiguedad',
        'moradores',
        'tipo',
        'luz_proveedor_id',
        'gas_proveedor_id',
    ];

    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }

    public function luz_proveedor()
    {
        return $this->belongsTo(LuzProveedor::class, 'luz_proveedor_id', 'id');
    }

    public function gas_proveedor()
    {
        return $this->belongsTo(GasProveedor::class, 'gas_proveedor_id', 'id');
    }

    public function ambientes()
    {
        return $this->hasMany(Ambiente::class);
    }

    public function artefactos()
    {
        // Obtiene todos los artefactos de todos los ambientes
        return $this->ambientes->map->artefactos;
    }

    public function getConsumoMensualAttribute()
    {
        // Obtiene el consumo mensual de todos los artefactos
        $consumo = 0;
        foreach ($this->ambientes() as $ambiente) {
            $consumo += $ambiente->consumo_mensual;
        }
    }

}
