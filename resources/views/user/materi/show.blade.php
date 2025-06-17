@extends('layouts.app') 

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white rounded-lg shadow-xl overflow-hidden max-w-4xl mx-auto border-t-4 border-blue-500">
            <a href="{{ route('user.materi.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-6 px-4 py-2 rounded-md bg-gray-50 hover:bg-gray-100 transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Materi
            </a>

            @if ($materi->gambar)
                <img src="{{ asset('storage/' . $materi->gambar) }}" alt="{{ $materi->judul }}" class="w-full h-80 object-cover mb-6">
            @else
                <div class="w-full h-80 bg-gray-200 flex items-center justify-center text-gray-500 text-4xl mb-6">
                    <i class="fas fa-book-open"></i>
                </div>
            @endif

            <div class="p-8">
                <h1 class="text-4xl font-bold mb-5 text-gray-800">{{ $materi->judul }}</h1>
                <div class="prose max-w-none text-gray-700 leading-relaxed text-lg">

                    {!! nl2br(e($materi->isi)) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
