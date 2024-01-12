<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="container mt-5">

    <h1>Edit Quiz</h1>

    <form action="{{ route('quiz.update', ['quiz' => $quiz->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="quizName" class="form-label">Quiz Name:</label>
            <input type="text" class="form-control" id="quizName" name="quizName" value="{{ old('quizName', $quiz->Name) }}">
        </div>

        <h2>Questions</h2>

        @foreach($quiz->questions as $question)
            <div class="card mb-3">
                <div class="card-body">
                    <label for="question{{ $question->id }}" class="form-label">Question:</label>
                    <input type="text" class="form-control" id="question{{ $question->id }}" name="questions[{{ $question->id }}]" value="{{ old('questions.' . $question->id, $question->Question) }}">


                    <div class="mb-3">
    <label for="answer1" class="form-label">Answer 1:</label>
    <input type="text" class="form-control" id="answer1" name="answer1" value="{{ old('answer1', $question->answer1) }}">
</div>

<div class="mb-3">
    <label for="answer2" class="form-label">Answer 2:</label>
    <input type="text" class="form-control" id="answer2" name="answer2" value="{{ old('answer2', $question->answer2) }}">
</div>

<div class="mb-3">
    <label for="answer3" class="form-label">Answer 3:</label>
    <input type="text" class="form-control" id="answer3" name="answer3" value="{{ old('answer3', $question->answer3) }}">
</div>

<div class="mb-3">
    <label for="answer4" class="form-label">Answer 4:</label>
    <input type="text" class="form-control" id="answer4" name="answer4" value="{{ old('answer4', $question->answer4) }}">
</div>
                    <div class="mb-3">
    <label for="correctAnswer" class="form-label">Correct Answer:</label>
    <input type="text" class="form-control" id="correctAnswer" name="correctAnswer" value="{{ old('correctAnswer', $question->correct_answer) }}">
</div>

<form action="{{ route('question.delete', ['question' => $question->id]) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete Question</button>
</form>
<button type="submit" class="btn btn-primary">Update Quiz</button>
                </div>
            </div>
            
        @endforeach

        <a href="{{ route('question.create', ['quizId' => $quiz->id]) }}" class="btn btn-success">Add New Question</a>



    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
