<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignClassModel extends Model
{
    use HasFactory;

    protected $table = 'assign_class';
    
    static public function getSingle($id)
    {
        return self::find($id);
    }
    

    static public function getRecord()
    {
        $return = self::select('assign_class.*', 'add_classes.className as class_name', 'teacher.name as teacher_name', 'users.name as created_by_name')
            ->join('users as teacher', 'teacher.id', '=', 'assign_class.teacher_id')
            ->join('add_classes', 'add_classes.id', '=', 'assign_class.class_id')
            ->join('users', 'users.id', '=', 'assign_class.created_by')
            ->where('assign_class.is_delete', '=', 0);

        $return = $return->orderBy('assign_class.id', 'desc')
            ->paginate(100);

        return $return;
    }


    static public function getAlreadyFirst($class_id, $teacher_id)
    {
        return self::where('class_id', '=', $class_id)->where('teacher_id', '=', $teacher_id)->first();
    }

    static public function getMyClass($teacher_id) 
    {
        return AssignClassModel::select('assign_class.*', 'add_classes.className as class_name')
            ->join('add_classes', 'add_classes.id', '=', 'assign_class.class_id')
            ->where('assign_class.is_delete', '=', 0)
            ->where('assign_class.status', '=', 0)
            ->where('assign_class.teacher_id', '=', $teacher_id)
            ->get();
    }

    public function teacher()
{
    return $this->belongsTo(User::class, 'teacher_id');
}


}
