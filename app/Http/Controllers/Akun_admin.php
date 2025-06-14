<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\M_Akun_Admin;
use Illuminate\Support\Facades\Storage;

class akun_admin extends Controller
{
    public function formLogin()
    {
        return view('login'); // pastikan file resources/views/login.blade.php ada
    }

    public function login(Request $request)
{
    $admin = akun_admin::where('email', $request->email)->first();

    if ($admin && Hash::check($request->password, $admin->password)) {
        // Simpan data login ke session
        session(['admin_logged_in' => true, 'admin_id' => $admin->id]);

        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors(['Email atau password salah']);
}


public function showProfile(Request $request)
{
    // Debug session
    // dd(session()->all());
    // Ambil ID admin dari session manual
    $adminId = $request->session()->get('admin_id');
    if (!$adminId) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
    }

    // Ambil data admin dari DB
    $admin = M_Akun_admin::find($adminId);
    if (!$admin) {
        // Jika admin tidak ditemukan, logout dan redirect login
        $request->session()->forget(['admin_logged_in', 'admin_id']);
        return redirect()->route('login')->with('error', 'Admin tidak ditemukan');
    }

    return view('admin.profile', compact('admin'));
}


public function updateProfile(Request $request)
{
    $adminId = $request->session()->get('admin_id');
    if (!$adminId) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
    }

    $admin = M_Akun_admin::find($adminId);
    if (!$admin) {
        $request->session()->forget(['admin_logged_in', 'admin_id']);
        return redirect()->route('login')->with('error', 'Admin tidak ditemukan');
    }

    $validated = $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:data_akun_admin,email,' . $admin->id,
        'password' => 'nullable|string|min:8|confirmed',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $admin->nama_lengkap = $validated['nama_lengkap'];
    $admin->email = $validated['email'];

    if ($request->hasFile('foto')) {
        if ($admin->foto && Storage::exists('public/foto/' . $admin->foto)) {
            Storage::delete('public/foto/' . $admin->foto);
        }

        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('foto', $filename, 'public');
        $admin->foto = $filename;
    }

    if (!empty($validated['password'])) {
        $admin->password = Hash::make($validated['password']);
    }

    $admin->save();

    if ($request->expectsJson()) {
        return response()->json([
            'success' => 'Profil berhasil diperbarui.',
            'foto_url' => $admin->foto ? asset('storage/foto/' . $admin->foto) : null,
        ]);
    }

    return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui.');
}

public function editProfile(Request $request)
{
    $adminId = $request->session()->get('admin_id');
    if (!$adminId) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
    }

    $admin = M_Akun_admin::find($adminId);
    if (!$admin) {
        $request->session()->forget(['admin_logged_in', 'admin_id']);
        return redirect()->route('login')->with('error', 'Admin tidak ditemukan');
    }

    return view('admin.profile_update', compact('admin'));
}

    public function dashboard(Request $request)
{
    $adminId = $request->session()->get('admin_id');
    $admin = M_Akun_admin::find($adminId);

    return view('admin.dashboard', compact('admin'));
}

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_id']);
        return redirect()->route('login');
    }
    public function deleteFoto(Request $request)
    {
        $adminId = $request->session()->get('admin_id');
        if (!$adminId) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }
        $admin = M_Akun_Admin::find($adminId);
        if ($admin && $admin->foto) {
            $fotoPath = 'public/foto/' . $admin->foto;
            if (Storage::exists($fotoPath)) {
                Storage::delete($fotoPath);
            }
            $admin->foto = null;
            $admin->save();
            if ($request->expectsJson()) {
                return response()->json(['success' => 'Foto profil berhasil dihapus.', 'foto_url' => null]);
            }
            return redirect()->route('admin.profile.edit')->with('success', 'Foto profil berhasil dihapus.');
        }
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Tidak ada foto yang bisa dihapus.'], 422);
        }
        return redirect()->route('admin.profile.edit')->with('error', 'Tidak ada foto yang bisa dihapus.');
    }
}
