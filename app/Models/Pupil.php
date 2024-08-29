<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pupil extends Model
{
    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }
}
