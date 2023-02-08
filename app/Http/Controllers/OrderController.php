<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Invite;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        $result = DB::table('order_user')->where('user_id', auth()->user()->id)->get();
        $sorders = [];
        foreach($result as $res)
            $sorders[] = Order::findOrFail($res->order_id);;
        return view('orders/index', compact('orders','sorders'));
    }

    public function adduser($id)
    {
        $order = Order::findOrFail($id);
        $users = User::all();
        return view('orders/adduser', compact('order','users'));
    }

    public function create()
    {
        $order = new Order;
        $order->price_total = 0;
        $order->user_id = auth()->user()->id;

        $carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach($carts as $cart) {
            $product = Product::findOrFail($cart->product_id);
            $order->price_total += $product->price;
        }

        $order->pay_deadline = date('Y-m-d');

        $order->save();

        foreach($carts as $cart) {
            $product = Product::findOrFail($cart->product_id);
            $order->products()->attach($product);
        }
        // $order->products = [];
        // foreach($carts as $cart) 
        //     $order->products[] = Product::findOrFail($cart->product_id);

        return redirect('/orders');
    }
}
