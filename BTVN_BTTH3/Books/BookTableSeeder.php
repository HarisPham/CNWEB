<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Library;

class BookTableSeeder extends Seeder
{
    public function run()
    {
        if (Library::count() === 0) {
            $this->command->warn('Bảng libaries không có dữ liệu. Xin hãy thử lại!');
            return;
        }
        Book::factory(50)->create(); // Tạo 50 sách giả
    }
}
