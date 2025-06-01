<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory, HasUlids;


    protected $table = "menus_222339";
    protected $primaryKey = "nama_222339";

    protected $fillable = [
        'nama_222339',
        'harga_222339',
        'foto_222339',
        'stok_222339',
        'kategori_222339',
    ];

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'kategori_222339');
    }
}
