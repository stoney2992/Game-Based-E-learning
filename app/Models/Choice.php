<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'option', 'is_correct', 'points'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function setPointsAttribute($value)
    {
        // If you need custom logic to transform the value, you can add it here
        $this->attributes['points'] = (int) $value;
    }
}
