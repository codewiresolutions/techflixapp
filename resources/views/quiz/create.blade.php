<div class="container">
    <h1>Create Quiz</h1>


    <form action="{{ route('admin.questions.store') }}" method="POST">
        @csrf
        <input type="hidden" name="quiz_id" value="{{$quizId}}">

        <div id="questions">
            <div class="question">
                <h3>Question {{$questionNumber}}</h3>
                <div class="">
                    <label for="question">Question</label>
                    <input type="text" class="" name="questions[0][question]" required>
                </div>

                <h4>Options</h4>
                <div class="options">
                    <div class="form-group">
                        <label for="option_1">Option 1</label>
                        <input type="text" class="form-control" name="questions[0][options][0][text]" required>
                        <label for="correct_1">Is Correct?</label>
                        <input type="checkbox" name="questions[0][options][0][correct]">
                    </div>

                    <div class="form-group">
                        <label for="option_2">Option 2</label>
                        <input type="text" class="form-control" name="questions[0][options][1][text]" required>
                        <label for="correct_2">Is Correct?</label>
                        <input type="checkbox" name="questions[0][options][1][correct]">
                    </div>
                    <div class="form-group">
                        <label for="option_3">Option 3</label>
                        <input type="text" class="form-control" name="questions[0][options][2][text]" required>
                        <label for="correct_3">Is Correct?</label>
                        <input type="checkbox" name="questions[0][options][2][correct]">
                    </div>
                    <div class="form-group">
                        <label for="option_4">Option 4</label>
                        <input type="text" class="form-control" name="questions[0][options][3][text]" required>
                        <label for="correct_4">Is Correct?</label>
                        <input type="checkbox" name="questions[0][options][3][correct]">
                    </div>

                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Quiz</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Automatically check the first checkbox when the page loads
        $('input[type="checkbox"]').first().prop('checked', true);

        // When any checkbox is clicked
        $('input[type="checkbox"]').click(function() {
            // Uncheck all checkboxes first
            $('input[type="checkbox"]').prop('checked', false);

            // Check the clicked checkbox
            $(this).prop('checked', true);
        });
    });
</script>
