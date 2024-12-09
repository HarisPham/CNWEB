<?php

namespace Database\Factories;

use App\Models\Library;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibraryFactory extends Factory
{
    protected $model = Library::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,               // Tạo tên thư viện giả
            'address' => $this->faker->address,            // Tạo địa chỉ thư viện giả
            'contact_number' => $this->faker->phoneNumber, // Tạo số điện thoại giả
        ];
    }
}
