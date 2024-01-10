<div class="modal fade" id="quizModal" tabindex="-1" aria-labelledby="quizModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quizModalLabel">Take Quiz - {{ $quiz->Name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Display questions for the selected quiz -->
                @foreach($questions as $question)
                    <h4>{{ $question->Question }}</h4>
                    <!-- Display answer options here -->
                    <ul>
                        <li>{{ $question->answer1 }}</li>
                        <li>{{ $question->answer2 }}</li>
                        <li>{{ $question->answer3 }}</li>
                        <li>{{ $question->answer4 }}</li>
                    </ul>
                @endforeach
                <form action="{{ route('quiz.take', ['quiz' => $quiz->id]) }}" method="POST">

                    @csrf
                    <!-- Add form fields for submitting quiz answers -->
                    <button type="submit" class="btn btn-primary">Submit Quiz</button>
                </form>
            </div>
        </div>
    </div>
</div>
