<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;


    protected $table = "menus_222339";
    protected $primaryKey = "222339_id_menu";

    protected $fillable = [
        '222339_nama',
        '222339_harga',
        '222339_foto',
        '222339_stok',
        '222339_id_kategori',
    ];

    public function kategori() {
        return $this->belongsTo(Category::class, '222339_id_kategori');

    }

}
