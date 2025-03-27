<?php

namespace App\Http\Controllers\My;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    // Display the form to create a quiz
    public function create($quizId)
    {

        $questionNumber = Question::where('quiz_id', $quizId)->get()->count();

        $questionNumber += 1;
        return view('quiz.create', compact('quizId','questionNumber'));
    }

    // Store the quiz and its questions/options
    public function store(Request $request)
    {


        // Loop through the questions and store them
        foreach ($request->questions as $questionData) {
            $question = Question::create([
                'quiz_id' => $request->quiz_id,
                'text' => $questionData['question'],
            ]);


            // Store the options for each question
            foreach ($questionData['options'] as $optionData) {

                $correct = false;
                if (isset($optionData['correct']) && $optionData['correct'] == 'on') {
                    $correct = true;
                }
                Option::create([
                    'question_id' => $question->id,
                    'text' => $optionData['text'],
                    'is_correct' => $correct,
                ]);
            }
        }


        return redirect()->route('quizzes.index');
    }
}
