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

        <h1 class="mb-4">Add User to order #{{ $order->id }}</h1>
        <div class="card h-100">
            <div class="card-header fw-bold">Order #{{ $order->id }}</div>
            <div class="card-body">
                <div class="row">
                    @foreach($order->products()->get() as $product)
                        <div class="col-9">{{ $product->product_code }}</div>
                        <div class="col">${{ $product->price }}</div>
                    @endforeach
                    <div class="col-9 fw-bold">Total:</div>
                    <div class="col">${{ $order->price_total }}</div>
                    <div class="col-12 fw-bold">Users:
                        @foreach($order->users()->get() as $user)
                            {{ $user->email }},
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- <div class="card-footer"></div> -->
        </div>

    </div>
</div>
@endsection
