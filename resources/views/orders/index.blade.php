@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div> -->

        <h1 class="mb-4">My Orders</h1>
        <div class="row">
            @foreach($orders as $order)
                <div class="col-4 mb-4">
                    <div class="card h-100">
                        <div class="card-header fw-bold">
                            <div class="row">
                                <div class="col">Order #{{ $order->id }}</div>
                                <div class="col text-end">{{ $order->created_at }}</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <tr>
                                    <th colspan="2">Products</th>
                                </tr>
                                @foreach($order->products()->get() as $product)
                                    <tr>
                                        <td>{{ $product->product_code }}</td>
                                        <td class="text-end">${{ $product->price }}</td>
                                    </tr>
                                @endforeach
                                <tr><td colspan="2" class="text-end fw-bold">Total Price: ${{ $order->products()->sum('price') }}</td></tr>
                                <tr>
                                    <th colspan="2">Payments</th>
                                </tr>
                                @foreach($order->payments() as $payment)
                                    <tr>
                                        <td>{{ $payment->user()->email }}</td>
                                        <td class="text-end">${{ $payment->price }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" class="text-end fw-bold">Paid Sum: ${{ $order->payments()->sum('price') }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-end"><strong>Tax: </strong>${{ $order->price_total - $order->payments()->sum('price') }}</td>
                                </tr>
                                <tr><th colspan="2"></th></tr>
                                <tr>
                                    <th colspan="2">Owner</th>
                                </tr>
                                <tr>
                                    <td>{{ $order->owner()->email }}</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <th colspan="2">Users</th>
                                </tr>
                                @foreach($order->users()->get() as $user)
                                    <tr>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-end">-</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-outline-secondary" href="/order/{{ $order->id }}/adduser">Add User</a>
                                </div>
                                <div class="col text-end">
                                    @if(!$order->userPayment())
                                        <a href="/pay/{{$order->id}}/{{ $order->pay() }}" class="btn btn-success">Pay ${{ $order->pay() }}</a>
                                    @else
                                        <a href="#" class="btn btn-success disabled">Paied ${{ $order->userPayment()->price }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
