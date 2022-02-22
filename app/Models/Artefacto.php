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

    public function tipo()
    {
        return $this->belongsTo(ArtefactoTipo::class, 'artefacto_tipo_id', 'id');
    }

    public function artefactos()
    {
        return $this->hasMany(AmbienteArtefacto::class);
    }

    public function energia()
    {
        return $this->belongsTo(Energia::class);
    }

    public function consumoMensual(){
        return $this->consumo_hora * $this->horas_uso_prom * 30;
    }    

    public function consumoAnual(){
        return $this->consumoMensual() * 12;
    }

    public function getUnidadAttribute(){
        return $this->energia->unidad;
    }
    



}
