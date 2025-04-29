<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory, HasUlids;

    protected $table = "carts_222339";
    protected $primaryKey = "id_carts_222339";


    protected $fillable = [
        'id_menu_222339',
        'id_user_222339',
        'kode_222339',
        'jumlah_222339',
        'total_222339',
        'status_222339',
        'tanggal_222339'
    ];

    public function menu(){
        return $this->belongsTo(Menu::class, 'id_menu_222339');
    }
    public function pelanggan(){
        return $this->belongsTo(User::class, 'id_user_222339');
    }

}
