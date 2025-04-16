<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories_222118";
    protected $primaryKey = "222118_id_kategori";

    protected $fillable = [
        'kategori'
    ];


    public function menu() {
        return $this->hasMany(Menu::class, '222118_id_kategori');
    }

}
