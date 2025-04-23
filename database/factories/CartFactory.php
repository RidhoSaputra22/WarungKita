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
            '222339_id_menu' => Menu::factory(),
            '222339_id_user' => User::factory(),
            '222339_kode' => fake()->word(),
            '222339_status' => 'belum',
            '222339_jumlah' => fake()->randomElement([15000, 23000, 7000, 6000, 12000]),
            '222339_total' => fake()->randomElement([15000, 23000, 7000, 6000, 12000, 67000]),
            '222339_tanggal' => fake()->dateTimeBetween('2024-01-01', '2024-12-31')
        ];
    }
}
