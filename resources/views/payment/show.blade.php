@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm">
                        <h1>{{ __('Payment Order') }}: {{ $order->id }}</h1>
                    </div>
                    <div class="col-sm">
                        <div class="text-right">
                            <a class="btn btn-lg btn-outline-secondary" href="/checkout/{{ $order->id }}">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if( $order->users_id ==  $user->id)
                    <div class="row">
                        <div class="col text-center">
                            <div class="alert alert-primary" role="alert">
                                {{ __('You will be redirected to the PlacetoPay lake pass to continue your purchase.') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <img src="{{ asset('storage/images/logos/placetopay-logo.svg') }}" class="img-fluid" width="200px" alt="logo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <form action="/payment" method="POST" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="orders_id" name="orders_id" value="{{ $order->id }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <button class="btn btn-lg btn-primary" type="submit">{{ __('Pay whit PlacetoPay') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="alert alert-danger" role="alert">
                            {{ __('The user does not have permissions to make the payment') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
