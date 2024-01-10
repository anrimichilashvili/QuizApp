<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all(); // Assuming you have a Quiz model and want to retrieve all quizzes

        return view('home', ['quizzes' => $quizzes]);
    }
}
