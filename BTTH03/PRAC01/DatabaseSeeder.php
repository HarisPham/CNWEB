<?php

namespace Database\Seeders;

use App\Models\Medicine;
use APP\Models\Sale;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            MedicinesTableSeeder::class,
            SalesTableSeeder::class,
        ]);
        
    }
}
