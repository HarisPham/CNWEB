<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicine;
class MedicinesTableSeeder extends Seeder
{
    public function run()
    {
        Medicine::factory(50)->create();
    }
}
