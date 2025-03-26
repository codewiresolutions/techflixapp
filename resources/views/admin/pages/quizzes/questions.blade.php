@extends('admin.layouts.master')

@push('title')
    Questions
@endpush

@section('content')

    <style>
        .form-check-input {
            position: absolute;
            margin-top: 1rem;
            margin-left: -2.25rem;
        }

        /* Ensure the form takes full width */
        .quiz-form-container {
            width: 90%;

        }

        /* Make the form itself stretch full width */
        .quiz-form {
            width: 90%;
            padding: 1rem;
            background-color: #F5F8FD;

            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Make each question container responsive */
        .quiz-question {
            width: 100%;
        }

        /* Adjust column sizes for responsiveness */
        @media (max-width: 768px) {
            .quiz-question {
                margin-bottom: 1.5rem;
            }
        }
    </style>

    <main>
        <section class="">
            <section class="container_wrapper">
                {{--                <h5 class="text-heading">Questions of {{$quiz->title}} Quiz</h5>--}}

                <div class="">
                    <div class="">
                        <a href="{{ route('admin.quiz.questions.create',$quiz) }}" class="btn btn-primary my-3">Add
                            New Question</a>
                        <div class="row">
                            <div class="col-12 mt-5">
                                @include('admin.layouts.partials.message')

                                @auth
                                    <form action="{{ route('quizzes.submit', $quiz) }}" method="POST"
                                          class="quiz-form">
                                        @csrf
                                        <h2 class="text-center mb-4">{{$quiz->title}}</h2>

                                        @foreach ($quiz->questions as $key => $question)
                                            <div class="quiz-question mb-4">
                                                <h4 class="mb-3"> {{$key+1}} . {{ $question->text }}</h4>
                                                <div class="form-check">
                                                    @foreach ($question->options as $option)
                                                        <div class="form-check">
                                                            <input
                                                                type="radio"
                                                                name="answers[{{ $question->id }}]"
                                                                class="form-check-input"
                                                                value="{{ $option->id }}"
                                                                {{ $option->is_correct ? 'checked' : '' }}
                                                                required>
                                                            <label class="form-check-label"
                                                                   for="option-{{ $option->id }}">{{ $option->text }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </form>
                                @else
                                    <p class="text-center">Please <a href="{{ route('login') }}">login</a> to take
                                        the quiz.</p>
                                @endauth
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <script>
        $(document).ready(function() {
            // When any radio button is clicked
            $('input[type="radio"]').on('change', function() {
                var answerId = $(this).val(); // The value of the selected radio button (option ID)
                var questionId = $(this).attr('name').split('[')[1].split(']')[0]; // Extract question ID from the name attribute

                // Make AJAX call to update the answer
                $.ajax({
                    url: '/admin/update-answer', // Your route to handle the AJAX request
                    method: 'POST',
                    data: {
                        question_id: questionId,
                        answer_id: answerId,
                        _token: '{{ csrf_token() }}' // CSRF token for security (use Blade syntax to insert it)
                    },
                    success: function(response) {
                        // Handle success (e.g., show a success message, change UI)
                        console.log('Answer updated successfully!');
                    },
                    error: function(xhr, status, error) {
                        // Handle error (e.g., show an error message)
                        console.log('Error updating answer: ' + error);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
