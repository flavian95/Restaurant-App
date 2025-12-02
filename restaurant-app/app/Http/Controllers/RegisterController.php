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
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6|confirmed',
            'name' => 'required',
            'phone' => 'required'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password_hash' => Hash::make($request->password),
        ]);

        // DB::table('user_profiles')->insert([
        //     'user_id' => $user->id,
        //     'phone' => $request->phone,
        //     'address' => ''
        // ]);

         User_Profile::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => ''
        ]);

        Auth::login($user);

        return redirect('/menu');
    }
}
