<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Kuis;

class QuizAnswer extends Model
{
    use HasFactory;

    protected $table = 'quiz_answers';

    protected $fillable = [
        'quiz_attempt_id',
        'question_id',
        'user_answer',
        'is_correct',
    ];

    public function quizAttempt()
    {
        return $this->belongsTo(QuizAttempt::class);
    }

    public function question()
    {
        return $this->belongsTo(Kuis::class, 'question_id'); 
    }
}
