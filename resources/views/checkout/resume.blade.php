@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm">
                        <h1>{{ __('Resume of order') }} - Id : {{ $order->id }}</h1>
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
                        <div class="col text-center">
                            <div class="card mx-auto" style="width: 200px;">
                                <img class="card-img-top" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name_product">{{ __('Name product') }}:</label>
                                <input type="text" class="form-control" id="name_product" name="name_product" value="{{ $product->name }}" disabled>
                                <label for="price">{{ __('Price') }}:</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" disabled>
                                <label for="quantity">{{ __('Quantity') }}:</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $order->quantity }}" disabled>
                                <label for="type_identification">{{ __('Type identification') }}:</label>
                                <input type="text" class="form-control" id="type_identification" name="type_identification" value="{{ $order->customer_type_identification }}" disabled>
                                <label for="number_identification">{{ __('Number identification') }}:</label>
                                <input type="text" class="form-control" id="number_identification" name="number_identification" value="{{ $order->customer_number_identification }}" disabled>
                                <label for="name">{{ __('Name') }}:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $order->customer_name }}" disabled>
                                <label for="surname">{{ __('Surname') }}:</label>
                                <input type="text" class="form-control" id="surname" name="surname" value="{{ $order->customer_surname }}" disabled>
                                <label for="email">{{ __('Email') }}:</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $order->customer_email }}" disabled>
                                <label for="phone">{{ __('Phone') }}:</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $order->customer_mobile }}" disabled>
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
                                <a class="btn btn-lg btn-primary" href="/payment/{{ $order->id }}">{{ __('Proceed payment') }}</a>
                            @else
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
