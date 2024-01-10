<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quiz::create([
            'Name' => 'Quiz 1',
            'Photo' => 'https://example.com/photo1.jpg',
            'Description' => 'This is the first quiz description.',
            'user_id' => 1,
            
        ]);

        Quiz::create([
            'Name' => 'Quiz 2',
            'Photo' => 'https://example.com/photo2.jpg',
            'Description' => 'This is the second quiz description.',
            'user_id' => 1,
            
        ]);

        Quiz::create([
            'Name' => 'Quiz 3',
            'Photo' => 'https://example.com/photo3.jpg',
            'Description' => 'This is the third quiz description.',
            'user_id' => 2,
            
        ]);
    }
}
