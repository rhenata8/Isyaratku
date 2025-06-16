@extends('layouts.admin')

@section('content')
    <div class="flex">

    <div class="w-full p-6">
        <h2 class="text-xl font-bold mb-4 capitalize">Kuis Level {{ $level }}</h2>

        {{-- Form Tambah --}}
        <form action="{{ route('admin.kursus.store') }}" method="POST" class="bg-white p-4 rounded shadow mb-4">
            @csrf
            <input type="hidden" name="level" value="{{ $level }}">
            <input type="text" name="pertanyaan" placeholder="Pertanyaan" class="w-full mb-2 p-2 border" required>
            <input type="text" name="opsi_a" placeholder="Opsi A" class="w-full mb-2 p-2 border" required>
            <input type="text" name="opsi_b" placeholder="Opsi B" class="w-full mb-2 p-2 border" required>
            <input type="text" name="opsi_c" placeholder="Opsi C" class="w-full mb-2 p-2 border" required>
            <input type="text" name="opsi_d" placeholder="Opsi D" class="w-full mb-2 p-2 border" required>
            <select name="jawaban" class="w-full mb-2 p-2 border">
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
            </select>
            <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded">Tambah Soal</button>
        </form>

        {{-- List Soal --}}
        <div class="bg-white shadow rounded p-4">
            <h3 class="font-semibold mb-2">Daftar Soal</h3>
            <table class="w-full text-left">
                <thead>
                    <tr>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $soal)
                        <tr class="border-t">
                            <td>{{ $soal->pertanyaan }}</td>
                            <td>{{ strtoupper($soal->jawaban) }}</td>
                            <td class="space-x-2">
                                {{-- Bisa ganti jadi modal edit --}}
                                <form action="{{ route('admin.kursus.delete', $soal->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Hapus?')" class="text-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </div>
        </table>
    </div>
</div>
</div>
    <div class="mb-4">
    <a href="{{ route('admin.kursus.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
        Kembali
    </a>
@endsection
