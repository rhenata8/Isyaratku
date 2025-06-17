<?php

namespace App\Http\Controllers;

use App\Models\M_Akun_Admin;
use App\Models\M_Data_Akun;
use App\Models\Quizattempt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_Dashboard extends Controller
{
    public function index()
    {
        $jumlahUser = M_Data_Akun::count();
        $jumlahPenggunaKuis = Quizattempt::distinct('user_id')->count();
        $admin = M_Akun_Admin::find(session('admin_id'));

        // --- Data untuk Grafik (7 hari terakhir) ---
        $labels = [];
        $registeredUsersData = [];
        $quizUsersData = [];

        for ($i = 6; $i >= 0; $i--) { // Dari 6 hari lalu sampai hari ini
            $date = Carbon::now()->subDays($i);
            $formattedDate = $date->format('Y-m-d');
            $displayDate = $date->format('D, d M'); // Untuk label di grafik (misal: Mon, 17 Jun)

            $labels[] = $displayDate;

            // Jumlah Pengguna Terdaftar pada hari tersebut
            $registeredCount = M_Data_Akun::whereDate('created_at', $formattedDate)->count();
            $registeredUsersData[] = $registeredCount;

            // Jumlah Pengguna Unik yang Mengikuti Kuis pada hari tersebut
            $quizCount = Quizattempt::whereDate('completed_at', $formattedDate)
                                    ->distinct('user_id')
                                    ->count();
            $quizUsersData[] = $quizCount;
        }
        // --- Akhir Data untuk Grafik ---

        return view('admin/dashboard', compact(
            'jumlahUser',
            'jumlahPenggunaKuis',
            'admin',
            'labels',               // Untuk label tanggal di grafik
            'registeredUsersData',  // Data pengguna terdaftar per hari
            'quizUsersData'         // Data pengguna ikut kuis per hari
        ));
    }
}

