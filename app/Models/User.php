<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "users_222339";
    protected $authPasswordName = '222339_password';

    protected $primaryKey = "222339_id_user";



    protected $fillable = [
        '222339_nama',
        '222339_alamat',
        '222339_hp',
        '222339_foto',
        '222339_role',
        '222339_username',
        '222339_password'
    ];

}
