<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\M_Akun_Admin;
use App\Models\Quizattempt;

class akun_admin extends Controller
{
    public function formLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $admin = M_Akun_Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_logged_in' => true, 'admin_id' => $admin->id]);
            return redirect()->route('admin/dashboard');
        }

        return back()->withErrors(['Email atau password salah']);
    }

    public function showProfile(Request $request)
    {
        $adminId = $request->session()->get('admin_id');
        if (!$adminId) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $admin = M_Akun_Admin::find($adminId);
        if (!$admin) {
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

        $admin = M_Akun_Admin::find($adminId);
        if (!$admin) {
            $request->session()->forget(['admin_logged_in', 'admin_id']);
            return redirect()->route('login')->with('error', 'Admin tidak ditemukan');
        }

        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $admin->nama_lengkap = $validated['nama_lengkap'];

        $admin->phone = $validated['phone'];

        if ($request->hasFile('foto')) {
            if ($admin->foto && Storage::disk('public')->exists('foto/' . $admin->foto)) {
                Storage::disk('public')->delete('foto/' . $admin->foto);
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


        return redirect()->route('admin/profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function editProfile(Request $request)
    {
        $adminId = $request->session()->get('admin_id');
        if (!$adminId) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $admin = M_Akun_Admin::find($adminId);
        if (!$admin) {
            $request->session()->forget(['admin_logged_in', 'admin_id']);
            return redirect()->route('login')->with('error', 'Admin tidak ditemukan');
        }

        return view('admin.profile_update', compact('admin'));
    }

    public function deleteFoto(Request $request)
    {
        $adminId = $request->session()->get('admin_id');
        if (!$adminId) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $admin = M_Akun_Admin::find($adminId);
        if ($admin && $admin->foto) {
            $fotoPath = 'foto/' . $admin->foto;
            if (Storage::disk('public')->exists($fotoPath)) {
                Storage::disk('public')->delete($fotoPath);
            }
            $admin->foto = null;
            $admin->save();

            return redirect()->route('admin/profile.edit')->with('success', 'Foto profil berhasil dihapus.');
        }

        return redirect()->route('admin/profile.update')->with('error', 'Tidak ada foto yang bisa dihapus.');
    }





    public function dashboard(Request $request)
    {
        $adminId = $request->session()->get('admin_id');
        $admin = M_Akun_Admin::find($adminId);

        return view('admin/dashboard', compact('admin'));
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_id']);
        return redirect()->route('login');
    }

    public function quizReportIndex(Request $request)
    {
        // Mengambil semua riwayat kuis, dengan paginasi
        // Eager load relasi 'user' untuk mendapatkan data nama pengguna
        $attempts = Quizattempt::with('user') // Memuat relasi user dari Quizattempt
                                ->orderBy('completed_at', 'desc') // Urutkan berdasarkan waktu selesai
                                ->paginate(10); // 10 riwayat per halaman

        return view('admin.laporan.index', compact('attempts'));
    }


}
