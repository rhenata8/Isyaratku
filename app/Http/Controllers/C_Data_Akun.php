<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\M_Data_Akun;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class C_Data_Akun extends Controller
{

    public function landingPage() {
        return view('landing_page');
    }
    public function formLogin() {
        return view('login');
    }

    public function formRegister() {
        return view('register');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('user/homepage_user');
        }
        return back()->withErrors(['Invalid credentials']);
    }

    public function register(Request $request) {
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:data_akun_user,email',
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

    public function showProfile()
{

    $user = M_Data_Akun::find(Auth::id());
    return view('user/profile', compact('user'));
}




public function editProfile()
{
    $user = Auth::user();
    return view('user/profile_update', compact('user'));
}


    public function updateProfile(Request $request)
{
    $user = Auth::user();

    // Validasi user login
    if (!$user || !$user instanceof \App\Models\M_Data_Akun) {
        return redirect()->route('login')->with('error', 'Anda harus login untuk memperbarui profil.');
    }

    // Validasi input
    $validated = $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:data_akun_user,email,' . $user->id,
        'phone' => 'nullable|string|max:20',
        'password' => 'nullable|string|min:8|confirmed',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);


    $user->nama_lengkap = $validated['nama_lengkap'];
    $user->email = $validated['email'];
    $user->phone = $validated['phone'] ?? $user->phone;

    // Jika ada file foto baru, hapus lama dan simpan baru
    if ($request->hasFile('foto')) {
        if ($user->foto && Storage::disk('public')->exists('foto/' . $user->foto)) {
            Storage::disk('public')->delete('foto/' . $user->foto);
        }

        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('foto', $filename, 'public');
        $user->foto = $filename;
    }

    // Jika password diisi, update password baru
    if (!empty($validated['password'])) {
        $user->password = Hash::make($validated['password']);
    }

    // Simpan perubahan
    $user->save();

    return redirect()->route('user/profile')->with('success', 'Profil berhasil diperbarui.');
}


    public function homepage_user() {
    $user = Auth::user();
    return view('user/homepage_user', compact('user'));
}



    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('landing_page')->with('success', 'Anda telah berhasil logout.');
    }

    
    public function deleteFoto(Request $request)
{
    $user = Auth::user();

    if (!$user || !$user instanceof \App\Models\M_Data_Akun) {
        return redirect()->route('login')->with('error', 'Anda harus login sebagai user.');
    }

    if ($user->foto && Storage::exists('public/foto/' . $user->foto)) {
        Storage::delete('public/foto/' . $user->foto);
    }

    $user->foto = null;
    $user->save();

    return redirect()->route('user/profile.edit')->with('success', 'Foto profil berhasil dihapus.');
}

}
