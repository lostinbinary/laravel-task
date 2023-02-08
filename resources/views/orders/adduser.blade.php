@extends('layouts.app')

@section('content')
<div class="container">
        

    <h1 class="mb-4">Add User to order #{{ $order->id }}</h1>
    <div class="card">
        <div class="card-header fw-bold">Order #{{ $order->id }}</div>
        <div class="card-body">
            <div class="row">
                @foreach($order->products()->get() as $product)
                    <div class="col-9">{{ $product->product_code }}</div>
                    <div class="col">${{ $product->price }}</div>
                @endforeach
                <div class="col-9 fw-bold">Total:</div>
                <div class="col">${{ $order->price_total }}</div>
                <div class="col-12 fw-bold">Owner: {{ $order->owner()->email }}</div>
                <div class="col-12 fw-bold">Users:
                    @foreach($order->users()->get() as $user)
                        {{ $user->email }},
                    @endforeach
                </div>
                <div class="col-12">
                @foreach($users as $user)
                    <a class="btn btn-outline-secondary mb-2" href="/invite/{{ $order->id }}/add/{{ $user->id }}">{{ $user->email }}</a>
                @endforeach
                </div>
            </div>
        </div>
        <!-- <div class="card-footer"></div> -->
    </div>

</div>
@endsection
