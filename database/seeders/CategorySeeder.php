<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['nama' => 'Alam'],
            ['nama' => 'Sejarah'],
            ['nama' => 'Taman'],
            ['nama' => 'Pantai'],
            ['nama' => 'Religi'],
            ['nama' => 'Kolam Renang'],
        ]);
    }
}
