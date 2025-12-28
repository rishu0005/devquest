<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function view(){
        return view('auth.register');
    }

    public function store(Request $request){
        // dd($request->all());

        // Step to register a user
        // 1. validate the user
        // 2. Store the user
        // 3. lastly redirect the user to login page 
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        // return "user will be saved here";

        User::create([
            'username'          => $request->username,
            'email'             => $request->email,
            'email_verified_at' => now(),
            'password'          => $request->password,
            'level'             => 1,
            'exp'               => 1,
        ]);

        return redirect('/');
    }
}
