@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <h1 class="mb-4">Cart</h1>
        <div class="row">
            @foreach($carts as $cart)
                <div class="col-3 mb-4">
                    <div class="card h-100">
                        <div class="card-header fw-bold">{{ $cart->product()->product_code }}</div>
                        <div class="card-body">
                            {{ $cart->product()->description }}
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-success">${{ $cart->product()->price }}</button>
                                </div>
                                <div class="col text-end">
                                    <a class="btn btn-outline-success" href="#">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if($carts->count() > 0)
            <a href="/create-order" class="btn btn-success">Create Order</a>
        @endif
    </div>
</div>
@endsection
