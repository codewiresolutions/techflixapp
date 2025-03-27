<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create($quizId)
    {
        $questionNumber = Question::where('quiz_id', $quizId)->get()->count();

        $questionNumber += 1;
        return view('admin.pages.quizzes.question-create', compact('quizId','questionNumber'));
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

        return redirect()->route('admin.quizzes.index');
    }

    public function questionsShow($quizId)
    {

        $quiz = Quiz::find($quizId);
        $questions =  Question::with('options')->where('quiz_id',$quizId)->get();
        return view('admin.pages.quizzes.questions', compact('questions','quiz'));

    }
    public function updateAnswer(Request $request)
    {

        Option::where('question_id', $request->question_id)
            ->update(['is_correct' => false]);

        Option::where('id', $request->answer_id)
            ->update(['is_correct' => true]);

        return response()->json(['success' => true, 'message' => 'Answer updated successfully!']);
    }



//    public function index($quiz_id)
//    {
//
//        $quiz = Quiz::findOrFail($quiz_id);
//        $questions = $quiz->questions; // This gets the related questions
//        return view('admin.pages.questions.index', compact('questions', 'quiz'));
//    }
//
//    // Show the form for creating a new question
//    public function create($quiz_id)
//    {
//
//        $quiz = Quiz::findOrFail($quiz_id);
//        return view('admin.pages.questions.create', compact('quiz'));
//    }
//
//    // Store a newly created question in the database
//    public function store(Request $request, $quiz_id)
//    {
//        $request->validate([
//            'text' => 'required',
//        ]);
//
//        $quiz = Quiz::findOrFail($quiz_id);
//        $quiz->questions()->create([
//            'text' => $request->text,
//        ]);
//
//        return redirect()->route('admin.questions.index', $quiz_id)
//            ->with('success', 'Question created successfully.');
//    }
//
//    // Show the form for editing the specified question
//    public function edit($quiz_id, $id)
//    {
//        $quiz = Quiz::findOrFail($quiz_id);
//        $question = $quiz->questions()->findOrFail($id);
//        return view('admin.pages.questions.edit', compact('quiz', 'question'));
//    }
//
//    // Update the specified question in the database
//    public function update(Request $request, $quiz_id, $id)
//    {
//        $request->validate([
//            'text' => 'required',
//        ]);
//
//        $quiz = Quiz::findOrFail($quiz_id);
//        $question = $quiz->questions()->findOrFail($id);
//        $question->update([
//            'text' => $request->text,
//        ]);
//
//        return redirect()->route('admin.questions.index', $quiz_id)
//            ->with('success', 'Question updated successfully.');
//    }
//
//    // Remove the specified question from the database
//    public function destroy($quiz_id, $id)
//    {
//        $quiz = Quiz::findOrFail($quiz_id);
//        $question = $quiz->questions()->findOrFail($id);
//        $question->delete();
//
//        return redirect()->route('admin.questions.index', $quiz_id)
//            ->with('success', 'Question deleted successfully.');
//    }
}
