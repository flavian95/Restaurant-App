<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function view()
    {
        return view('register');
    }

    public function perform(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:150|unique:user,email',
            'password' => 'required|min:6|confirmed',
            'name' => 'required|min:3|max:150|regex:/^[a-zA-Z\s]+$/',
            'phone' => 'required|digits:10',
            'address'  => 'required|string|min:6|max:255|regex:/\s+/'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password_hash' => Hash::make($request->password),
        ]);

         User_Profile::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        Auth::login($user);

        return redirect('/menu');
    }
}
