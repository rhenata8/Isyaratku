<?php

namespace App\Http\Controllers;

use App\Models\Admin\Kuis;
use Illuminate\Http\Request;

class C_kuis extends Controller
{
    public function index()
    {
        return view('admin.kuis.index');
    }

    public function showLevel($level)
    {
        $data = Kuis::where('level', $level)->get();
        return view("admin.kuis.level_$level", compact('data', 'level'));
    }

    public function create(Request $request)
    {
        Kuis::create($request->all());
        return back()->with('success', 'Soal berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $soal = Kuis::findOrFail($id);
        $soal->update($request->all());
        return back()->with('success', 'Soal berhasil diperbarui!');
    }

    public function delete($id)
    {
        Kuis::findOrFail($id)->delete();
        return back()->with('success', 'Soal berhasil dihapus!');
    }
}
