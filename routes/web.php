<?php

use App\Http\Controllers\C_Data_Akun;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('Landing_page');
});

// ROUTE LOGIN
Route::get('/login', [C_Data_Akun::class, 'formLogin'])->name('login');
Route::post('/login', [C_Data_Akun::class, 'login']);

// ROUTE REGISTER (jika diperlukan tombol register juga aktif)
Route::get('/register', [C_Data_Akun::class, 'formRegister'])->name('register');
Route::post('/register', [C_Data_Akun::class, 'register']);

Route::get('/beranda', [C_Data_Akun::class, 'homepage'])->middleware('auth')->name('homepage');
