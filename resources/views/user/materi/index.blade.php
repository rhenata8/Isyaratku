@extends('layouts.app') {{-- Asumsikan Anda punya layout default untuk user --}}

@php
use Illuminate\Support\Str;
@endphp
@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Daftar Materi Pembelajaran</h2>

        {{-- Form Pencarian (Opsional untuk user) --}}
        <div class="mb-6 max-w-xl mx-auto">
            <form action="{{ route('user.materi.index') }}" method="GET" class="flex items-center bg-white rounded-full shadow-md overflow-hidden">
                <input type="text" name="search" placeholder="Cari materi..."
                       class="flex-1 px-5 py-3 border-none focus:ring-0 rounded-l-full" value="{{ request('search') }}">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-r-full hover:bg-blue-700 transition duration-300">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        @if ($materis->isEmpty())
            <div class="text-center text-gray-600 text-xl py-10">
                Tidak ada materi yang tersedia saat ini.
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($materis as $materi)
                    <div class="bg-white rounded-lg shadow-xl overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                        @if ($materi->gambar)
                            <img src="{{ asset('storage/' . $materi->gambar) }}" alt="{{ $materi->judul }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-lg">
                                <i class="fas fa-book-open text-4xl"></i>
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-3 text-gray-800 line-clamp-2">{{ $materi->judul }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">

                                {{ Str::limit(strip_tags($materi->isi), 120, '...') }}
                            </p>
                            <a href="{{ route('user.materi.show', $materi->id) }}" class="inline-block bg-blue-600 text-white px-5 py-2 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                                Baca Materi <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $materis->links() }} {{-- Tampilkan link paginasi --}}
            </div>
        @endif
    </div>
@endsection
