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
            '222339_nama' => 'user',
            '222339_alamat' => 'user',
            '222339_foto' => 'image/user/user.webp',
            '222339_hp' => 'user',
            '222339_role' => 'user',
            '222339_username' => 'user',
            '222339_password' => Hash::make('user'),

        ]);

        User::factory(1)->create([
            '222339_nama' => 'admin',
            '222339_alamat' => 'admin',
            '222339_hp' => 'admin',
            '222339_foto' => 'image/user/user.webp',
            '222339_role' => 'admin',
            '222339_username' => 'admin',
            '222339_password' => Hash::make('admin'),

        ]);

        Cart::factory(100)->create();

        // $this->call([
        //     CategorySeeder::class,
        //     MenuSeeder::class,

        // ]);







    }
}
