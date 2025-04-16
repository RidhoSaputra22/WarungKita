<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "users_222118";
    protected $authPasswordName = 'password_222118';

    protected $primaryKey = "id_user_222118";



    protected $fillable = [
        'nama_222118',
        'alamat_222118',
        'hp_222118',
        'foto_222118',
        'role_222118',
        'username_222118',
        'password_222118'
    ];

}
