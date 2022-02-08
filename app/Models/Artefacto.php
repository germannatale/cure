<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artefacto extends Model
{
    use HasFactory;

    protected $table = 'artefactos';
   
    protected $fillable = [
        'nombre',
        'artefacto_tipo_id',
        'energia_id',
        'consumo_hora',
        'horas_uso_prom',
        'user_id',
    ];

    public function artefactoTipo()
    {
        return $this->belongsTo(ArtefactoTipo::class);
    }

    public function artefactos()
    {
        return $this->hasMany(AmbienteArtefacto::class);
    }

    public function energia()
    {
        return $this->belongsTo(Energia::class);
    }



}
