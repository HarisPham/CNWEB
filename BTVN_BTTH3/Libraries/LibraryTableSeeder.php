<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Library;

class LibraryTableSeeder extends Seeder
{
    public function run()
    {
        Library::factory(20)->create(); // Tạo 20 thư viện giả
    }
}
