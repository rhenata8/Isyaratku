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


// public function updateProfile(Request $request)
// {
//     $user = Auth::user();
//     $validated = $request->validate([
//         'nama_lengkap' => 'required|string|max:255',
//         'email' => 'required|string|email|max:255|unique:data_akun_user,email,' . $user->id,
//         'phone' => 'nullable|string|max:20',
//         'password' => 'nullable|string|min:8|confirmed',
//         'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
//     ]);
//     $user->nama_lengkap = $validated['nama_lengkap'];
//     $user->email = $validated['email'];
//     $user->phone = $validated['phone'] ?? $user->phone;
//     if ($request->hasFile('foto')) {
//         if ($user->foto && Storage::exists('public/foto/' . $user->foto)) {
//             Storage::delete('public/foto/' . $user->foto);
//         }
//         $file = $request->file('foto');
//         $filename = time() . '.' . $file->getClientOriginalExtension();
//         $file->storeAs('foto', $filename, 'public');
//         $user->foto = $filename;
//     }
//     if (!empty($validated['password'])) {
//         $user->password = Hash::make($validated['password']);
//     }
//     if ($request->expectsJson()) {
//         if ($user->save()) {
//             return response()->json([
//                 'success' => 'Profil berhasil diperbarui.',
//                 'foto_url' => $user->foto ? asset('storage/foto/' . $user->foto) : null,
//             ]);
//         } else {
//             return response()->json(['error' => 'Gagal menyimpan perubahan.'], 500);
//         }
//     }
//     if ($user->save()) {
//         return redirect()->route('user/profile')->with('success', 'Profil berhasil diperbarui.');
//     } else {
//         return back()->with('error', 'Gagal menyimpan perubahan.');
//     }
// }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // --- TAMBAHKAN PENGECEKAN INI ---
        if (!$user) {
            dd('DEBUG: User is NULL at start of updateProfile. Redirecting to login.');
            return redirect()->route('login')->with('error', 'Anda harus login untuk memperbarui profil.');
        }
        // -----------------------------

        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:data_akun_user,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $user->nama_lengkap = $validated['nama_lengkap'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'] ?? $user->phone;

        if ($request->hasFile('foto')) {
            if ($user->foto && Storage::exists('public/foto/' . $user->foto)) {
                Storage::delete('public/foto/' . $user->foto);
            }
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('foto', $filename, 'public');
            $user->foto = $filename;
        }

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
         dd('DEBUG: User is NULL at start of updateProfile. Redirecting to login.');
        if ($request->expectsJson()) {
            if ($user->save()) {
                return response()->json([
                    'success' => 'Profil berhasil diperbarui.',
                    'foto_url' => $user->foto ? asset('storage/foto/' . $user->foto) : null,
                ]);
            } else {
                return response()->json(['error' => 'Gagal menyimpan perubahan.'], 500);
            }
        }

        if ($user->save()) {
            return redirect()->route('user/profile')->with('success', 'Profil berhasil diperbarui.');
        } else {
            return back()->with('error', 'Gagal menyimpan perubahan.');
        }
    }

    public function homepage_user() {
    $user = Auth::user();
    return view('user/homepage_user', compact('user'));
}



    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('landing_page')->with('success', 'Anda telah berhasil logout.');
    }

    // public function deleteFoto(Request $request)
    // {
    //     $user = Auth::user();
    //     $fotoPath = 'public/foto/' . $user->foto;
    //     if ($user->foto) {
    //         if (Storage::exists($fotoPath)) {
    //             Storage::delete($fotoPath);
    //         }

    //         if ($request->expectsJson()) {
    //         return response()->json([
    //          'success' => 'Profil berhasil diperbarui.',
    //         'foto_url' => $user->foto ? asset('storage/foto/' . $user->foto) : null,
    //         ]);
    //     }
    //         $user->foto = null;
    //         $user->save();
    //         if ($request->expectsJson()) {
    //             return response()->json(['success' => 'Foto profil berhasil dihapus.']);
    //         }
    //         return redirect()->route('user/profile.edit')->with('success', 'Foto profil berhasil dihapus.');
    //     }
    //     if ($request->expectsJson()) {
    //         return response()->json(['error' => 'Tidak ada foto yang bisa dihapus.'], 422);
    //     }
    //     return redirect()->route('user/profile.edit')->with('error', 'Tidak ada foto yang bisa dihapus.');
    // }
    public function deleteFoto(Request $request)
    {
        $user = Auth::user();

        // --- TAMBAHKAN PENGECEKAN INI ---

        dd('DEBUG: User is NULL at start of deleteFoto. Redirecting to login.'); // Tambahkan debug ini
        if (!$user) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Anda harus login untuk menghapus foto profil.'], 401);
            }
            return redirect()->route('login')->with('error', 'Anda harus login untuk menghapus foto profil.');
        }
        // -----------------------------

        $fotoPath = 'public/foto/' . $user->foto;

        if ($user->foto) {
            if (Storage::exists($fotoPath)) {
                Storage::delete($fotoPath);
            }

            $user->foto = null; // Set foto menjadi null setelah dihapus

            dd('DEBUG: User object before deleteFoto save:', $user);
            $user->save(); // Simpan perubahan ke database

            if ($request->expectsJson()) {
                return response()->json(['success' => 'Foto profil berhasil dihapus.', 'foto_url' => null]);
            }
            return redirect()->route('user/profile.edit')->with('success', 'Foto profil berhasil dihapus.');
        }

        // Jika tidak ada foto untuk dihapus
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Tidak ada foto yang bisa dihapus.'], 422);
        }
        return redirect()->route('user/profile.edit')->with('error', 'Tidak ada foto yang bisa dihapus.');
    }
}
