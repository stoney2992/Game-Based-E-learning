<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizSubmittController extends Controller
{
    public function submit($quizId, Request $request)
{
    $quiz = Quiz::findOrFail($quizId);
    $questions = $quiz->questions;

    // Process submitted answers and calculate score
    $score = // ... your logic to calculate the score based on submitted answers

    // Store the quiz attempt and score in the database
    $quizAttempt = $quiz->attempts()->create([ 
        'pupil_id' => auth()->user()->id,
        'score' => $score,
    ]);

    // Associate submitted answers with the quiz attempt
    foreach ($questions as $question) {
        $choiceId = $request->input("answers.{$question->id}");
        $quizAttempt->answers()->create([
            'question_id' => $question->id,
            'choice_id' => $choiceId,
        ]);
    }

    return redirect()->route('dashboard')->with('success', 'Quiz submitted successfully');
}
}
