<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory, HasUuids;

    protected $table = "komentars_222339";
    protected $primaryKey = "id_komentar_222339";

    protected $fillable = [
        'id_user_222339',
        'id_menu_222339',
        'komentar_222339',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user_222339');
    }
    public function menu() {
        return $this->belongsTo(Menu::class, 'id_menu_222339');
    }

}
