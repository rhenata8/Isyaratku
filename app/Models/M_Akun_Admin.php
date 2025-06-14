<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class M_Akun_Admin extends Model
{
    use Notifiable;

    protected $table = 'data_akun_admin';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'foto',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
