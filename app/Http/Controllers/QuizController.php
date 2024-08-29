<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\QuizController as ApiQuizController;

use App\Http\Controllers\Controller;
use App\Models\Quiz;

use Illuminate\Http\Request;
use App\Models\QuizAttempt; 
use Twilio\Rest\Client;
use App\Models\AddClass;
use App\Models\User;
use App\Models\AssignClassModel;
use App\Models\AssignClassPupil;
use App\Models\AddLesson;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{

    public function index($classId)
{
    // Fetch and display a list of quizzes for a specific class
    $quizzes = Quiz::where('class_id', $classId)->with('questions.choices')->get();
    

    if (request()->expectsJson()) {
        // If the request expects JSON (typically API calls), return a JSON response
        return response()->json($quizzes);
    } else {
        // For web requests, return the view with additional data if needed
        // If you need to display quiz attempts in the web view, you can fetch them here
        $quizAttempts = QuizAttempt::whereIn('quiz_id', $quizzes->pluck('id'))->with('user')->get();
        return view('quiz.quizIndex', compact('quizzes', 'classId', 'quizAttempts'));
    }
}





public function store(Request $request)
{
    $validatedData = $request->validate([
        'class_id' => 'required|exists:add_classes,id',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'time_limit' => 'nullable|integer|min:1' // assuming time limit is in minutes and is optional
    ]);

    // Store a newly created quiz in the database using the validated data
    $quiz = new Quiz();
    $quiz->class_id = $validatedData['class_id'];
    $quiz->title = $validatedData['title'];
    $quiz->description = $validatedData['description'];
    $quiz->time_limit = $validatedData['time_limit'] ?? null; // Store the time limit or null if not provided
    $quiz->teacher_id = auth()->user()->id;
    $quiz->save();
 
    // Fetch all pupils in the class
    $pupils = AssignClassPupil::where('class_id', $request->class_id)
                              ->pluck('pupil_id')
                              ->toArray();
    $pupilUsers = User::whereIn('id', $pupils)->get();

    // SMS message content
    $message = "A new quiz titled '{$quiz->title}' has been added to your class.";
    
    // Send SMS to all pupils
    $this->sendSmsToPupils($pupilUsers, $message);

    return back()->with('success', 'Quiz created successfully');
}

private function sendSmsToPupils($pupils, $message)
{
    $twilio = new Client(getenv('TWILIO_SID'), getenv('TWILIO_TOKEN'));

    foreach ($pupils as $pupil) {
        if (!empty($pupil->phone)) {
            $formattedNumber = '+63' . substr($pupil->phone, 1);
            try {
                $twilio->messages->create($formattedNumber, [
                    'from' => getenv('TWILIO_PHONE'),
                    'body' => $message
                ]);
            } catch (\Exception $e) {
                \Log::error('SMS Sending Error to pupil ' . $pupil->id . ': ' . $e->getMessage());
            }
        }
    }
}


public function edit($id)
{
    $quiz = Quiz::findOrFail($id);
    // Pass the quiz to the edit view
    return view('quiz.quiz_edit', compact('quiz'));
}


public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'time_limit' => 'nullable|integer|min:1',
    ]);

    $quiz = Quiz::findOrFail($id);
    $quiz->fill($validatedData);
    $quiz->save();

    return redirect()->route('quiz.quizIndex', ['class_id' => $quiz->class_id])->with('success', 'Quiz updated successfully');
}







    

public function show($id)
{
    $quiz = Quiz::with('questions.choices')->findOrFail($id);
    $user = Auth::user();
    $hasAttempted = QuizAttempt::where('quiz_id', $quiz->id)
                               ->where('user_id', $user->id)
                               ->exists();

    $totalScore = $quiz->questions->sum(function ($question) {
        return $question->choices->where('is_correct', 1)->sum('points');
    });

    $latestAttempt = QuizAttempt::where('quiz_id', $id)->where('user_id', $user->id)->latest()->first();
    $pupilScore = $latestAttempt ? $latestAttempt->score : null;

        
        $questions = $quiz->questions;
        return view('quiz.show_quiz', compact('quiz', 'questions', 'hasAttempted', 'totalScore', 'pupilScore',));
}




public function submit($quizId, Request $request)
{
    $quiz = Quiz::findOrFail($quizId);
    $questions = $quiz->questions;

    $existingAttempt = QuizAttempt::where('quiz_id', $quiz->id)
                                  ->where('user_id', Auth::user()->id)
                                  ->first();

    if ($existingAttempt) {
        return redirect()->route('student_dashboard')->with('error', 'You have already attempted this quiz.');
    }

    $totalPossibleScore = $questions->sum(function ($question) {
        return $question->choices->where('is_correct', 1)->sum('points');
    });

    $score = 0;
    foreach ($questions as $question) {
        $correctChoices = $question->choices()->where('is_correct', 1)->get();
        $selectedChoices = (array) $request->input("answers.{$question->id}", []);
        foreach ($selectedChoices as $selectedChoice) {
            $choice = $correctChoices->firstWhere('id', $selectedChoice);
            if ($choice) {
                $score += $choice->points;
            }
        }
    }

    $points = $this->calculatePoints($score, $totalPossibleScore);

    // Store the quiz attempt and score in the database
    $quizAttempt = QuizAttempt::create([
        'user_id' => auth()->user()->id,
        'quiz_id' => $quiz->id,
        'score' => $score,
        'points' => $points,
    ]); 

    // Update the user's total points
    $user = Auth::user();
    $user->points += $points; // Update with points instead of score
    $user->save();

    // Save the selected answers
    foreach ($questions as $question) {
        $choiceId = $request->input("answers.{$question->id}");
        if ($choiceId) {
            $quizAttempt->answers()->create([
                'question_id' => $question->id,
                'choice_id' => $choiceId,
            ]);
        }
    }

    return redirect()->back()->with('success', 'Quiz submitted successfully');
}

private function calculatePoints($score, $totalPossibleScore)
{
    $percentageScore = ($score / $totalPossibleScore) * 100;

    if ($percentageScore >= 100) {
        return 2.0;
    } elseif ($percentageScore >= 50) {
        return 1.0;
    } else {
        return 0.5;
    }
}






public function delete($quizId)
{
    $quiz = Quiz::findOrFail($quizId);
    DB::beginTransaction();
    try {
        // Delete associated questions
        $quiz->questions()->delete();


        // Then delete the quiz
        $quiz->delete();

        DB::commit();
        return redirect()->back()->with('success', 'Quiz deleted successfully');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Failed to delete quiz');
    }
}






}
