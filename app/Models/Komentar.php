<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = "komentars_222339";
    protected $primaryKey = "222339_id_komentar";

    protected $fillable = [
        '222339_id_user',
        '222339_id_menu',
        '222339_komentar',
    ];

    public function user() {
        return $this->belongsTo(User::class, '222339_id_user');
    }
    public function menu() {
        return $this->belongsTo(Menu::class, '222339_id_menu');
    }

}
