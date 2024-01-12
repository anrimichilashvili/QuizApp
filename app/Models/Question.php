<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'Question',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'correct_answer',
        'Photo',
        'quiz_id',
        'user_id',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'answers' => 'json',
    ];

    public function showQuestion($questionId)
    {
        $question = Question::find($questionId);
    
    
        return view('questions.show', ['question' => $question, ]);
    }
}
