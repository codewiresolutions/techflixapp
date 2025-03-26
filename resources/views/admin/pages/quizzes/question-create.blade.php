@extends('admin.layouts.master')

@push('title')
    Create Quiz
@endpush

@section('content')

    <style>
        label {
            font-weight: 500 !important;
            font-size: 18px !important;
            color: var(--blackcolor) !important;
            text-transform: capitalize !important;
             margin: 0px;
        }
        .form-check-input {
            position: absolute;
            margin-top: .5rem;
            margin-left: -1.25rem;
        }
        .form-control {

            height: 40px !important;
            border-radius: 5px !important;

        }
    </style>
    <main>
        <section class="login_page">
            <section class="container-fluid container_wrapper">
                <br>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card_wrap">
                            <div class="card-body">
                                <form id="createQuiz" method="POST" action="{{ route('admin.questions.store') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="quiz_id" value="{{$quizId}}">
                                    <div class="for_prifile_section">
                                        <!-- First Section (Half of the Fields) -->

                                        <div id="questions">
                                            <div class="question">
                                                <div class="mb-4">
                                                    <h3 class="text-center">Question {{$questionNumber}}</h3>
                                                    <div class="form-group">
                                                        <label for="question">Question</label>
                                                        <input type="text" class="form-control"
                                                               name="questions[0][question]" required>
                                                    </div>
                                                </div>


                                                <div class="options">
                                                    <!-- Option 1 -->
                                                    <div class="form-group row">
                                                        <label for="option_1" class="col-sm-2 col-form-label">Option 1</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="questions[0][options][0][text]" required>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="questions[0][options][0][correct]">
                                                                <label class="form-check-label" for="correct_1">Is Correct?</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Option 2 -->
                                                    <div class="form-group row">
                                                        <label for="option_2" class="col-sm-2 col-form-label">Option 2</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="questions[0][options][1][text]" required>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="questions[0][options][1][correct]">
                                                                <label class="form-check-label" for="correct_2">Is Correct?</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Option 3 -->
                                                    <div class="form-group row">
                                                        <label for="option_3" class="col-sm-2 col-form-label">Option 3</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="questions[0][options][2][text]" required>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="questions[0][options][2][correct]">
                                                                <label class="form-check-label" for="correct_3">Is Correct?</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Option 4 -->
                                                    <div class="form-group row">
                                                        <label for="option_4" class="col-sm-2 col-form-label">Option 4</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="questions[0][options][3][text]" required>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="questions[0][options][3][correct]">
                                                                <label class="form-check-label" for="correct_4">Is Correct?</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="btn_flex mt-5 mb-2">
                                            <a class="btn-main btn" href="{{ route('admin.quizzes.index') }}">Back</a>  
                                            <button type="submit" class="btn-main btn submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        // Automatically check the first checkbox when the page loads
        $('input[type="checkbox"]').first().prop('checked', true);

        // When any checkbox is clicked
        $('input[type="checkbox"]').click(function () {
            // Uncheck all checkboxes first
            $('input[type="checkbox"]').prop('checked', false);

            // Check the clicked checkbox
            $(this).prop('checked', true);
        });
    });
</script>
