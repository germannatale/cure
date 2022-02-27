<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'cuit',
        'direccion',
        'localidad_id',        
        'email',        
        'energia_id',
    ];

    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }

    public function energia()
    {
        return $this->belongsTo(Energia::class);
    }

    public function tarifario()
    {
        return $this->hasMany(Tarifario::class);
    }
}
