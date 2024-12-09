<?php

namespace Database\Factories;

use App\Models\HardwareDevice;
use App\Models\ItCenter;
use Illuminate\Database\Eloquent\Factories\Factory;

class HardwareDeviceFactory extends Factory
{
    protected $model = HardwareDevice::class;

    public function definition()
    {
        return [
            'device_name' => $this->faker->word . ' Device',
            'type' => $this->faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
            'status' => $this->faker->boolean,
            'center_id' => ItCenter::factory(),
        ];
    }
}
