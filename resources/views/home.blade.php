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

        <h1 class="mb-4">Products</h1>
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
                                    <a class="btn btn-outline-success" href="/cart/add/{{ $product->id }}">Add to cart</a>
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
