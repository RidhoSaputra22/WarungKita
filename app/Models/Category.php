<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories_222339";
    protected $primaryKey = "222339_id_kategori";

    protected $fillable = [
        '222339_kategori'
    ];


    public function menu() {
        return $this->hasMany(Menu::class, '222339_id_kategori');
    }

}
