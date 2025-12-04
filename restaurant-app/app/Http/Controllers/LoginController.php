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

    public function perform(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password_hash)) {
            return back()->withErrors(['email' => 'Invalid email or password']);
        }

        Auth::login($user);

        return redirect('/menu');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/menu');
    }
}
