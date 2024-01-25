<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //

    public function create(){
        return view('contact.create');
    }


    public function store(Request $request)
    {
        
        $customMessages = [
            'required' => 'Please fill in the :attribute field.',
            'email' => 'Please provide a valid email address.',
            'unique' => 'The :attribute is already taken.',
            'min' => 'The :attribute must be at least :min characters.',
        ];
    
        // Validate the input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], $customMessages);
    
        // Check if validation fails
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Create the user if validation passes
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
    
    
        // Redirect to the login page after successful registration
        return redirect()->route('login.index')->with('success', 'Registration successful. Please login.');

 
        
        
}
}