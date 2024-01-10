<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all quizzes from the database
        $quizzes = Quiz::orderBy('created_at', 'desc')->get();


        // Pass the quizzes to the view
        return view('quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function take($quizId)
{
    $quiz = Quiz::findOrFail($quizId);
    $questions = $quiz->questions;

    return view('quiz.take', compact('quiz', 'questions'));
}

    public function store(Request $request)
{
    $ $request->validate([
        'name' => 'required|string|max:255',
        'photo' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    $user = Auth::user(); // Get the currently authenticated user

    Quiz::create([
        'Name' => $request->input('name'),
        'Photo' => $request->input('photo'),
        'Description' => $request->input('description'),
        'user_id' => $user->id,
    ]);

    return redirect()->route('home')->with('success', 'Quiz added successfully.');

}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $questions = $quiz->questions;

        return view('quiz.show', compact('quiz', 'questions'));
    }

    public function submit(Request $request, $quizId)
    {
        // Handle submitted answers and calculate score
        // Update the logic based on your requirements
        $submittedAnswers = $request->input('answers');
        // Perform scoring logic and store results as needed

        return redirect()->route('quiz.show', $quizId)
            ->with('success', 'Quiz submitted successfully. Your score is: ' . $score);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
