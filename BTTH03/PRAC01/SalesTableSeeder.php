<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\Medicine;

class SalesTableSeeder extends Seeder
{
    public function run()
    {
        if (Medicine::count() === 0) {
            $this->command->warn('Bảng medicines không có dữ liệu. Xin hãy thử lại!');
            return;
        }

        Sale::factory()->count(50)->create();
    }
}