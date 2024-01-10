<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homw</title>
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
 
    <div class="container">
    <h1>Quizzes</h1>
    <div class="row">
        @foreach($quizzes as $quiz)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $quiz->Photo }}" class="card-img-top" alt="{{ $quiz->Name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $quiz->Name }}</h5>
                        <p class="card-text">{{ $quiz->Description }}</p>
                        <a href="{{ route('quiz.show', $quiz->id) }}" data-bs-toggle="modal" data-bs-target="#quizModal">Take Quiz</a>


                        <button>edit</button>
                        <button>delete</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addQuizModal">
    Add Quiz
</button>
</div>






<!--<div class="modal fade" id="quizModal" tabindex="-1" aria-labelledby="quizModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="quizModalLabel">Take Quiz</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('quiz.take') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-primary">Submit Quiz</button>
        </form>
      </div>
    </div>
  </div>
</div>-->



<div class="modal fade" id="addQuizModal" tabindex="-1" aria-labelledby="addQuizModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addQuizModalLabel">Add Quiz</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Include the form fields for adding a quiz -->
                <form action="{{ route('quiz.store') }}" method="POST">
                    @csrf

                    <label for="name">Name:</label>
                    <input type="text" name="name" required>

                    <label for="photo">Photo URL:</label>
                    <input type="text" name="photo" required>

                    <label for="description">Description:</label>
                    <textarea name="description" required></textarea>

                    <button type="submit" class="btn btn-primary">Add Quiz</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

