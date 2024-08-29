<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\CreateClassModel;

class CreateClassController extends Controller
{
    public function index()
        {
            $data['getRecord']= CreateClassModel::getRecord();
            return view('create_class.index', $data);
        } 

    public function store(Request $request)
    {
        $save = new CreateClassModel;
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();

        return redirect('create_class/index')->with('Success', 'Class Added Successfully');
    }

    public function delete($id)
    {
        $save = CreateClassModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('Success', 'Class Deleted Successfully');
    }

}
