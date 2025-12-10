<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\User_Profile;

class DashboardController extends Controller
{
    public function view(){
        
    $user = Auth::user()->fresh('profile');

    $orders = $user->orders()
        ->with('items')
        ->orderBy('created_at', 'asc')
        ->get();

    return view('dashboard', [
        'user' => $user,
        'profile' => $user->profile,
        'orders' => $orders,
    ]);
}


public function update(Request $request)
{
    $request->validate([
        'email' => 'required|email|max:150|unique:user,email,' . Auth::id(),
        'name' => 'required|min:3|max:150',
        'phone' => 'required|digits:10',
        'address' => 'required|min:6|max:255',
        'current_password' => 'nullable',
        'new_password' => [
                'nullable',
                'confirmed',
                Password::min(6)      
                    ->mixedCase()      
                    ->numbers()        
                    ->symbols(),       
            ],
    ]);

    $user = Auth::user();

    $user->email = $request->email;

    if ($request->filled('new_password')) {
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Current password is incorrect'
            ]);
        }

        $user->password = Hash::make($request->new_password);
    }

    $user->save();

    $user->profile()->update([
        'name' => $request->name,
        'phone' => $request->phone,
        'address' => $request->address,
    ]);

    return back()->with('success', 'Profile updated successfully.');
}
}
