<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'brand' => $this->faker->company(),
            'dosage' => $this->faker->randomNumber(2) . ' mg',
            'form' => $this->faker->randomElement(['Tablet', 'Capsule', 'Liquid']),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'stock' => $this->faker->numberBetween(10, 1000),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}

