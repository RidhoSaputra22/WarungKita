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
        'username_222339',
        'nama_menu_222339',
        'komentar_222339',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'username_222339');
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'nama_222339');
    }
}
