<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUlids;

    protected $table = "users_222339";
    protected $authPasswordName = 'password_222339';

    protected $primaryKey = "id_user_222339";



    protected $fillable = [
        'nama_222339',
        'alamat_222339',
        'hp_222339',
        'foto_222339',
        'role_222339',
        'username_222339',
        'password_222339'
    ];

}
