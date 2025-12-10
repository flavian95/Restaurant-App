<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function view()
    {
        return view('login'); 
    }
    
    public function perform(Request $request){

    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (!Auth::attempt($credentials)) {
        return back()->withErrors([
            'email' => 'Invalid email or password'
        ]);
    }

    $request->session()->regenerate();

    return redirect('/menu');
}


    public function logout()
    {
        Auth::logout();
        return redirect('/menu');
    }
}
