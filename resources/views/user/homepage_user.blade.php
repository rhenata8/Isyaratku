@extends('layouts.app')

@section('content')



    {{-- Hero & Content Section --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-20">
        {{-- Hero Section --}}
        <section class="bg-[#F0F7F0] rounded-lg p-6 sm:p-10 flex flex-col sm:flex-row items-center gap-8">
            <div class="sm:w-1/2">
                <h1 class="font-semibold text-2xl sm:text-3xl leading-tight mb-4">Kuasai Bahasa Isyarat, Buka Pintu Komunikasi Baru!</h1>
                <p class="text-[#4B4B4B] mb-6 text-sm sm:text-base leading-relaxed">
                    Gabung dengan komunitas kami dan kuasai bahasa isyarat melalui kursus interaktif, mulailah perjalanan untuk kemudahan tanpa batas.
                </p>
                <button class="bg-[#FFB800] text-[#1A1A1A] font-semibold px-6 py-2 rounded shadow hover:brightness-110 transition">Mulai Belajar Sekarang!</button>
            </div>
  </section>
  {{-- Platform Section --}}
        <section class="mt-16">
            <h2 class="font-semibold text-xl sm:text-2xl mb-4">
                Platform serba-in-one<br/>
                <span class="font-bold text-[#1B3B2D] underline decoration-[#1B3B2D] decoration-4">yang memudahkan belajar bahasa isyarat.</span>
            </h2>
            <div class="flex flex-col sm:flex-row items-center gap-6">
                <ul class="sm:w-1/2 list-decimal list-inside text-[#4B4B4B] text-sm sm:text-base space-y-3">
                    <li>Metode belajar dengan ilustrasi dan video interaktif untuk memudahkan pemahaman.</li>
                    <li>Belajar kapan saja dan di mana saja tanpa batasan biaya.</li>
                    <li>Praktik langsung dan tugas mandiri untuk mengasah kemampuan.</li>
                </ul>
                <div class="sm:w-1/2 flex justify-center">
                    <img src="https://storage.googleapis.com/a1aa/image/2e6c1662-e1f2-4233-cfc3-4fe1f5abf461.jpg" alt="People learning sign language" class="rounded-lg shadow-lg" width="320" height="240" />
                </div>
            </div>
        </section>
    </main>



@endsection
