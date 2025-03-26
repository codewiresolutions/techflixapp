
    <h1>{{ $quiz->title }} - Result</h1>
    <p>Your Score: {{ $score }} / {{ $total }}</p>
    <a href="{{ route('quizzes.index') }}">Back to Quizzes</a>
