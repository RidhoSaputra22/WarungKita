<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory, HasUlids;

    protected $table = "pesanan_222339";
    protected $primaryKey = "id_pesanan_222339";


    protected $fillable = [
        "konfirmasi_pelanggan_222339",
        "konfirmasi_driver_222339",
        "status_222339",
        "foto_konfirmasi_222339",
        "driver_222339",
        "user_222339",
        "kode_222339"
    ];

    public function driver()
    {
        return $this->belongsTo(User::class, "driver_222339", "username_222339");
    }

    public function pelanggan()
    {
        return $this->belongsTo(User::class, "user_222339", "username_222339");
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, "kode_222339", "kode_222339");
    }
}
