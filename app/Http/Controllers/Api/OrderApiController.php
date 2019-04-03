<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Order;
use App\Product;
use App\DetailOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Pusher\Laravel\Facades\Pusher;

class OrderApiController extends Controller
{
	public function index () 
	{
		$orders = Order::with('products')->orderBy('created_at', 'desc')->get();
		return response()->json($orders);
	}

    public function orderbyuser()
    {
        $orders = Order::with('products')->where('user_id', Auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return response()->json($orders);
    }

    public function store (Request $request)
    {
		$order = Order::create([
            'user_id' => Auth()->user()->id,
            'pay' => $request['pay']
        ]);
        $order->products()->sync($request['products']);

        Pusher::trigger('orders-channel', 'new-order-event', $order);

        return response()->json($order, 201);
    }

    public function show(Order $order)
    {
    	$order = Order::with('products')->where('id', $order->id)->get();
        return response()->json($order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json($order);
    }


}
