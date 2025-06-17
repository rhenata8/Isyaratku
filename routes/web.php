<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Data_Akun;
use App\Http\Controllers\Akun_admin;
use App\Http\Controllers\login;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\C_Dashboard;
use App\Http\Controllers\C_kuis;
use App\Http\Controllers\C_Materi;
use App\Http\Controllers\C_user_kuis;
use App\Http\Controllers\C_User_Materi;

// use App\Http\Controllers\C_Materi;

Route::get('/', function () {
    return view('landing_page');
});

Route::get('/', [C_Data_Akun::class, 'landingPage'])->name('landing_page');


// route login
Route::get('/login', [Akun_admin::class, 'formLogin'])->name('login');
Route::post('/login', [login::class, 'login']);

// route register
Route::get('/register', [C_Data_Akun::class, 'formRegister'])->name('register');
Route::post('/register', [C_Data_Akun::class, 'register']);

// route profil
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [C_Data_Akun::class, 'showProfile'])->name('user/profile');
    Route::get('/profile/edit', [C_Data_Akun::class, 'editProfile'])->name('user/profile.edit');
    Route::put('/profile', [C_Data_Akun::class, 'updateProfile'])->name('user/profile.update');
    Route::delete('/profile/foto', [C_Data_Akun::class, 'deleteFoto'])->name('user/profile.delete_foto');
});



// route beranda
Route::get('/user/homepage_user', [C_Data_Akun::class, 'homepage_user'])->middleware('auth')->name('user/homepage_user');


// route logout
Route::post('/logout', [C_Data_Akun::class, 'logout'])->name('logout');
Route::post('/logout', [akun_admin::class, 'logout'])->name('logout');

// route admin
Route::group(['middleware' => function ($request, $next) {
    if (!session()->has('admin_logged_in')) {
        return redirect()->route('login'); // arahkan ke route login utama
    }
    return $next($request);
}], function () {
    Route::get('/admin/dashboard', [akun_admin::class, 'dashboard'])->name('admin/dashboard');
    Route::get('/admin/profile', [akun_admin::class, 'showProfile'])->name('admin/profile');
    Route::get('/admin/profile/edit', [akun_admin::class, 'editProfile'])->name('admin/profile.edit');
    Route::put('/admin/profile/update', [akun_admin::class, 'updateProfile'])->name('admin/profile.update');
    Route::delete('/admin/profile/foto', [akun_admin::class, 'deleteFoto'])->name('admin/profile.delete_foto');
});



// route materi admin
Route::resource('admin/materi', C_Materi::class)->parameters(['materi' => 'material'])->names([
        'index' => 'materi.index',
        'create' => 'materi.create',
        'store' => 'materi.store',
        'show' => 'materi.show',
        'edit' => 'materi.edit',
        'update' => 'materi.update',
        'destroy' => 'materi.destroy',
    ]);

Route::get('/admin/dashboard', [C_Dashboard::class, 'index'])->name('admin/dashboard');

// Kursus
    Route::get('/admin/kursus', [C_kuis::class, 'index'])->name('admin.kursus.index');
    Route::get('/admin/kursus/{level}', [C_kuis::class, 'showLevel'])->name('admin.kursus.level');
    Route::post('/admin/kursus/store', [C_kuis::class, 'create'])->name('admin.kursus.store');
    Route::put('/admin/kursus/update/{id}', [C_kuis::class, 'update'])->name('admin.kursus.update');
    Route::delete('/admin/kursus/delete/{id}', [C_kuis::class, 'delete'])->name('admin.kursus.delete');


Route::middleware(['auth'])->group(function () {
    // ... (rute profil user, homepage_user) ...

    // Rute Kuis untuk User
    Route::get('/kuis', [C_user_kuis::class, 'index'])->name('user.kuis.index');
    Route::get('/kuis/start/{level}', [C_user_kuis::class, 'startQuiz'])->name('user.kuis.start');
    Route::get('/kuis/{level}/question/{index}', [C_user_kuis::class, 'showQuestion'])->name('user.kuis.question');
    Route::post('/kuis/{level}/submit', [C_user_kuis::class, 'submitAnswer'])->name('user.kuis.submit');
    Route::get('/kuis/{level}/review', [C_user_kuis::class, 'reviewQuiz'])->name('user.kuis.review');
    Route::get('/kuis/history', [C_user_kuis::class, 'history'])->name('user.kuis.history');
});

Route::resource('materi-user', C_User_Materi::class)->parameters(['materi-user' => 'materi'])->names([
        'index' => 'user.materi.index',
        'show' => 'user.materi.show',
    ]);


    // --- TAMBAHKAN RUTE LAPORAN KUIS ADMIN INI ---
    Route::get('/admin/laporan/kuis', [Akun_admin::class, 'quizReportIndex'])->name('admin.laporan.kuis');
    // ---------------------------------------------
// });

