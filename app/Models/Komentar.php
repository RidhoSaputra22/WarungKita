<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = "komentars_222118";
    protected $primaryKey = "222118_id_komentar";

    protected $fillable = [
        '222118_id_user',
        '222118_id_menu',
        '222118_komentar',
    ];

    public function user() {
        return $this->belongsTo(User::class, '222118_id_user');
    }
    public function menu() {
        return $this->belongsTo(Menu::class, '222118_id_menu');
    }

}
