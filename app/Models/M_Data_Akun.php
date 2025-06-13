<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class M_Data_Akun extends Authenticatable
{
    use Notifiable;

    protected $table = 'data_akun';

    protected $fillable = ['nama_lengkap', 'email', 'foto', 'phone', 'password'];

    protected $hidden = ['password', 'remember_token'];
}
