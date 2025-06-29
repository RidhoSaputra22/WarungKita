<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable implements FilamentUser, HasName
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
        'email',
        'password_222339'
    ];

    public function getFilamentName(): string
    {
        return "{$this->nama_222339}";
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role_222339 === 'admin';
    }
}
