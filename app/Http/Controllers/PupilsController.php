<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pupil;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class PupilsController extends Controller
{
    public function index()
{
    $users = User::where('roles', 'pupil')->get();

    return view('pupils_registration.index', compact('users'));
}


    public function create()
    {
        return view('pupils_registration.create');
    }

    public function store(Request $request)
    {
        Pupil::create($request->all()); 

        return redirect()->route('pupils_registration.index')->with('success', 'A pupil added successfully');
    }

    public function show(string $id)
    {
        $pupil = Pupil::findOrFail($id);

        return view('pupils_registration.show', compact('pupil'));
    }

    public function edit(string $id)
{
    $pupil = User::findOrFail($id);
    
    return view('pupils_registration.edit', compact('pupil'));
}


public function update(Request $request, string $id)
{
    $pupil = User::findOrFail($id);

    // Validate the request
    $request->validate([
        'name' => 'required',
        'email' => [
            'required', 
            'email', 
            Rule::unique('users')->ignore($pupil->id),
        ],
        'phone' => 'required',
        // Add other validation rules as needed
        'password' => 'sometimes|nullable|min:5', // 'sometimes' and 'nullable' allow the field to be optional
    ]);

    // Update only the fillable attributes except for password
    $pupil->fill($request->except(['password']));

    // Check if a new password was provided
    if ($request->filled('password')) {
        $pupil->password = Hash::make($request->input('password'));
    }

    // Save the changes
    $pupil->save();

    return redirect()->route('pupils_registration.index')->with('success', 'Pupil updated successfully');
}

    public function destroy(string $id) 
    {
        $pupil = User::findOrFail($id); // Use Pupil model here

        $pupil->delete();

        return redirect()->route('pupils_registration.index')->with('success', 'Pupil deleted successfully');
    }
}
