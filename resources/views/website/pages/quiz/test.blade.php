@extends('website.layouts.master')

@push('title')
    Blogs
@endpush

@section('content')
    <main>
        <section class="quiz_screen_section">
            <div class="container">
                <div class="box_quiz_test">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="{{ route('quiz.answer', ['quizId' => $quiz->id, 'questionStep' => $questionStep]) }}" method="POST" id="quizForm">
                                        @csrf
                                        <div class="text_lenght">
                                            <p>Question {{ $questionStep }} of {{ $quiz->questions->count() }}</p>
                                        </div>
                                        <div id="result" class="quiz-body">
                                            <div class="heading_of_question">
                                                <span>1</span> : {{ $question->text }}
                                            </div>
                                            @foreach($question->options as $option)
                                                <div class="option_qst">
                                                    <div class="chech_box">
                                                        <input type="radio" name="answers[{{ $questionStep }}]" value="{{ $option->id }}"
                                                               {{ isset($answers[$questionStep]) && $answers[$questionStep] == $option->id ? 'checked' : '' }}
                                                               class="quiz-option">
                                                        <label for="">{{ $option->text }}</label>
                                                    </div>
                                                </div>
                                            @endforeach

                                            @if($questionStep < $quiz->questions->count())
                                                <button class="btn btn-success" type="submit" id="submitBtn">Next</button>
                                            @else
                                                <button class="btn btn-success" type="submit" id="submitBtn">Submit Quiz</button>
                                            @endif
                                        </div>
                                    </form>
                                </div> <!-- End of col-sm-12 -->
                            </div> <!-- End of row -->
                        </div> <!-- End of container fluid -->
                    </div> <!-- End of content -->
                </div>
            </div>
        </section>
    </main>

    <script>
        document.getElementById("quizForm").addEventListener("submit", function(event) {
            // Check if any radio button is selected
            const selectedOption = document.querySelector('input[name="answers[{{ $questionStep }}]"]:checked');

            if (!selectedOption) {
                // Prevent form submission if no option is selected
                alert("Please select an answer before proceeding.");
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>

@endsection
