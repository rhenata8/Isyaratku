<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quizattempt extends Model
{
    use HasFactory;

    protected $table = 'quiz_attempts'; 

    protected $fillable = [
        'user_id',
        'level',
        'score',
        'total_questions',
        'completed_at',
    ];

    protected $casts = [
    'completed_at' => 'datetime',
];



    public function user()
{
    return $this->belongsTo(\App\Models\M_Data_Akun::class, 'user_id');
}


    public function answers()
    {
        return $this->hasMany(QuizAnswer::class);
    }
}
