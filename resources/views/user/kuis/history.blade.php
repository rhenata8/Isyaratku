@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Riwayat Kuis Anda</h2>

        <div class="bg-white p-8 rounded-lg shadow-xl max-w-4xl mx-auto border-t-4 border-blue-500">
            @if ($quizAttempts->isEmpty()) {{-- UBAH INI: $attempts menjadi $quizAttempts --}}
                <p class="text-center text-gray-600 text-lg">Anda belum pernah mencoba kuis apapun.</p>
                <div class="mt-6 text-center">
                    <a href="{{ route('user.kuis.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">Mulai Kuis Sekarang!</a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full leading-normal table-auto">
                        <thead>
                            <tr class="bg-gray-100 border-b-2 border-gray-200">
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider rounded-tl-lg">
                                    Level Kuis
                                </th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Skor Anda
                                </th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Total Soal
                                </th>
                                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider rounded-tr-lg">
                                    Tanggal Selesai
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quizAttempts as $attempt) {{-- UBAH INI: $attempts menjadi $quizAttempts --}}
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="px-5 py-5 text-sm text-gray-900 capitalize">
                                        {{ $attempt->level }}
                                    </td>
                                    <td class="px-5 py-5 text-sm text-gray-900 font-bold">
                                        {{ $attempt->score }} / {{ $attempt->total_questions }}
                                    </td>
                                    <td class="px-5 py-5 text-sm text-gray-900">
                                        {{ $attempt->total_questions }}
                                    </td>
                                    <td class="px-5 py-5 text-sm text-gray-900">
                                    @if ($attempt->completed_at)
                                        {{ $attempt->completed_at->format('d M Y, H:i') }}
                                    @else
                                        Belum Selesai / N/A
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                

                <div class="mt-8 text-center">
                    <a href="{{ route('user.kuis.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">Mulai Kuis Baru</a>
                </div>
            @endif
        </div>
    </div>
@endsection
