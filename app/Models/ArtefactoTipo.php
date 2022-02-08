<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtefactoTipo extends Model
{
    use HasFactory;

    protected $table = 'artefacto_tipo';

    protected $fillable = [
        'nombre',        
    ];

    public function artefactos()
    {
        return $this->hasMany(Artefacto::class);
    }
}
