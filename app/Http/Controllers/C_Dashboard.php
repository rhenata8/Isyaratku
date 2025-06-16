<?php

namespace App\Http\Controllers;

use App\Models\M_Akun_Admin;
use App\Models\M_Data_Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_Dashboard extends Controller
{
    public function index()
    {
        $jumlahUser = M_Data_Akun::count();
        $jumlahRespon = DB::table('respon_kuis')->count(); // Ganti sesuai nama tabel

        $admin = M_Akun_Admin::find(session('admin_id'));

        return view('admin/dashboard', compact('jumlahUser', 'jumlahRespon', 'admin'));
    }
}

