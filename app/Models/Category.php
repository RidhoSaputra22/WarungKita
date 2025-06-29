<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use HasUlids;

    protected $table = "categories_222339";
    protected $primaryKey = "id_kategori_222339";

    protected $fillable = [
        'id_kategori_222339',
        'kategori_222339'
    ];


    public function menu()
    {
        return $this->hasMany(Menu::class, 'id_kategori_222339');
    }
}
