<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Item;

class OrderController extends Controller
{
    public function place(Request $request)
    {
        $request->validate([
            'order_type' => 'required|in:PICKUP,DELIVERY'
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return response()->json([
                'success' => false,
                'message' => 'Cart is empty'
            ], 400);
        }

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_type' => $request->order_type
            ]);

            foreach ($cart as $itemId => $item) {
                $order->items()->attach($itemId, [
                    'quantity' => $item['quantity']
                ]);
            }

            session()->forget('cart');

            DB::commit();

            return response()->json([
                'success' => true,
                'order_id' => $order->id
            ]);

        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Order failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

