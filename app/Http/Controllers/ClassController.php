<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassLesson;
use App\Models\TeacherDashboard;
use App\Models\Pupil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ClassController extends Controller
{
    public function class()
    {
    $class_lessons = ClassLesson::orderBy('id')->get();
    // $teacher_dashboards = TeacherDashboard::orderBy('id')->get(); -----reserve for fetching data from another table

    return view('teacher_dashboard.class', compact('class_lessons'));

    // return view('teachersDashboard.class', compact('class_lessons'), compact('teacher_dashboards'));  -----reserve for fetching data from another table
    }
    
    public function classStore(Request $request)
    { 
        ClassLesson::create($request->all());

        return redirect()->route('teacher_dashboard.class')->with('Success', 'A Class added successfully');
    }

    public function pupil()
    {
        $pupils = Pupil::orderBy('id')->get();
        return view('teacher_dashboard.pupils', compact('pupils'));
    }

}
