<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function get()
    {
        $quizzes = Quiz::all();
        return view('admin.pages.quizzes.index', compact('quizzes'));
    }

    // Admin Create Form
    public function create()
    {
        return view('admin.pages.quizzes.create');
    }

    // Admin Store Quiz
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'expire_date' => 'nullable|date',
        ]);

        Quiz::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'expire_date' => $request->expire_date,
            'added_by' => Auth::user()->id,
        ]);

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz created successfully.');
    }

    // Admin Edit Form
    public function edit(Quiz $quiz)
    {
        return view('admin.pages.quizzes.edit', compact('quiz'));
    }

    // Admin Update Quiz
    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'expire_date' => 'nullable|date',
        ]);

        $quiz->update($request->only(['title', 'description', 'status', 'expire_date']));

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz updated successfully.');
    }

    // Admin Delete Quiz
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz deleted successfully.');
    }
    public function index()
    {
        $quizzes = Quiz::with('questions.options')->get();

        return view('quizzes.index', compact('quizzes'));
    }

    public function show(Quiz $quiz)
    {
        $quiz->load('questions.options');
        return view('quizzes.show', compact('quiz'));
    }

    public function submit(Request $request, Quiz $quiz)
    {

//        dd($request->input('answers'));
        $user = Auth::user();
        $answers = $request->input('answers', []);
            dd($answers);

        foreach ($answers as $questionId => $optionId) {
            UserAnswer::create([
                'user_id' => $user->id,
                'quiz_id' => $quiz->id,
                'question_id' => $questionId,
                'option_id' => $optionId,
            ]);
        }

        return redirect()->route('quizzes.result', $quiz->id);
    }

    public function result(Quiz $quiz)
    {
        $user = Auth::user();
        $answers = UserAnswer::where('user_id', $user->id)
            ->where('quiz_id', $quiz->id)
            ->with('option')
            ->get();

        $score = $answers->filter(fn($answer) => $answer->option->is_correct)->count();
        $total = $quiz->questions->count();

        return view('quizzes.result', compact('quiz', 'score', 'total'));
    }
}
