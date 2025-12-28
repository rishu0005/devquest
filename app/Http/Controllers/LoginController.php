<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view(){
        return view('auth.login');
    }

    public function store(Request $request){
    // steps to login user 
    // 1. validate the user data
    // 2. check user exists in users table and have correct password for login
    // 3. redirect to dashboard if credentials is correct and throw back error if credentials is invalid
       $attributes =  $request->validate([
            'email' => 'required|min:3|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt($attributes)){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->back()->with('error', 'Incorrect Credentials');
        }
    }
    public function destroy(){
        Auth::logout();

        return redirect('/');
    }
}
