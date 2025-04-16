<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Komentar;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create([
            'nama_222118' => 'user',
            'alamat_222118' => 'user',
            'foto_222118' => 'image/user/user.webp',
            'hp_222118' => 'user',
            'role_222118' => 'user',
            'username_222118' => 'user',
            'password_222118' => Hash::make('user'),

        ]);

        User::factory(1)->create([
            'nama_222118' => 'admin',
            'alamat_222118' => 'admin',
            'hp_222118' => 'admin',
            'foto_222118' => 'image/user/user.webp',
            'role_222118' => 'admin',
            'username_222118' => 'admin',
            'password_222118' => Hash::make('admin'),

        ]);

        Cart::factory(100)->create();

        // $this->call([
        //     CategorySeeder::class,
        //     MenuSeeder::class,

        // ]);







    }
}
