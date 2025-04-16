<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Menu;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_menu_222118' => Menu::factory(),
            'id_user_222118' => User::factory(),
            'kode_222118' => fake()->word(),
            'status_222118' => 'belum',
            'jumlah_222118' => fake()->randomElement([15000, 23000, 7000, 6000, 12000]),
            'total_222118' => fake()->randomElement([15000, 23000, 7000, 6000, 12000, 67000]),
            'tanggal_222118' => fake()->dateTimeBetween('2024-01-01', '2024-12-31')
        ];
    }
}
