<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateClassModel extends Model
{
    use HasFactory;

    protected $table = 'create_class';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = CreateClassModel::select('create_class.*', 'users.name as created_by_name')
                                        ->join('users', 'users.id', 'create_class.created_by')
                                        ->where('create_class.is_delete', '=', 0)
                                        ->orderBy('create_class.id', 'asc')
                                        ->paginate(255);
        return $return;
    }
}
