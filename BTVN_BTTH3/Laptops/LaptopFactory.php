<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Renter;

class LaptopFactory extends Factory
{
    protected $model = \App\Models\Laptop::class;

    public function definition()
    {
        return [
            'brand' => $this->faker->randomElement(['Dell', 'HP', 'Asus', 'Apple']),
            'model' => $this->faker->word() . ' ' . $this->faker->randomNumber(4),
            'specifications' => $this->faker->randomElement(['i5, 8GB RAM, 256GB SSD', 'i7, 16GB RAM, 512GB SSD']),
            'rental_status' => $this->faker->boolean(),
            'renter_id' => Renter::inRandomOrder()->value('id') ?: null, // Lấy ngẫu nhiên renter hoặc để null
        ];
    }
}
