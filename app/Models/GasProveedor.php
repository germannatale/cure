<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasProveedor extends Proveedor
{
    use HasFactory;

    //scope para filtrar por tipo de energia
    protected static function boot()
    {
        parent::boot();
        
        static::addGlobalScope('gas', function ($query) {
            return $query->where('energia_id', 2);
        });
    }
    
}
