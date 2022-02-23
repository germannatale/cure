<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulacion extends Model
{
    use HasFactory;

    protected $table = 'simulaciones';

    protected $fillable = [
        'user_id',
        'inmueble',
        'ambientes',
        'consumo_total',
        'gasto_total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detalles()
    {
        return $this->hasMany(SimulacionDetalle::class, 'simulacion_id', 'id');
    }

}
