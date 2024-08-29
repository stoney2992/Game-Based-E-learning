<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AddClass extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'className',
    ];

    /**
     * Get the lessons for the class.
     */
    public function lessons()
    {
        return $this->hasMany(AddLesson::class, 'class_id');
    }
}
