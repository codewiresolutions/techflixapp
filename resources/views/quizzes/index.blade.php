


    <h1>Available Quizzes</h1>

    <ul>
        @foreach ($quizzes as $quiz)
            <li><a href="{{ route('quizzes.show', $quiz) }}">{{ $quiz->title }}</a></li>
        @endforeach
    </ul>
