<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;


    protected $table = "menus_222118";
    protected $primaryKey = "222118_id_menu";

    protected $fillable = [
        '222118_nama',
        '222118_harga',
        '222118_foto',
        '222118_stok',
        '222118_id_kategori',
    ];

    public function kategori() {
        return $this->belongsTo(Category::class, '222118_id_kategori');

    }

}
