<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\UserAnswer;
use App\Models\UserScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        $quiz = Quiz::orderBy('id','desc')->first();

        return view('website.pages.quiz.index', compact('quiz'));
    }

    public function testAttempt(Request $request, $quizId, $questionStep = 1)
    {
        $quiz = Quiz::with('questions')->where('id', $quizId)->first();

        // Get all questions for the quiz
        $questions = Question::where('quiz_id', $quizId)->get();

        // Get the current question based on the step
        $question = $questions->skip($questionStep - 1)->first();

        // If the question doesn't exist, it means the quiz is complete.
        if (!$question) {
            return redirect()->route('quiz.complete', ['quizId' => $quizId]);
        }

        // Get the answers from session
        $answers = session()->get('quiz_answers', []);

        // If the form is being submitted, validate the answer
        if ($request->isMethod('POST')) {
            // Validate the answer selection
            $request->validate([
                "answers.$questionStep" => 'required|exists:options,id', // Ensure the answer is valid
            ]);

            // Store the answer in session
            $answers[$questionStep] = $request->input("answers.$questionStep");
            session()->put('quiz_answers', $answers);

            // Check if there are more questions, otherwise complete the quiz
            if ($questionStep < $quiz->questions->count()) {
                return redirect()->route('quiz-test', ['quizId' => $quizId, 'questionStep' => $questionStep + 1]);
            } else {
                return redirect()->route('quiz.complete', ['quizId' => $quizId]);
            }
        }

        return view('website.pages.quiz.test', compact('quiz', 'question', 'questionStep', 'answers'));
    }


    public function submitAnswer(Request $request, $quizId, $questionStep)
    {
        // Get the current answers from the form submission
        $answers = $request->input('answers', []);

        // Retrieve the existing answers from the session (if any)
        $currentAnswers = session()->get('quiz_answers', []);

        // If the current question step already has an answer, add it to the session array
        if (isset($answers[$questionStep])) {
            $currentAnswers[$questionStep] = $answers[$questionStep]; // Store the answer for the current question
        }
        // Save the updated answers back to the session
        session()->put('quiz_answers', $currentAnswers);

        // Get the next question
        $quiz = Quiz::findOrFail($quizId);
        $questions = Question::where('quiz_id', $quizId)->get();
        $question = $questions->skip($questionStep)->first(); // Move to the next question

        // Redirect to the next question (or quiz complete if it's the last question)
        if ($question) {
            return redirect()->route('quiz.attempt', [
                'quizId' => $quizId,
                'questionStep' => $questionStep + 1
            ]);
        }
        // If the quiz is complete, go to the completion page
        return redirect()->route('quiz.complete', ['quizId' => $quizId]);
    }

    public function quizComplete($quizId)
    {
        $answers = session()->get('quiz_answers', []);
        $quiz = Quiz::findOrFail($quizId);
        $user = Auth::user();
        $score = 0;
        foreach ($answers as $questionId => $answerId) {
            $answer = Option::find($answerId);
            UserAnswer::create([
                'user_id' => $user->id,
                'quiz_id' => $quiz->id,
                'question_id' => $answer->question_id,
                'option_id' => $answerId,
            ]);
            if ($answer && $answer->is_correct) {
                $score++;
            }
        }

        UserScore::create([
            'user_id' => $user->id,
            'quiz_id' => $quiz->id,
            'score' => $score*5,
            'type' => 'quiz',
        ]);
        session()->forget('quiz_answers');

        return view('website.pages.quiz.complete', compact('quiz', 'score'));
    }

    public function UserScore()
    {
        if (auth()->user()->user_type == 'superadmin') {
            // Superadmin: show all user scores
            $userScores = UserScore::with('quiz', 'user')->get();
        } else {
            // Non-superadmin: show only the authenticated user's scores
            $userScores = UserScore::with('quiz', 'user')
                ->where('user_id', auth()->id())
                ->get();
        }

        return view('admin.pages.quizzes.user-score', compact('userScores'));
    }
}
