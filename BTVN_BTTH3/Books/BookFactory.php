<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,            // Tạo tên sách giả
            'author' => $this->faker->name,                // Tạo tên tác giả giả
            'publication_year' => $this->faker->year,      // Tạo năm xuất bản giả
            'genre' => $this->faker->word,                 // Tạo thể loại sách giả
        ];
    }
}
