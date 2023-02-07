@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <h1 class="mb-4">Cart</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-3 mb-4">
                    <div class="card h-100">
                        <div class="card-header fw-bold">{{ $product->product_code }}</div>
                        <div class="card-body">
                            {{ $product->description }}
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-success">${{ $product->price }}</button>
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
        <a href="/create-order" class="btn btn-success">Create Order</a>

    </div>
</div>
@endsection
