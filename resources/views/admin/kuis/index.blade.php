@extends('layouts.admin')

@section('content')
    <div class="w-full p-6">
    <h2 class="text-2xl font-bold mb-4">Pilih Level Kuis</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach (['pemula', 'menengah', 'mahir'] as $level)
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-semibold capitalize">{{ $level }}</h3>
                <a href="{{ route('admin.kursus.level', $level) }}" class="mt-2 inline-block bg-green-700 text-white px-4 py-2 rounded">Kelola</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
