<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Landing_page');
});

// ROUTE LOGIN
Route::get('/login', function () {
    return view('login');
})->name('login');

// ROUTE REGISTER (jika diperlukan tombol register juga aktif)
Route::get('/register', function () {
    return view('register');
})->name('register');
