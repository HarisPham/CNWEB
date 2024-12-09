<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laptop;
use App\Models\Renter;

class LaptopTableSeeder extends Seeder
{
    public function run()
    {if (Renter::count() === 0) {
        $this->command->warn('Bảng renter không có dữ liệu. Xin hãy thử lại!');
        return;
    }
        Laptop::factory(20)->create(); 
    }
}

