<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Question::create([
            'Question' => 'What is the capital of France?',
            'answer1' => 'London',
            'answer2' => 'Paris',
            'answer3' => 'Berlin',
            'answer4' => 'Rome',
            'correct_answer' => 'Paris',
            'quiz_id' => 1,
            'user_id' => 1,
            'Photo' => 'https://media.istockphoto.com/id/1162198273/vector/question-mark-icon-flat-vector-illustration-design.jpg?s=612x612&w=0&k=20&c=MJbd8bw2iewJRd8sEkHxyGMgY3__j9MKA8cXvIvLT9E=',
        ]);

        Question::create([
            'Question' => 'Which programming language is this quiz written in?',
            'answer1' => 'Java',
            'answer2' => 'Python',
            'answer3' => 'PHP',
            'answer4' => 'JavaScript',
            'correct_answer' => 'PHP',
            'quiz_id' => 1,
            'user_id' => 1,
            'Photo' => 'https://media.istockphoto.com/id/1162198273/vector/question-mark-icon-flat-vector-illustration-design.jpg?s=612x612&w=0&k=20&c=MJbd8bw2iewJRd8sEkHxyGMgY3__j9MKA8cXvIvLT9E=',
        ]);

        Question::create([
            'Question' => 'What is the largest mammal on Earth?',
            'answer1' => 'Elephant',
            'answer2' => 'Blue Whale',
            'answer3' => 'Giraffe',
            'answer4' => 'Polar Bear',
            'correct_answer' => 'Blue Whale',
            'quiz_id' => 2,
            'user_id' => 1,
            'Photo' => 'https://media.istockphoto.com/id/1162198273/vector/question-mark-icon-flat-vector-illustration-design.jpg?s=612x612&w=0&k=20&c=MJbd8bw2iewJRd8sEkHxyGMgY3__j9MKA8cXvIvLT9E=',
        ]);
    }
}
