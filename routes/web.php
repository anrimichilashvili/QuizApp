<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/quizzes/{quiz}', [QuizController::class, 'show'])->name('quiz.show');

Route::get('/quizzes/{quiz}/edit', [QuizController::class, 'edit'])->name('quiz.edit');

Route::delete('/quizzes/{quiz}', [QuizController::class, 'destroy'])->name('quiz.delete');

Route::get('/quizzes/create', [QuizController::class, 'create'])->name('quiz.create');
Route::post('/quizzes', [QuizController::class, 'store'])->name('quiz.store');


Route::post('/quizzes/{quiz}/submit', [QuizController::class, 'submit'])->name('quiz.submit');

Route::put('/quizzes/{quiz}', 'QuizController@update')->name('quiz.update');




Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('question.delete');
Route::get('/questions/create/{quizId}', [QuestionController::class, 'create'])->name('question.create');


Route::post('/questions/{quizId}', [QuestionController::class, 'store'])->name('question.store');


