<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Question</title>
</head>
<body style="text-align: center; margin-top: 50px;">

    <h1 style="color: green;">Add Question</h1>

    <form action="{{ route('question.store', ['quizId' => $quiz->id]) }}" method="post" style="margin: 20px auto; max-width: 400px;">
        @csrf

        <!-- Question -->
        <label for="question" style="display: block; margin-bottom: 10px;">Question:</label>
        <input type="text" id="question" name="question" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>

        <!-- Answers -->
        @for ($i = 1; $i <= 4; $i++)
            <label for="answer{{ $i }}" style="display: block; margin-bottom: 10px;">Answer {{ $i }}:</label>
            <input type="text" id="answer{{ $i }}" name="answers[]" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
        @endfor

        <!-- Correct Answer -->
        <label for="correctAnswer" style="display: block; margin-bottom: 10px;">Correct Answer:</label>
        <input type="text" id="correctAnswer" name="correctAnswer" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>

        <!-- Photo URL -->
        <label for="photo" style="display: block; margin-bottom: 10px;">Photo URL:</label>
        <input type="text" id="photo" name="photo" placeholder="Enter photo URL" style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>

        <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px; border: none; cursor: pointer;">Add Question</button>
    </form>

</body>
</html>
