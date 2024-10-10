<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ciaf_number' => $this->faker->optional()->numerify('CIAF-#####'),
            'purchase_date_time' => $this->faker->dateTimeThisYear(),
            'employee_id' => Employee::inRandomOrder()->first()->id, // Selecciona un empleado existente
            'supplier_id' => Supplier::inRandomOrder()->first()->id, // Selecciona un proveedor existente
        ];
    }
}
