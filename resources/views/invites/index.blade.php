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

        <h1 class="mb-4">My Invites</h1>
        <div class="row">
            @foreach($invites as $invite)
                <div class="col-4 mb-4">
                    <div class="card h-100">
                        <div class="card-header fw-bold">Invite to order #{{$invite->order_id}}</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-success" href="/invite/{{$invite->id}}/accept/true">Accept</a>
                                </div>
                                <div class="col text-end">
                                    <a class="btn btn-secondary" href="/invite/{{$invite->id}}/accept/false">Decline</a>
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
