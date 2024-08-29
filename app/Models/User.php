<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'roles',
        'points',
        'game_points',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast. 
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }

    
    
    public function createdQuizzes()
    {
        return $this->hasMany(Quiz::class, 'teacher_id');
    }

    public function claimedRewards()
{
    return $this->hasMany(ClaimedReward::class);
}


    // Relationship with quizzes assigned to the pupil
    public function assignedQuizzes()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_pupil', 'pupil_id', 'quiz_id')
            ->withPivot('score') // if you want to retrieve the score as well
            ->withTimestamps();
    }
}
