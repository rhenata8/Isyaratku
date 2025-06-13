<?php

namespace App\Http\Controllers;

use App\Models\M_Akun_Admin;
use App\Models\M_Data_Akun;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class C_Data_Akun extends Controller
{
    public function formLogin()
    {
        return view('login');
    }

    public function formRegister() {
        return view('register');
    }

    public function homepage()
    {
        return view('homepage'); // Pastikan file resources/views/homepage.blade.php ada
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = M_Data_Akun::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('homepage');
        }

        $admin = M_Akun_Admin::where('email', $request->email)->first();
        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_logged_in' => true, 'admin_id' => $admin->id]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->onlyInput('email');
    }

    public function register(Request $request) {
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:data_akun,email',
        'password' => 'required|string|min:8',
    ], [
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid. Email harus mengandung @.',
        'email.unique' => 'Email tidak boleh sama.',
        'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password minimal 8 karakter.',
    ]);
    M_Data_Akun::create([
        'nama_lengkap' => $request->nama_lengkap,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
     return redirect()->route('login')->with('success', 'Berhasil daftar, silakan login.');
    }
}
