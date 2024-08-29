<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
      
class CountViewController extends Controller
{
        public function dashboard()
        {
    $pupils = User::where('roles', 'pupil')->count();
    $teachers = User::where('roles', 'teacher')->count();
    $classes = AddClass::count();

    return view('admin_dashboard', compact('pupils', 'teachers', 'classes'));
        }
}