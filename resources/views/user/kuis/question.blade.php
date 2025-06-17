@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6 text-center capitalize">Kuis Level {{ $level }} - Soal ke {{ $index + 1 }}</h2>

        <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl mx-auto">
            <form action="{{ route('user.kuis.submit', $level) }}" method="POST">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question->id }}">

                <div class="mb-8">
                    <p class="text-lg font-semibold mb-4">{{ $question->pertanyaan }}</p>
                    <div class="space-y-4">
                        <label class="block cursor-pointer bg-gray-50 hover:bg-blue-100 p-4 rounded-lg border border-gray-200">
                            <input type="radio" name="user_answer" value="a" class="mr-2" required>
                            A. {{ $question->opsi_a }}
                        </label>
                        <label class="block cursor-pointer bg-gray-50 hover:bg-blue-100 p-4 rounded-lg border border-gray-200">
                            <input type="radio" name="user_answer" value="b" class="mr-2">
                            B. {{ $question->opsi_b }}
                        </label>
                        <label class="block cursor-pointer bg-gray-50 hover:bg-blue-100 p-4 rounded-lg border border-gray-200">
                            <input type="radio" name="user_answer" value="c" class="mr-2">
                            C. {{ $question->opsi_c }}
                        </label>
                        <label class="block cursor-pointer bg-gray-50 hover:bg-blue-100 p-4 rounded-lg border border-gray-200">
                            <input type="radio" name="user_answer" value="d" class="mr-2">
                            D. {{ $question->opsi_d }}
                        </label>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                        {{ $index + 1 < count(session('quiz_questions_' . $level)) ? 'Selanjutnya' : 'Selesai' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
