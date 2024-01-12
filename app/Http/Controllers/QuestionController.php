<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Quiz;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($quizId)
{
    $quiz = Quiz::findOrFail($quizId);

    return view('questions.create', compact('quiz'));
}


public function store(Request $request, $quizId)
{
    $validatedData = $request->validate([
        'question' => 'required|string',
        'answers' => 'required|array|size:4',
        'answers.*' => 'required|string',
        'correctAnswer' => 'required|string',
        'photo' => 'nullable|image|max:2048',
        'quiz_id' => 'required|exists:quizzes,id',
        'user_id' => 'required|exists:users,id',
    ]);


    $question = Question::create([
        'Question' => $validatedData['question'],
        'answer1' => $validatedData['answers'][0],
        'answer2' => $validatedData['answers'][1],
        'answer3' => $validatedData['answers'][2],
        'answer4' => $validatedData['answers'][3],
        'correct_answer' => $validatedData['correctAnswer'],
        'quiz_id' => $quizId,
        'user_id' => auth()->id(),
        'photo' => $validatedData['Photo'],
    ]);

    return redirect()->route('home')->with('success', 'Question added successfully.');
}





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $quizId)
{
    $validatedData = $request->validate([
        'quizName' => 'required|string',
        'questions' => 'required|array',
    ]);

    $quiz = Quiz::findOrFail($quizId);
    $quiz->update(['Name' => $validatedData['quizName']]);

    foreach ($validatedData['questions'] as $questionId => $questionData) {
        $question = Question::findOrFail($questionId);
        $question->update([
            'Question' => $questionData['Question'],
            'answer1' => $questionData['answer1'],
            'answer2' => $questionData['answer2'],
            'answer3' => $questionData['answer3'],
            'answer4' => $questionData['answer4'],
            'correct_answer' => $questionData['correctAnswer'],
        ]);
    }

    return redirect()->route('home')->with('success', 'Quiz updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        if (auth()->user()->id !== $question->user_id) {
            return redirect()->back()->with('error', 'Unauthorized to delete this question.');
        }

        $question->delete();

        return redirect()->back()->with('success', 'Question deleted successfully.');

    }
}
