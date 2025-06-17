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

        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('isi', 'like', '%' . $request->search . '%');
        }

        // Ambil semua materi, bisa juga ditambahkan paginasi jika materi banyak
        $materis = $query->orderBy('created_at', 'desc')->paginate(9);
        $user = Auth::user();

        return view('user.materi.index', compact('materis', 'user'));
    }

    public function show(Materi_admin $materi)
    {
        $user = Auth::user(); 
        return view('user.materi.show', compact('materi', 'user'));
    }
}
