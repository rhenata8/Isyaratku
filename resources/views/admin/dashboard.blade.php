@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Analytics</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="bg-white shadow p-6 rounded text-center">
            <div class="text-3xl font-bold">{{ $jumlahUser }}</div>
            <div class="text-gray-600 mt-2">Jumlah Pengguna</div>
        </div>
        <div class="bg-white shadow p-6 rounded text-center">
            <div class="text-3xl font-bold">{{ $jumlahRespon }}</div>
            <div class="text-gray-600 mt-2">Jumlah Respon Kuis</div>
        </div>
    </div>

    <div class="bg-white shadow rounded p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold">Responses</h3>
            <span class="text-sm text-gray-500">Last 7 Days</span>
        </div>
        <div class="h-40 bg-yellow-300 rounded"></div>
        {{-- Anda bisa menambahkan grafik di sini menggunakan library JS seperti Chart.js --}}
    </div>
@endsection
