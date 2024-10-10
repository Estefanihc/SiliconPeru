<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Purchase extends Model
{
    use HasFactory;

    /**
     * Mutador para asegurarse de que el campo 'ciaf_number' se almacene en mayúsculas.
     */
    protected function ciafNumber(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtoupper($value), //Mutador
        );
    }
}
