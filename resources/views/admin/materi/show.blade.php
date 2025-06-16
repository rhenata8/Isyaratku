@extends('layouts.admin')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Detail Materi: {{ $material->judul }}</h2>

    <div class="bg-white shadow-md rounded-lg p-6 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Judul:</label>
            <p class="text-gray-900">{{ $material->judul }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Gambar:</label>
            @if ($material->gambar)
                <img src="{{ asset('storage/' . $material->gambar) }}" alt="{{ $material->judul }}" class="w-64 h-auto object-cover rounded-md">
            @else
                <p class="text-gray-500">Tidak ada gambar</p>
            @endif
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Isi Materi:</label>
            <div class="prose max-w-none">
                {!! nl2br(e($material->isi)) !!}
            </div>
        </div>
        <div class="flex items-center">
            <a href="{{ route('materi.edit', $material->id) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                Edit Materi
            </a>
            <form action="{{ route('materi.destroy', $material->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus materi ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Hapus Materi
                </button>
            </form>
            <a href="{{ route('materi.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-auto">
                Kembali
            </a>
        </div>
    </div>
@endsection
