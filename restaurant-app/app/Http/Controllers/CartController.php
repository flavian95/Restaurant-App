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

}
