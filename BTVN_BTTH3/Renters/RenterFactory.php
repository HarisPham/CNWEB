<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RenterFactory extends Factory
{
    protected $model = \App\Models\Renter::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
