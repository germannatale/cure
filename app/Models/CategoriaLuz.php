<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaLuz extends Categoria
{
    use HasFactory;

    //Scope para filtrar por energia
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('luz', function ($query) {
            return $query->where('energia_id', 'luz');
        });

    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->energia_id = 'luz';
    }
}
