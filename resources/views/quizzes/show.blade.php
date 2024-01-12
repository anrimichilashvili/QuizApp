<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $quiz->Name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>{{ $quiz->Name }}</h1>

        <form action="{{ route('quiz.submit', ['quiz' => $quiz->id]) }}" method="post">
            @csrf
            @foreach($quiz->questions as $question)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $question->Question }}</h5>
                    <ul>
                        <li>
                            <label>
                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $question->answer1 }}">
                                {{ $question->answer1 }}
                            </label>
                        </li>
                        <li>
                            <label>
                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $question->answer2 }}">
                                {{ $question->answer2 }}
                            </label>
                        </li>
                        <li>
                            <label>
                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $question->answer3 }}">
                                {{ $question->answer3 }}
                            </label>
                        </li>
                        <li>
                            <label>
                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $question->answer4 }}">
                                {{ $question->answer4 }}
                            </label>
                        </li>
                    </ul>

                    @if ($question->Photo)
                    <img src="{{ asset('path/to/your/images/' . $question->Photo) }}" alt="Question Photo">
                    @endif
                </div>
            </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
