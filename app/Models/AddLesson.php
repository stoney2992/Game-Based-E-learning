<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AddLesson extends Model
{
    protected $table = 'add_lesson'; // Set your actual table name if different

    protected $fillable = ['quarter', 'topic', 'user_id'];

    /**
     * Get the class that owns the lesson.
     */
    public function class()
    {
        return $this->belongsTo(AddClass::class, 'class_id');
    }
}
