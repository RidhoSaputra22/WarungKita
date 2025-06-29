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
            'nama_222339' => 'user',
            'alamat_222339' => 'user',
            'foto_222339' => 'image/user/user.jpg',
            'hp_222339' => 'user',
            'role_222339' => 'user',
            'username_222339' => 'user',
            'password_222339' => Hash::make('user'),

        ]);

        User::factory(1)->create([
            'nama_222339' => 'admin',
            'alamat_222339' => 'admin',
            'hp_222339' => 'admin',
            'foto_222339' => 'image/user/user.jpg',
            'role_222339' => 'admin',
            'username_222339' => 'admin',
            'email' => 'admin@gmail.com',
            'password_222339' => Hash::make('admin'),
        ]);
        User::factory(1)->create([
            'nama_222339' => 'driver',
            'alamat_222339' => 'driver',
            'hp_222339' => 'driver',
            'foto_222339' => 'image/user/user.jpg',
            'role_222339' => 'driver',
            'username_222339' => 'driver',
            'password_222339' => Hash::make('driver'),

        ]);

        Cart::factory(1)->create();

        // $this->call([
        //     CategorySeeder::class,
        //     MenuSeeder::class,

        // ]);







    }
}
