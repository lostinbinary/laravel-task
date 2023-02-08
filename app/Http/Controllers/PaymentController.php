<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Invite;
use App\Models\User;
use App\Models\Payment;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay($order_id, $price)
    {
        $payment = new Payment;
        $payment->order_id = $order_id;
        $payment->user_id = auth()->user()->id;
        $payment->price = $price;
        $payment->save();

        return back();
    }
}
