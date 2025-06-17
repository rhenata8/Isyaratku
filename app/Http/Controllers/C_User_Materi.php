<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Materi_admin;
use Illuminate\Support\Facades\Auth;

class C_User_Materi extends Controller
{
    public function index(Request $request)
    {
        $query = Materi_admin::query();

        // Fitur pencarian sederhana (opsional, jika Anda ingin ada pencarian di sisi user)
        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('isi', 'like', '%' . $request->search . '%');
        }

        // Ambil semua materi, bisa juga ditambahkan paginasi jika materi banyak
        $materis = $query->orderBy('created_at', 'desc')->paginate(9); // 9 materi per halaman

        return view('user.materi.index', compact('materis'));
    }

    /**
     * Menampilkan detail lengkap dari sebuah materi.
     */
    public function show(Materi_admin $materi) // Menggunakan Route Model Binding
    {
        return view('user.materi.show', compact('materi'));
    }
}
