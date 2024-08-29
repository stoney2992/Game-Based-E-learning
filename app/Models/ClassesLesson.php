<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ClassesLesson extends Model
{
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'add_classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>  
     */
    protected $fillable = [
        'quarter',
        'title',
        'topic',
        'class_id'
    ];

    // public function addClass()
    // {
    //     return $this->belongsTo(AddClass::class, 'class_id');
    // }

    static public function getSingle($id)
    {
        return self::find($id);
    }

}
