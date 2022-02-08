<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    use HasFactory;

    protected $table = 'ambiente';
   
    protected $filliable = [
        'nombre',
        'tipo',
        'm3',
        'termico',
        'inmueble_id',
    ];

    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class);
    }

    public function artefactos()
    {
        return $this->hasMany(AmbienteArtefacto::class);
    }
}
