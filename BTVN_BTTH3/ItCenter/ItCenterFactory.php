<?php

namespace Database\Factories;

use App\Models\ItCenter;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItCenterFactory extends Factory
{
    protected $model = ItCenter::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'location' => $this->faker->address,
            'contact_email' => $this->faker->unique()->safeEmail,
        ];
    }
}
