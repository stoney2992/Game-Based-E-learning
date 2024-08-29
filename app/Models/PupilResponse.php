<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PupilResponse extends Model
{
    use HasFactory;

    protected $fillable = ['pupil_id', 'question_id', 'choice_id'];
}