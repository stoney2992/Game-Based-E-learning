<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Choice;

class QuizQuestionController extends Controller
{
    public function create($quizId)
    {
        $quiz = Quiz::find($quizId);

        return view('quiz.question_create', compact('quiz'));
    }

    public function store($quizId, Request $request)
{
    $request->validate([
        'question_text' => 'required',
        'options.*' => 'required',
        'correct_option' => 'required|integer|min:0',
        'points' => 'required|integer|min:0',
    ]);

    $quiz = Quiz::find($quizId);

    $question = $quiz->questions()->create([
        'question_text' => $request->input('question_text'),
        // The points are for the correct option, so we won't save it here
    ]);

    $options = $request->input('options');
    // Cast the correct_option input to an integer before comparison
    $correctOptionIndex = (int) $request->input('correct_option');

    foreach ($options as $index => $option) {
        $isCorrect = $index === $correctOptionIndex; // Check if this option is the correct one by index comparison

        $question->choices()->create([
            'option' => $option, 
            'is_correct' => $isCorrect,
            // Assign points only to the correct option
            'points' => $isCorrect ? $request->input('points') : 0,
        ]);
    }

    return redirect()->route('quiz.quizIndex', ['class_id' => $quiz->class_id])
        ->with('success', 'Question added successfully');
}



public function edit($quizId, $questionId)
{
    $quiz = Quiz::findOrFail($quizId);
    $question = Question::with('choices')->findOrFail($questionId);

    return view('quiz.question_edit', compact('quiz', 'question'));
}



public function update($quizId, $questionId, Request $request)
{
    $request->validate([
        'question_text' => 'required',
        'options' => 'array|required',
        'options.*' => 'required',
        'correct_option' => 'required|integer|min:0',
    ]);

    $question = Question::findOrFail($questionId);
    $question->update([
        'question_text' => $request->question_text,
    ]);

    $quiz = Quiz::findOrFail($quizId);
    $question = Question::findOrFail($questionId);

    // Update existing choices and add new ones if provided
    foreach ($request->options as $index => $optionText) {
        $isCorrect = $index == $request->correct_option;
        $option = $question->choices()->updateOrCreate(
            ['id' => $request->input("option_ids.$index")],
            [
                'option' => $optionText,
                'is_correct' => $isCorrect,
                'points' => $isCorrect ? $request->input('points') : 0,
            ]
        );
    }

    // Redirect to the class quizzes route using the class_id
    return redirect()->route('quiz.quizIndex', ['class_id' => $quiz->class_id])->with('success', 'Question updated successfully');
}







public function destroy($questionId)
{
    $question = Question::find($questionId);

    if (!$question) {
        return redirect()->route('quiz.quizIndex', ['class_id' => $quizId])->with('error', 'Question not found');
    }

    // Manually delete choices associated with the question
    $question->choices()->delete();

    // Then delete the question
    $question->delete();

    return redirect()->back()->with('success', 'Question deleted successfully');
}




}
