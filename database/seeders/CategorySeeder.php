<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'kategori' => 'Makanan'
        ]);
        Category::factory()->create([
            'kategori' => 'Minuman'
        ]);
        Category::factory()->create([
            'kategori' => 'Unggulan'
        ]);

    }
}
