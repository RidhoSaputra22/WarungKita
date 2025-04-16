<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = "carts_222118";
    protected $primaryKey = "id_carts_222118";


    protected $fillable = [
        'id_menu_222118',
        'id_user_222118',
        'kode_222118',
        'jumlah_222118',
        'total_222118',
        'status_222118',
        'tanggal_222118'
    ];

    public function menu(){
        return $this->belongsTo(Menu::class, 'id_menu_222118');
    }
    public function pelanggan(){
        return $this->belongsTo(User::class, 'id_user_222118');
    }

}
