<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    
    function show() {
        $data = Quiz::join('courses', 'courses.CourseID', '=', 'quizzes.CourseID')
            ->join('classrooms', 'classrooms.ClassroomID', '=', 'quizzes.ClassroomID')
            ->join('sessions', 'sessions.SessionID', '=', 'quizzes.SessionID')
            ->leftJoin('user_quizzes', function ($join) {
                $join->on('quizzes.QuizID', '=', 'user_quizzes.QuizID');
                    // ->where('user_quizzes.UserID', '=', Auth::user()->UserID);
            })
            ->get([
                'quizzes.*',
                'classrooms.ClassroomName',
                'courses.CourseName',
                'user_quizzes.QuizScore',
                'user_quizzes.StatusPlayed'
            ]);

        return view('quizList', ['quizzes' => $data]);
    }


    function quizDetails($QuizID) {

        $quiz = Quiz::join('courses', 'courses.CourseID', '=', 'quizzes.CourseID')
        ->join('classrooms', 'classrooms.ClassroomID', '=', 'quizzes.ClassroomID')
        ->join('sessions', 'sessions.SessionID', '=', 'quizzes.SessionID')
        ->where('quizzes.QuizID', $QuizID)
        ->select('quizzes.*', 'classrooms.ClassroomName', 'courses.CourseName', 'sessions.SessionTopic')
        ->first();

        $totalQuestion = QuestionController::countQuestion($QuizID);
        return view('quizDetails', compact('quiz', 'totalQuestion'));
    }

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


}
