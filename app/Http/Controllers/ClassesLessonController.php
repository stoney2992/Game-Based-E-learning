<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassesLesson;
use App\Models\AddClass;

class ClassesLessonController extends Controller
{
    public function show(string $id)
    {
        $classes_lessons = ClassesLesson::orderBy('id')->get();
        $add_classes = AddClass::all();
        // $teacher_dashboards = TeacherDashboard::orderBy('id')->get(); -----reserve for fetching data from another table
        // $add_classes = AddClass::orderBy('id')->get();
        
        return view('add_class.show', compact('add_classes', 'classes_lessons'));
        // return view('add_class.show');
    }

    public function storeLesson(Request $request)
    { 
        ClassesLesson::create($request->all());

        return redirect()->route('add_class.index')->with('Success', 'A Class added successfully');
    }

    public function destroy($id)
        {
            $save = ClassesLesson::getSingle($id);
            $save->delete();
            return redirect()->back()->with("Deleted successfully");
        }
}
