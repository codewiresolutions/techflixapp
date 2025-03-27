
    <h1>{{ $quiz->title }}</h1>
    <p>{{ $quiz->description }}</p>

    @auth
        <form action="{{ route('quizzes.submit', $quiz) }}" method="POST">
            @csrf
            @foreach ($quiz->questions as $question)
                <div>
                    <h3>{{ $question->text }}</h3>
                    @foreach ($question->options as $option)
                        <label>
                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" required>
                            {{ $option->text }}
                        </label><br>
                    @endforeach
                </div>
            @endforeach
            <button type="submit">Submit Quiz</button>
        </form>
    @else
        <p>Please <a href="{{ route('login') }}">login</a> to take the quiz.</p>
    @endauth
