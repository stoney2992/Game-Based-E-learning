<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherDashboard;
use App\Models\Pupil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TeacherDashboardController extends Controller
{
    // public function teacherDashboard()
    // {
    //     $teacher_dashboards = TeacherDashboard::orderBy('created_at', 'desc')->get();
    //     return view('teacherDashboard', compact('teacher_dashboards'));
    // }

    public function index()
{
    $teacher_dashboards = TeacherDashboard::orderBy('created_at', 'desc')->get();


    return view('teacher_dashboard', compact('teacher_dashboards'));
} 


    public function store(Request $request)
    {
        TeacherDashboard::create($request->all());

        return redirect()->route('teacher_dashboard')->with('Success', 'A Teacher added successfully');
    }

    

    
}
