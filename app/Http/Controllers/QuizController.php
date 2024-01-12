<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all(); 

        return view('quizzes.index', compact('quizzes'));
    }

    public function show(Quiz $quiz)
    {
        return view('quizzes.show', compact('quiz'));
    }

    public function edit($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
    
        $questions = $quiz->questions;
    
        return view('quizzes.edit', compact('quiz', 'questions'));
    }

    

    public function destroy(Quiz $quiz)
    {
        if (auth()->user()->id === 1 || auth()->user()->isAdmin() || auth()->user()->id === $quiz->user_id) {
            $quiz->delete();
            return redirect()->route('home')->with('success', 'Quiz deleted successfully.');
        } else {
            return redirect()->route('home')->with('error', 'Unauthorized to delete this quiz.');
        }
    }

    public function create()
    {
        return view('quizzes.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Name' => 'required|string',
            'Photo' => 'required|string',
            'Description' => 'required|string',
        ]);

        $quiz = Quiz::create([
            'Name' => $validatedData['Name'],
            'Photo' => $validatedData['Photo'],
            'Description' => $validatedData['Description'],
            'user_id' => auth()->id(), 
        ]);

        return redirect()->route('home');
    }


    public function submit(Request $request, Quiz $quiz)
{
    $submittedAnswers = $request->input('answers');

    $score = $this->calculateScore($quiz, $submittedAnswers);

    Session::put('quiz_score', $score);
    Session::put('quiz_id', $quiz->id);

    return view('quizzes.score', compact('score', 'quiz'));
}

private function calculateScore(Quiz $quiz, $submittedAnswers)
{
    $questions = $quiz->questions;
    $totalQuestions = $questions->count();

    $correctAnswers = 0;

    foreach ($questions as $question) {
        $questionId = $question->id;

        if ($submittedAnswers[$questionId] === $question->correct_answer) {
            $correctAnswers++;
        }
    }

    $score = $correctAnswers;

    return $score;
}

}
