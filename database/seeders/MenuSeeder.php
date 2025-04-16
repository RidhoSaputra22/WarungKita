<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        Menu::factory()->create([
            '222118_nama' => 'Ayam Geprek',
            '222118_harga' => 250000,
            '222118_foto' => 'image/ayamgeprek.jpeg',
            '222118_stok' => 10,
            '222118_id_kategori' => 1,
        ]);

        Menu::factory()->create([
            '222118_nama' => 'Nasi Goreng',
            '222118_harga' => 20000,
            '222118_foto' => 'image/nasigoreng.jpeg',
            '222118_stok' => 10,
            '222118_id_kategori' => 1,
        ]);

        Menu::factory()->create([
            '222118_nama' => 'Gado Gado',
            '222118_harga' => 18000,
            '222118_foto' => 'image/gadogado.jpeg',
            '222118_stok' => 10,
            '222118_id_kategori' => 1,
        ]);

        Menu::factory()->create([
            '222118_nama' => 'Nasi Lemak',
            '222118_harga' => 22000,
            '222118_foto' => 'image/nasilemak.jpeg',
            '222118_stok' => 10,
            '222118_id_kategori' => 1,
        ]);

        Menu::factory()->create([
            '222118_nama' => 'Nasi Padang',
            '222118_harga' => 30000,
            '222118_foto' => 'image/nasigoreng.jpeg',
            '222118_stok' => 10,
            '222118_id_kategori' => 1,
        ]);

        // MINUMAN

        Menu::factory()->create([
            '222118_nama' => 'Air Putih',
            '222118_harga' => 5000,
            '222118_foto' => 'image/airputih.jpeg',
            '222118_stok' => 10,
            '222118_id_kategori' => 2,
        ]);

        Menu::factory()->create([
            '222118_nama' => 'Es Teh',
            '222118_harga' => 8000,
            '222118_foto' => 'image/esteh.jpeg',
            '222118_stok' => 10,
            '222118_id_kategori' => 2,
        ]);

        Menu::factory()->create([
            '222118_nama' => 'Es Jeruk',
            '222118_harga' => 10000,
            '222118_foto' => 'image/esjeruk.jpeg',
            '222118_stok' => 10,
            '222118_id_kategori' => 2,
        ]);

        Menu::factory()->create([
            '222118_nama' => 'Kopi Susu',
            '222118_harga' => 15000,
            '222118_foto' => 'image/kopisusu.jpeg',
            '222118_stok' => 10,
            '222118_id_kategori' => 2,
        ]);

        Menu::factory()->create([
            '222118_nama' => 'Leci Tea',
            '222118_harga' => 12000,
            '222118_foto' => 'image/lecitea.jpeg',
            '222118_stok' => 10,
            '222118_id_kategori' => 2,
        ]);

        // UNGGULAN

        Menu::factory()->create([
            '222118_nama' => 'Nasi Padang + Es Teh',
            '222118_harga' => 35000,
            '222118_foto' => 'image/nasipadang-esteh.jpeg',
            '222118_stok' => 10,
            '222118_id_kategori' => 3,
        ]);

        Menu::factory()->create([
            '222118_nama' => 'Ayam Geprek + Es Jeruk',
            '222118_harga' => 30000,
            '222118_foto' => 'image/ayamgeprek-esteh.jpeg',
            '222118_stok' => 10,
            '222118_id_kategori' => 3,
        ]);
        Menu::factory()->create([
            '222118_nama' => 'Nasi Lemak + Es Jeruk',
            '222118_harga' => 28000,
            '222118_foto' => 'image/nasilemak-esteh.jpeg',
            '222118_stok' => 10,
            '222118_id_kategori' => 3,
        ]);
        Menu::factory()->create([
            '222118_nama' => 'Gado Gado + Es Jeruk',
            '222118_harga' => 25000,
            '222118_foto' => 'image/gadogado-esteh.jpeg',
            '222118_stok' => 10,
            '222118_id_kategori' => 3,
        ]);












    }
}
