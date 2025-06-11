@extends('layouts.app')

@section('title', 'Beranda')

@section('navbar')
    {{-- Navbar khusus Landing Page --}}
    <nav class="bg-[#2F4F4F] flex items-center justify-between px-4 sm:px-6 md:px-10 py-3 mb-4">
        <div class="flex items-center space-x-4">
            <a class="text-white font-extrabold text-lg select-none" href="#">
                IsyaratKu
            </a>
        </div>

        <div class="flex items-center space-x-4">
            <a href="{{ route('login') }}" class="hidden md:block text-[#D9D9D9] border border-[#D9D9D9] rounded px-6 py-2 text-sm hover:bg-[#D9D9D9] hover:text-[#2F4F4F] transition">
                Login
            </a>
            <a href="{{ route('register') }}" class="bg-yellow-400 text-[#2F4F4F] font-semibold rounded px-6 py-2 text-sm hover:bg-yellow-300 transition">
                Register
            </a>
        </div>
    </nav>
@endsection

@section('content')
    {{-- Hero Section --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 md:px-10 mt-4 flex flex-col md:flex-row items-center md:items-start gap-8">
        <div class="flex-1 max-w-xl">
            <h1 class="font-extrabold text-3xl sm:text-4xl leading-tight mb-4">
                Kuasai Bahasa Isyarat, Buka Pintu Komunikasi Baru!
            </h1>
            <p class="text-[#4B4B4B] text-sm sm:text-base mb-6 leading-relaxed max-w-md">
                Gabung dengan komunitas kami dan kuasai bahasa isyarat melalui kursus interaktif, mudah perjalanan untuk berkomunikasi tanpa batas.
            </p>
            <button class="bg-yellow-400 text-[#2F4F4F] font-semibold rounded px-5 py-2 text-sm hover:bg-yellow-300 transition">
               <a href="{{ route('login') }}">Mulai Belajar Sekarang</a>
            </button>
        </div>
        <div class="flex-1 max-w-sm rounded-lg overflow-hidden shadow-lg">
            <img src="https://storage.googleapis.com/a1aa/image/3032ece4-ef37-474d-2579-95acbbde2256.jpg" alt="Sign Language" class="w-full h-full object-cover">
        </div>
    </section>

    {{-- Kelebihan Kursus --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 md:px-10 mt-16">
        <h2 class="text-center font-semibold text-lg mb-8">
            Kelebihan Kursus IsyaratKU
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
            <div class="flex flex-col items-start bg-yellow-400 rounded-lg p-4 space-y-3 shadow-md">
                <i class="fas fa-laptop-code text-xl text-[#2F4F4F]"></i>
                <h3 class="font-semibold text-[#2F4F4F]">Materi Interaktif</h3>
                <p class="text-sm text-[#2F4F4F]">
                    Belajar materi interaktif dengan latihan simulasi yang memudahkan anda secara virtual.
                </p>
            </div>
            <div class="flex flex-col items-start bg-[#A9C4A6] rounded-lg p-4 space-y-3 shadow-md">
                <i class="fas fa-clock text-xl text-[#2F4F4F]"></i>
                <h3 class="font-semibold text-[#2F4F4F]">Akses Kapan Saja</h3>
                <p class="text-sm text-[#2F4F4F]">
                    Belajar kapan saja dan dimana saja dengan akses 24/7.
                </p>
            </div>
            <div class="flex flex-col items-start bg-yellow-400 rounded-lg p-4 space-y-3 shadow-md">
                <i class="fas fa-tasks text-xl text-[#2F4F4F]"></i>
                <h3 class="font-semibold text-[#2F4F4F]">Latihan & Tugas</h3>
                <p class="text-sm text-[#2F4F4F]">
                    Tugas mingguan dan praktek langsung untuk mengasah kemampuan anda.
                </p>
            </div>
        </div>
    </section>


@endsection
