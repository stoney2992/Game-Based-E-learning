<?php

namespace App\Http\Controllers;  


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MathGameController extends Controller
{
    public function index(Request $request)
{
    // Generate the first question
    $question = $this->generateQuestion();

    // Check if the request expects a JSON response
    if ($request->wantsJson()) {
        // Return question as JSON for API
        return response()->json(['question' => $question]);
    } else {
        // Return view for web requests
        return view('math_game.index', compact('question'));
    }
}


public function submit(Request $request)
{
    $user = Auth::user();
    // Points for each correct answer set to 0.5, which requires two correct answers for 1 point
    $pointsForCorrectAnswer = 0.5;

    $userAnswer = $request->input('answer');
    $correctAnswer = $this->evaluateQuestion($request->input('question'));

    if ((int)$userAnswer === $correctAnswer) {
        // Increment the correct answer counter
        $user->increment('correct_answer_counter');

        // For every 2 correct answers, add 1 point
        if ($user->correct_answer_counter >= 2) {
            $user->increment('points'); // Increment points by 1
            $user->correct_answer_counter = 0; // Reset the counter for correct answers
        }
        
        // Always increment game_points, assuming it tracks attempts regardless of points
        $user->game_points += $pointsForCorrectAnswer;

        $user->save();

        return response()->json([
            'success' => true,
            'correctAnswerCounter' => $user->correct_answer_counter, // Include counter in the response
            'gamePoints' => $user->game_points, // Return the updated game-specific points
            'totalPoints' => $user->points, // Return the updated total points
            'newQuestion' => $this->generateQuestion()
        ]);
    } else {
        // If the answer is incorrect, reset the correct answer counter
        $user->correct_answer_counter = 0;
        $user->save();
    }

    return response()->json([
        'success' => false,
        'newQuestion' => $this->generateQuestion()
    ]);
}



private function transferGamePointsToPoints($user)
{
    $user->points += $user->game_points;
    $user->game_points = 0; // Reset game points
    $user->save();
}







    private function generateQuestion()
    {
        $operators = ['+', '-', '*', '/'];
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $operation = $operators[array_rand($operators)];

        // Ensure no division by zero
        if ($operation === '/' && $num2 === 0) {
            $num2 = 1;
        }

        return "$num1 $operation $num2";
    }

    private function evaluateQuestion($question)
    {
        // Evaluate the arithmetic expression
        return eval("return $question;");
    }
}
