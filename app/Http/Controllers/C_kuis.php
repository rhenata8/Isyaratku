<?php

namespace App\Http\Controllers;

use App\Models\Admin\Kuis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import Validator

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
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'level' => 'required|in:pemula,menengah,mahir',
            'pertanyaan' => 'required|string|max:255',
            'opsi_a' => 'required|string|max:255',
            'opsi_b' => 'required|string|max:255',
            'opsi_c' => 'required|string|max:255',
            'opsi_d' => 'required|string|max:255',
            'jawaban' => 'required|in:a,b,c,d',
        ]);

        if ($validator->fails()) {
            // If it's an AJAX request, return JSON with errors
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422); // Unprocessable Entity
            }
            // Otherwise, redirect back with errors (for non-AJAX)
            return back()->withErrors($validator)->withInput();
        }

        $question = Kuis::create($request->all());

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Soal berhasil ditambahkan!',
                'question' => $question // Return the newly created question
            ]);
        }

        return back()->with('success', 'Soal berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $soal = Kuis::findOrFail($id);
        $soal->update($request->all());

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Soal berhasil diperbarui!',
                'question' => $soal
            ]);
        }

        return back()->with('success', 'Soal berhasil diperbarui!');
    }

    public function delete($id)
    {
        $soal = Kuis::findOrFail($id);
        $soal->delete();

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Soal berhasil dihapus!'
            ]);
        }

        return back()->with('success', 'Soal berhasil dihapus!');
    }
}
