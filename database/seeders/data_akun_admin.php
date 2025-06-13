<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\M_Akun_Admin;

class data_akun_admin extends Seeder
{
   
    public function run(): void
    {
        M_Akun_Admin::create([
            'nama_lengkap' => 'Muhammad Arif Dwi Saputra',
            'foto' => 'default.png',
            'phone' => '085123456789',
            'email' => 'Putra@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
