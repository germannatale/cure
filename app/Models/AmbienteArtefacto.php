<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbienteArtefacto extends Model
{
    use HasFactory;

    protected $table = 'ambiente_artefacto';

    protected $fillable = [
        'artefacto_id',
        'ambiente_id',
    ];

    public function artefacto()
    {
        return $this->belongsTo(Artefacto::class);
    }

    public function ambiente()
    {
        return $this->belongsTo(Ambiente::class);
    }
}
