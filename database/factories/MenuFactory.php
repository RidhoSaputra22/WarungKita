<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Counter for grouping menus.
     */
    private static int $menuCount = 0;
    private static ?Category $currentCategory = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // // Increment menu count
        // self::$menuCount++;

        // // Create a new category every 5 menus
        // if (self::$menuCount % 5 === 1) {
        //     self::$currentCategory = Category::factory()->create();
        // }

        return [
            '222339_nama' => fake()->name(),
            '222339_harga' => fake()->numberBetween(1000, 100000),
            '222339_foto' => 'image/nasilemak.jpeg',
            '222339_stok' => 10,
            '222339_id_kategori' => Category::factory(),
            'created_at' => fake()->unique()->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = "Asia/Makassar"),
        ];
    }
}
