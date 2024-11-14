<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'ciaf_number',
        'purchase_date_time',
        'employee_id',
        'supplier_id',
        'quantity',
        'price',
    ];
    

    protected function ciafNumber(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtoupper($value),
        );
    }

    // En el modelo Purchase.php
    public function productPurchases()
    {
        return $this->hasMany(ProductPurchase::class);
    }
}
