<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Energia extends Model
{
    use HasFactory;

    protected $table = 'energias';

    protected $fillable = [
        'id',
        'nombre'
    ];

    public function getUnidadAttribute()
    {       
        return $this->id == 1 ? 'kWh' : 'm3';        
    }

    public function getUnidadMinimaAttribute()
    {
        return $this->id == 1 ? 'Wh' : 'kcal';
    }

    public function getColorAttribute()
    {
        return $this->id == 1 ? 'primary' : 'warning';
    }

    public function getIconoAttribute()
    {
        return $this->id == 1 ? 'fa-bolt' : 'fa-fire';
    }

}
