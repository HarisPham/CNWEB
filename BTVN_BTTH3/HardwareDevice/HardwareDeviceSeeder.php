<?php

namespace Database\Seeders;

use App\Models\HardwareDevice;
use App\Models\ItCenter;
use Illuminate\Database\Seeder;

class HardwareDeviceSeeder extends Seeder
{
    public function run()
    {
        if (ItCenter::count() === 0) {
            $this->command->warn('Bảng it_centers không có dữ liệu. Hãy chạy ItCenterSeeder trước.');
            return;
        }

        HardwareDevice::factory(50)->create(); // Tạo 50 thiết bị giả
    }
}
