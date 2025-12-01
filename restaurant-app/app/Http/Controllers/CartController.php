<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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


}
