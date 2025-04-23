<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = "carts_222339";
    protected $primaryKey = "222339_id_carts";


    protected $fillable = [
        '222339_id_menu',
        '222339_id_user',
        '222339_kode',
        '222339_jumlah',
        '222339_total',
        '222339_status',
        '222339_tanggal'
    ];

    public function menu(){
        return $this->belongsTo(Menu::class, '222339_id_menu');
    }
    public function pelanggan(){
        return $this->belongsTo(User::class, '222339_id_user');
    }

}
