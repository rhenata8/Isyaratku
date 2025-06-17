<?php

namespace App\Http\Controllers;

use App\Models\Admin\Kuis;
use App\Models;


use App\Models\QuizAnswer;
use App\Models\Quizattempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Jika user login pakai sistem Auth Laravel
use Carbon\Carbon;

class C_user_kuis extends Controller
{
    //  public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // Menampilkan pilihan level kuis untuk user
    public function index()
    {
        $levels = ['pemula', 'menengah', 'mahir']; // Sesuaikan dengan level yang Anda miliki
        return view('user.kuis.index', compact('levels'));
    }

    // Memulai kuis untuk level tertentu
    public function startQuiz(Request $request, $level)
    {
        $questions = Kuis::where('level', $level)->inRandomOrder()->get();

        if ($questions->isEmpty()) {
            return redirect()->route('user.kuis.index')->with('error', 'Tidak ada soal untuk level ini.');
        }

        // Simpan semua soal kuis yang akan diberikan dalam sesi
        $request->session()->put('quiz_questions_' . $level, $questions->pluck('id')->toArray());
        $request->session()->put('current_question_index_' . $level, 0);
        $request->session()->put('user_answers_' . $level, []); // Untuk menyimpan jawaban user sementara
        $request->session()->put('quiz_level_' . $level, $level); // Simpan level yang sedang dikerjakan

        // Buat entri QuizAttempt baru (akan diupdate di akhir kuis)
        $attempt = Quizattempt::create([
            'user_id' => Auth::id(),
            'level' => $level,
            'total_questions' => $questions->count(),
            // score dan completed_at akan diisi nanti
        ]);
        $request->session()->put('quiz_attempt_id_' . $level, $attempt->id);

        return redirect()->route('user.kuis.question', ['level' => $level, 'index' => 0]);
    }

    // Menampilkan soal kuis per halaman
    public function showQuestion(Request $request, $level, $index)
    {
        $questionIds = $request->session()->get('quiz_questions_' . $level);
        $currentIndex = $request->session()->get('current_question_index_' . $level, 0);
        $quizAttemptId = $request->session()->get('quiz_attempt_id_' . $level);

        // Validasi index dan sesi
        if (!$questionIds || $index != $currentIndex || !$quizAttemptId) {
            return redirect()->route('user.kuis.index')->with('error', 'Kuis tidak valid atau sudah selesai.');
        }

        if ($index >= count($questionIds)) {
            // Jika index melebihi jumlah soal, kuis selesai
            return redirect()->route('user.kuis.review', $level);
        }

        $question = Kuis::find($questionIds[$index]);

        if (!$question) {
            return redirect()->route('user.kuis.index')->with('error', 'Soal tidak ditemukan.');
        }

        return view('user.kuis.question', compact('question', 'level', 'index'));
    }

    // Memproses jawaban user dan pindah ke soal berikutnya
    public function submitAnswer(Request $request, $level)
    {
        $request->validate([
            'question_id' => 'required|exists:kuis,id',
            'user_answer' => 'required|in:a,b,c,d',
        ]);

        $questionIds = $request->session()->get('quiz_questions_' . $level);
        $currentIndex = $request->session()->get('current_question_index_' . $level);
        $userAnswers = $request->session()->get('user_answers_' . $level, []);
        $quizAttemptId = $request->session()->get('quiz_attempt_id_' . $level);

        // Pastikan soal yang dijawab adalah soal yang sedang ditampilkan
        if (!isset($questionIds[$currentIndex]) || $request->question_id != $questionIds[$currentIndex]) {
            return redirect()->back()->with('error', 'Ada kesalahan dalam proses kuis.');
        }

        $question = Kuis::find($request->question_id);

        if (!$question) {
            return redirect()->back()->with('error', 'Soal tidak valid.');
        }

        // Simpan jawaban user ke sesi
        $userAnswers[$question->id] = $request->user_answer;
        $request->session()->put('user_answers_' . $level, $userAnswers);

        // Pindah ke soal berikutnya
        $nextIndex = $currentIndex + 1;
        $request->session()->put('current_question_index_' . $level, $nextIndex);

        if ($nextIndex < count($questionIds)) {
            return redirect()->route('user.kuis.question', ['level' => $level, 'index' => $nextIndex]);
        } else {
            // Kuis selesai, hitung skor dan simpan
            return redirect()->route('user.kuis.review', $level);
        }
    }

    // Menampilkan halaman review dan skor
    public function reviewQuiz(Request $request, $level)
    {
        $questionIds = $request->session()->get('quiz_questions_' . $level);
        $userAnswers = $request->session()->get('user_answers_' . $level, []);
        $quizAttemptId = $request->session()->get('quiz_attempt_id_' . $level);

        if (!$questionIds || !$quizAttemptId) {
            return redirect()->route('user.kuis.index')->with('error', 'Kuis tidak ditemukan.');
        }

        $score = 0;
        $quizDetails = []; // Untuk review di view

        foreach ($questionIds as $questionId) {
            $question = Kuis::find($questionId);
            $userAnswer = $userAnswers[$questionId] ?? null; // Jawaban user, bisa null jika tidak dijawab

            if ($question) {
                $isCorrect = (strtolower($userAnswer) == strtolower($question->jawaban));
                if ($isCorrect) {
                    $score++;
                }

                $quizDetails[] = [
                    'question' => $question->pertanyaan,
                    'options' => [
                        'a' => $question->opsi_a,
                        'b' => $question->opsi_b,
                        'c' => $question->opsi_c,
                        'd' => $question->opsi_d,
                    ],
                    'user_answer' => $userAnswer,
                    'correct_answer' => $question->jawaban,
                    'is_correct' => $isCorrect,
                ];

                // Simpan jawaban ke tabel quiz_answers
                QuizAnswer::create([
                    'quiz_attempt_id' => $quizAttemptId,
                    'question_id' => $questionId,
                    'user_answer' => $userAnswer,
                    'is_correct' => $isCorrect,
                ]);
            }
        }

        // Update QuizAttempt dengan skor dan waktu selesai
        $attempt = Quizattempt::find($quizAttemptId);
        if ($attempt) {
            $attempt->score = $score;
            $attempt->completed_at = Carbon::now();
            $attempt->save();
        }

        // Hapus data kuis dari sesi
        $request->session()->forget([
            'quiz_questions_' . $level,
            'current_question_index_' . $level,
            'user_answers_' . $level,
            'quiz_level_' . $level,
            'quiz_attempt_id_' . $level,
        ]);

        return view('user.kuis.review', compact('level', 'score', 'quizDetails', 'attempt'));
    }

    // Menampilkan riwayat kuis user
    public function history()
    {
        $user = Auth::user();
        $attempts = QuizAttempt::where('user_id', Auth::id())
                ->orderBy('completed_at', 'desc')
                ->paginate(10);
        return view('user.kuis.history', compact('attempts'));
    }
}
