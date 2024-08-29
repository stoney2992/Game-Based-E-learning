<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignClassPupil extends Model
{
    use HasFactory; 

    protected $table = 'assign_class_pupils'; 
    
    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = self::select('assign_class_pupils.*', 'add_classes.className as class_name', 'users.name as pupil_name')
            ->join('add_classes', 'add_classes.id', '=', 'assign_class_pupils.class_id')
            ->join('users', 'users.id', '=', 'assign_class_pupils.pupil_id')
            ->where('assign_class_pupils.is_delete', '=', 0);

        $return = $return->orderBy('assign_class_pupils.id', 'desc')
            ->paginate(100);

        return $return;
    }

    static public function getAlreadyFirst($class_id, $pupil_id)
    {
        return self::where('class_id', '=', $class_id)->where('pupil_id', '=', $pupil_id)->first();
    }

    static public function getMyClass($pupil_id) 
    {
        return self::select('assign_class_pupils.*', 'add_classes.className as class_name')
            ->join('add_classes', 'add_classes.id', '=', 'assign_class_pupils.class_id')
            ->where('assign_class_pupils.is_delete', '=', 0)
            ->where('assign_class_pupils.status', '=', 0)
            ->where('assign_class_pupils.pupil_id', '=', $pupil_id)
            ->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'pupil_id');
    }

    public function class()
    {
        return $this->belongsTo(AddClass::class, 'class_id');
    }
}
