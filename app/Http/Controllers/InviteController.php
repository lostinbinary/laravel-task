<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Invite;
use App\Models\User;

use Illuminate\Http\Request;

class InviteController extends Controller
{
    public function index()
    {
        $invites = Invite::where('user_id',auth()->user()->id)->get();
        return view('invites/index', compact('invites'));
    }
    public function create($order_id, $user_id)
    {
        $invite = new Invite;
        $invite->order_id = $order_id;
        $invite->user_id = $user_id;

        $invite->save();

        return back();
    }

    public function accept($invite_id, $status)
    {
        $invite = Invite::findOrFail($invite_id);
        $order = Order::findOrFail($invite->order_id);
        if($status = 'true') {
            $order->users()->attach([
                'user_id' => auth()->user()->id
            ]);
        }

        return back();
    }
}
