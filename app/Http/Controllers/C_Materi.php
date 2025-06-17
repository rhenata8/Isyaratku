<?php

namespace App\Http\Controllers;

use App\Models\Admin\Materi_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class C_Materi extends Controller
{
    public function index(Request $request)
{
    $query = Materi_admin::query();

    if ($request->has('search') && $request->search != '') {
        $query->where('judul', 'like', '%' . $request->search . '%')
        ->orWhere('isi', 'like', '%' . $request->search . '%');
    }

    $materials = $query->paginate(10);
    $user = Auth::user();

    return view('admin.materi.index', compact('materials', 'user'));
}


public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'content' => 'required|string',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('materials', 'public');
    }

    Materi_admin::create([
        'judul' => $request->title,
        'gambar' => $imagePath,
        'isi' => $request->content,
    ]);

    return redirect()->route('materi.index')->with('success', 'Materi berhasil ditambahkan!');
}

public function show(Materi_admin $material)
{
    $user = Auth::user();
    return view('admin.materi.show', compact('material', 'user'));
}

public function edit(Materi_admin $material)
{
    return view('admin.materi.edit', compact('material'));
}

public function update(Request $request, Materi_admin $material)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'content' => 'required|string',
    ]);

    if ($request->hasFile('image')) {
        if ($material->gambar) {
            Storage::disk('public')->delete($material->gambar);
        }
        $imagePath = $request->file('image')->store('materials', 'public');
        $material->gambar = $imagePath;
    }

    $material->judul = $request->title;
    $material->isi = $request->content;
    $material->save();

    return redirect()->route('materi.index')->with('success', 'Materi berhasil diperbarui!');
}

public function destroy(Materi_admin $material)
{
    if ($material->gambar) {
        Storage::disk('public')->delete($material->gambar);
    }
    $material->delete();

    return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus!');
}
    public function create()
    {
        return view('admin.materi.create');
    }


}
