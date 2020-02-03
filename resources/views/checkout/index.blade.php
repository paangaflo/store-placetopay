@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm">
                        @if($type == 'user')
                            <h1>{{ __('My Orders') }}</h1>
                        @else
                            <h1>{{ __('Store Orders') }}</h1>
                        @endif
                    </div>
                    <div class="col-sm">
                        <div class="text-right">
                            <a class="btn btn-lg btn-outline-success" href="/home">{{ __('Home') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <table class="table table-hover table-bordered">
                            <caption>{{ __('List of orders') }}</caption>
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">{{ __('ID') }}</th>
                                    <th scope="col" class="text-center">{{ __('NAME') }}</th>
                                    <th scope="col" class="text-center">{{ __('EMAIL') }}</th>
                                    <th scope="col" class="text-center">{{ __('PHONE') }}</th>
                                    <th scope="col" class="text-center">{{ __('PRODUCT') }}</th>
                                    <th scope="col" class="text-center">{{ __('PRICE') }}</th>
                                    <th scope="col" class="text-center">{{ __('STATE') }}</th>
                                    @if($type == 'user')
                                        <th scope="col" class="text-center">{{ __('OPTIONS') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td scope="row" class="align-middle text-center">{{ $order->id }}</td>
                                    <td class="align-middle">{{ $order->customer_name }}</td>
                                    <td class="align-middle">{{ $order->customer_email }}</td>
                                    <td class="align-middle">{{ $order->customer_mobile }}</td>
                                    @foreach($products as $product)
                                        @if($product->id == $order->products_id)
                                            <td class="align-middle">{{ $product->name }}</td>
                                            <td class="align-middle">{{ $product->price }}</td>
                                        @endif
                                    @endforeach
                                    @if( $order->status ==  'CREATED')
                                        <td class="font-weight-bold align-middle text-primary">{{ $order->status }}</td>
                                    @elseif( $order->status ==  'PAYED')
                                        <td class="font-weight-bold align-middle text-success">{{ $order->status }}</td>
                                    @else
                                        <td class="font-weight-bold align-middle text-danger">{{ $order->status }}</td>
                                    @endif
                                    @if($type == 'user')
                                        <td class="align-middle text-center">
                                            @if( $order->status ==  'CREATED')
                                                <a class="btn btn-primary btn-sm" href="/checkout/{{ $order->id }}">{{ __('Resume') }}</a>
                                            @else
                                                <a class="btn btn-primary btn-sm" href="/payment/status/{{ $order->id }}">{{ __('Status') }}</a>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <div class="pagination pagination-centered">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
