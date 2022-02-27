<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcategoriaGas extends Subcategoria
{
    use HasFactory;

    // Scope para filtrar por energia
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('gas', function ($query) {
            return $query->where('energia_id', 2);
        });

    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->energia_id = 2;
    }
   

}
