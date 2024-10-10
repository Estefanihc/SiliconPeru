<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\DB;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductPurchase>
 */
class ProductPurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generar una combinación única
        do {
            $purchase_id = Purchase::inRandomOrder()->first()->id; // Selecciona un id aleatorio de una compra existente
            $product_id = Product::inRandomOrder()->first()->id;   // Selecciona un id aleatorio de un producto existente
            $quantity_purchased = $this->faker->numberBetween(1, 100); // Cantidad aleatoria de productos comprados

            // Verificar si la combinación ya existe
            $exists = DB::table('product_purchases')
                ->where('purchase_id', $purchase_id)
                ->where('product_id', $product_id)
                ->exists();
        } while ($exists); // Continúa hasta que encuentre una combinación única

        return [
            'purchase_id' => $purchase_id,
            'product_id' => $product_id,
            'quantity_purchased' => $quantity_purchased,
        ];
    }
}
