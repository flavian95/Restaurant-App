<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\User_Profile;

class DashboardController extends Controller
{
    public function view()
    {
        $user = Auth::user();
        $profile = $user->profile;

        // $orders = $user->orders()->with('items')->get();

        $orders = $user->orders()->with('items')->orderBy('created_at', 'asc')->get();


        return view('dashboard', compact('user', 'profile', 'orders'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:150|unique:user,email,' . Auth::id(),
            'name' => 'required|min:3|max:150|regex:/^[a-zA-Z\s]+$/',
            'phone' => 'required|digits:10',
            'address'  => 'required|string|min:6|max:255|regex:/\s+/',
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->email = $request->email;

        if ($request->current_password || $request->new_password) {
        if (!\Hash::check($request->current_password, $user->password_hash)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }
        $user->password_hash = \Hash::make($request->new_password);
        }

        $user->save();

        $profile = $user->profile;
        $profile->name = $request->name;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
