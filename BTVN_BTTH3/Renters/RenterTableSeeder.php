<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Renter;

class RenterTableSeeder extends Seeder
{
    public function run()
    {
        Renter::factory(10)->create(); // Tạo 10 người thuê giả
    }
}
