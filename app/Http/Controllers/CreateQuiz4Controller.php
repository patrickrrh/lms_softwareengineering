<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use app\Models\Classroom;

class QuizController extends Controller
{
    public function saveQuiz(Request $request)
    {
        // Retrieve the form data
        $quizData = $request->validate([
            'QuizName' => 'required',
            'QuizInformations' => 'nullable',
            'QuizDate' => 'nullable|date',
            'QuizStart' => 'nullable',
            'QuizEnd' => 'nullable',
            'QuizArticle' => 'nullable',
            'QuizQuestion1' => 'required',
            'QuizQuestion2' => 'required',
            'QuizQuestion3' => 'required',
        ]);

        // Create the quiz
        $quiz = Quiz::create([
            'name' => $quizData['QuizName'],
            'informations' => $quizData['QuizInformations'],
            'date' => $quizData['QuizDate'],
            'start_time' => $quizData['QuizStart'],
            'end_time' => $quizData['QuizEnd'],
            'article' => $quizData['QuizArticle'],
        ]);

        // Create the questions
        $questions = [
            $quizData['QuizQuestion1'],
            $quizData['QuizQuestion2'],
            $quizData['QuizQuestion3'],
        ];

        foreach ($questions as $question) {
            $quiz->questions()->create([
                'question' => $question,
            ]);
        }

        // Redirect or perform any other necessary actions
        return redirect()->route('success')->with('message', 'Quiz created successfully!');
    }

    public function index(Request $request)
    {
        return view('createQuiz4', [
            'classes' => Classroom::all()
        ]);
    }
    
    
    
}