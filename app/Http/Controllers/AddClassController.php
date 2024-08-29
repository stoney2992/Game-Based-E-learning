<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddClass;
use App\Models\Pupil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AddClassController extends Controller
{
    // public function teacherDashboard()
    // {
    //     $teacher_dashboards = TeacherDashboard::orderBy('created_at', 'desc')->get();
    //     return view('teacherDashboard', compact('teacher_dashboards'));
    // }

    public function index()
{
    $add_classes = AddClass::orderBy('created_at', 'asc')->get();


    return view('add_class.index', compact('add_classes'));
    // return view('add_class.index');
} 


    public function store(Request $request)
    {
        AddClass::create($request->all());

        return redirect()->route('add_class.index')->with('Success', 'A Class added successfully');
    }

    

    

    
}
