@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Hasil Kuis Level {{ ucfirst($level) }}</h2>

        <div class="bg-white p-8 rounded-lg shadow-xl max-w-4xl mx-auto border-t-4 border-blue-500">
            <div class="text-center mb-10">
                <p class="text-xl text-gray-700">Skor Anda:</p>
                <p class="font-bold text-blue-600 text-6xl my-4">{{ $score }} / {{ $attempt->total_questions ?? count($quizDetails) }}</p>
                <p class="text-lg text-gray-600">Anda berhasil menjawab <span class="font-bold text-blue-600">{{ $score }}</span> pertanyaan dengan benar dari total <span class="font-bold">{{ $attempt->total_questions ?? count($quizDetails) }}</span> pertanyaan.</p>
            </div>

            <h3 class="text-2xl font-semibold mb-6 text-gray-800 border-b pb-3">Rincian Jawaban:</h3>
            <div class="space-y-8">
                @foreach ($quizDetails as $qIndex => $detail)
                    <div class="p-4 rounded-lg {{ $detail['is_correct'] ? 'bg-green-50 border border-green-200' : 'bg-red-50 border border-red-200' }}">
                        <p class="text-lg font-bold mb-3 text-gray-900">Soal {{ $qIndex + 1 }}: {{ $detail['question'] }}</p>
                        <ul class="list-none ml-0 space-y-2">
                            @foreach ($detail['options'] as $optKey => $optValue)
                                <li class="text-gray-700">
                                    <span class="font-semibold uppercase">{{ $optKey }}.</span> {{ $optValue }}
                                    @if (strtolower($detail['user_answer']) == $optKey)
                                        <span class="ml-2 text-blue-600 font-semibold">(Jawaban Anda)</span>
                                    @endif
                                    @if (strtolower($detail['correct_answer']) == $optKey)
                                        <span class="ml-2 text-green-700 font-semibold">(Jawaban Benar)</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        <p class="mt-4">
                            <span class="font-semibold text-gray-800">Jawaban Anda:</span>
                            <span class="{{ $detail['is_correct'] ? 'text-green-600' : 'text-red-600' }} font-bold uppercase">
                                {{ $detail['user_answer'] ? strtoupper($detail['user_answer']) : 'Tidak Dijawab' }}
                            </span>
                        </p>
                        <p class="font-semibold text-green-700">Jawaban Benar: <span class="uppercase">{{ strtoupper($detail['correct_answer']) }}</span></p>
                        <p class="mt-2 text-sm {{ $detail['is_correct'] ? 'text-green-800' : 'text-red-800' }}">
                            Status: {{ $detail['is_correct'] ? 'Benar' : 'Salah' }}
                        </p>
                    </div>
                @endforeach
            </div>

            <div class="mt-10 text-center space-x-4">
                <a href="{{ route('user.kuis.index') }}" class="bg-blue-600 text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-blue-700 transition duration-300 ease-in-out transform hover:-translate-y-1">
                    Kembali ke Pilihan Kuis
                    <i class="fas fa-arrow-left ml-2"></i>
                </a>
                <a href="{{ route('user.kuis.history') }}" class="bg-gray-600 text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-700 transition duration-300 ease-in-out transform hover:-translate-y-1">
                    Lihat Riwayat Kuis
                    <i class="fas fa-history ml-2"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
