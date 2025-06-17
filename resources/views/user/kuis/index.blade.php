@extends('layouts.app') {{-- Asumsikan Anda punya layout default untuk user --}}

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6 text-center">Pilih Level Kuis</h2>

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($levels as $level)
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-2xl font-semibold capitalize mb-4">{{ $level }}</h3>
                    <p class="text-gray-600 mb-6">Mulai kuis untuk level {{ $level }}.</p>
                    <a href="{{ route('user.kuis.start', $level) }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">Mulai Kuis</a>
                </div>
            @endforeach
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('user.kuis.history') }}" class="text-blue-600 hover:underline">Lihat Riwayat Kuis Saya</a>
        </div>
    </div>
@endsection
