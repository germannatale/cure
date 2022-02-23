<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimulacionDetalle extends Model
{
    use HasFactory;   

    protected $table = 'simulacion_detalles';

    protected $fillable = [
        'simulacion_id',
        'ambiente',
        'artefacto',
        'consumo_artefacto',
        'gasto_artefacto',
    ];

    public function simulacion()
    {
        return $this->belongsTo('App\Models\Simulacion');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
