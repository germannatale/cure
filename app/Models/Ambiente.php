<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    use HasFactory;

    protected $table = 'ambientes';
   
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
        return $this->belongsToMany(Artefacto::class, 'ambiente_artefacto', 'ambiente_id', 'artefacto_id')->with('tipo')->with('energia'); 
    }

    public function luz_artefactos(){
        return $this->belongsToMany(Artefacto::class, 'ambiente_artefacto', 'ambiente_id', 'artefacto_id')
            ->where('artefactos.energia_id', 1)
            ->with('tipo')
            ->with('energia');
    }

    public function gas_artefactos(){
        return $this->belongsToMany(Artefacto::class, 'ambiente_artefacto', 'ambiente_id', 'artefacto_id')
            ->where('artefactos.energia_id', 2)
            ->with('tipo')
            ->with('energia');
    }

    public function agregarArtefacto($artefacto_id){
        $this->artefactos()->attach($artefacto_id);        
    }

    public function quitarArtefacto($artefacto_id){
        $this->artefactos()->detach($artefacto_id);        
    }

    public function consumoMensual($energia_id){
        $consumo = 0;
        $energia_id == 1 ? $artefactos = $this->luz_artefactos : $artefactos = $this->gas_artefactos;        
        foreach ($artefactos as $artefacto) {
            $consumo += $artefacto->consumoMensual();
        }
        return $consumo;
    }
    
}
