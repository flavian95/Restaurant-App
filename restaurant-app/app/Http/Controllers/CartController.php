<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User1;

class CartController extends Controller
{
    public function add(Request $request)
{
    $cart = session()->get('cart', []);

    $id = $request->id;

    if (!isset($cart[$id])) {
        $cart[$id] = [
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'quantity' => 1
        ];
    } else {
        $cart[$id]['quantity']++;
    }

    session()->put('cart', $cart);

    return response()->json([
        'success' => true,
        'cart_count' => array_sum(array_column($cart, 'quantity'))
    ]);
}

public function view()
{
    $cart = session()->get('cart', []);

    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    
    return view('cart', compact('cart', 'total'));
}

public function remove(Request $request)
{
    $cart = session()->get('cart', []);

    $id = $request->id;

    if (isset($cart[$id])) {
        unset($cart[$id]);
    }

    session()->put('cart', $cart);

    return response()->json([
        'success' => true,
        'cart_count' => array_sum(array_column($cart, 'quantity'))
    ]);
}

public function updateQuantity(Request $request)
{
    $cart = session()->get('cart', []);

    $id = $request->id;
    $change = $request->change;

    if (isset($cart[$id])) {
        $cart[$id]['quantity'] += $change;

        if ($cart[$id]['quantity'] <= 0) {
            unset($cart[$id]);
        }
    }

    session()->put('cart', $cart);

    return response()->json([
        'success' => true,
        'cart' => $cart,
        'cart_count' => array_sum(array_column($cart, 'quantity'))
    ]);
}

public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password, // Laravel will check against getAuthPassword()
        ];

        // Custom auth attempt since column is not "password"
        $user = User1::where('email', $request->email)->first();

        if (!$user || !\Hash::check($request->password, $user->password_hash)) {
            return back()->withErrors(['email' => 'Invalid email or password']);
        }

        Auth::login($user); // Laravel sets session cookie automatically
        return redirect('/menu');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
