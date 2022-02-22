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

}
