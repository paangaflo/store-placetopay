@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm">
                        <h1>{{ __('Status of order') }} - Id : {{ $order->id }}</h1>
                    </div>
                    <div class="col-sm">
                        <div class="text-right">
                            <a class="btn btn-lg btn-outline-secondary" href="/checkout/list/user">{{ __('My Orders') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if( $order->users_id ==  $user->id)
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="status">{{ __('Status') }}:</label>
                                @if( $order->status ==  'CREATED')
                                    <input type="text" class="form-control font-weight-bold text-primary" id="status" name="status" value="{{ $order->status }}" disabled>
                                @elseif( $order->status ==  'PAYED')
                                    <input type="text" class="form-control font-weight-bold text-success" id="status" name="status" value="{{ $order->status }}" disabled>
                                @else
                                    <input type="text" class="form-control font-weight-bold text-danger" id="status" name="status" value="{{ $order->status }}" disabled>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            @if( $order->status ==  'CREATED')
                                <div class="alert alert-primary" role="alert">
                                    {{ __('The transaction is pending payment. Please try again. Thank you.') }}
                                </div>
                            @elseif( $order->status ==  'REJECTED')
                                <div class="alert alert-danger" role="alert">
                                    {{ __('The payment transaction has been rejected') }}
                                </div>
                            @else
                                <div class="alert alert-success" role="alert">
                                    {{ __('The payment transaction has been processed correctly') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            @if( $order->status ==  'CREATED')
                                <a class="btn btn-lg btn-primary" href="/payment/{{ $order->id }}">{{ __('Proceed payment') }}</a>
                            @elseif( $order->status ==  'REJECTED')
                                <a class="btn btn-lg btn-primary" href="/payment/{{ $order->id }}">{{ __('Retry payment') }}</a>
                            @endif
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
