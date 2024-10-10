<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Employee extends Model
{
    use HasFactory;

    /**
     * Mutador: almacena 'first_name' en minúsculas.
     * Accesor: devuelve 'first_name' con cada palabra iniciando en mayúscula.
     */
    protected function firstName(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtolower($value), // Mutador
            get: fn ($value) => ucwords(strtolower($value)) // Accesor: cada palabra con la primera letra en mayúscula
        );
    }

    /**
     * Mutador: almacena 'last_name' en minúsculas.
     * Accesor: devuelve 'last_name' con cada palabra iniciando en mayúscula.
     */
    protected function lastName(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtolower($value), // Mutador
            get: fn ($value) => ucwords(strtolower($value)) // Accesor: cada palabra con la primera letra en mayúscula
        );
    }
}
