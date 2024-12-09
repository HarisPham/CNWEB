<?php

namespace Database\Seeders;

use App\Models\ItCenter;
use Illuminate\Database\Seeder;

class ItCenterSeeder extends Seeder
{
    public function run()
    {
        ItCenter::factory(10)->create(); // Tạo 10 trung tâm giả
    }
}
