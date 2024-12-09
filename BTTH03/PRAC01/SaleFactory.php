<?php
namespace Database\Factories;

use App\Models\Sale;
use App\Models\Medicine;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    protected $model = Sale::class;

    public function definition()
    {
        return [
            'medicine_id' => Medicine::inRandomOrder()->first()->medicine_id, // Lấy ID thuốc ngẫu nhiên
            'quantity' => $this->faker->numberBetween(1, 20), // Số lượng bán ngẫu nhiên từ 1 đến 20
            'sale_date' => $this->faker->dateTimeBetween('-1 year', 'now'), // Ngày bán trong khoảng 1 năm qua
            'customer_phone' => $this->faker->optional()->numerify('##########')
        ];
    }
}

