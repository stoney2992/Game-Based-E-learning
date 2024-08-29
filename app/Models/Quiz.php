<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['teacher_id', 'title', 'description', 'time_limit'];

    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }
    

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function assignClass()
{
    return $this->belongsTo(AssignClassModel::class, 'class_id');
}


public function attempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }

    public function getTotalScoreAttribute()
{
    return $this->questions->sum(function ($question) {
        return $question->choices->where('is_correct', true)->sum('points');
    });
}

}