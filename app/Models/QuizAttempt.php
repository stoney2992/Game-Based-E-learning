<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    protected $fillable = ['user_id', 'quiz_id', 'score', 'points'];

    public function pupil()
    {
        return $this->belongsTo(Pupil::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
