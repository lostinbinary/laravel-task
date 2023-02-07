<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carts = Cart::where('user_id',auth()->user()->id)->get('id');
        $products = [];
        foreach($carts as $cart)
            $products[] = Product::findOrFail($cart->id);
        return view('cart', compact('products'));
    }

    public function add(Product $product)
    {
        $cart = new Cart;
        $cart->product_id = $product->id;
        $cart->user_id = auth()->user()->id;
        $cart->save();

        return back();
    }
}
