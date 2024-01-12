<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>
                <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Quizzes</h1>

        <div class="row">
            @foreach($quizzes as $quiz)
            <div class="col-md-4 mb-4">
                <a href="{{ route('quiz.show', ['quiz' => $quiz->id]) }}" class="text-decoration-none">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $quiz->Name }}</h5>
                            <p class="card-text">{{ $quiz->Description }}</p>
                            <a href="{{ route('quiz.edit', ['quiz' => $quiz->id]) }}" class="btn btn-primary">Edit</a>
                            <form method="POST" action="{{ route('quiz.delete', ['quiz' => $quiz->id]) }}" onsubmit="return confirm('Are you sure you want to delete this quiz?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <a href="{{ route('quiz.create') }}" class="btn btn-success">Add Quiz</a>

    </div>

</body>

</html>
