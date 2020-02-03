@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm">
                        <h1>{{ __('New Order') }}</h1>
                    </div>
                    <div class="col-sm">
                        <div class="text-right">
                            <a class="btn btn-lg btn-outline-secondary" href="/home">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col text-center">
                        <div class="card mx-auto" style="width: 200px;">
                            <img class="card-img-top" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title text-info">{{ $product->name }}</h5>
                                <p><span class="font-weight-bold text-primary">{{ __('Price') }}:</span><span class="text-danger"> $ {{ $product->price }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <form action="/checkout" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="products_id" name="products_id" value="{{ $product->id }}">
                                <input type="hidden" class="form-control" id="quantity" name="quantity" value="1">
                                <label for="type_identification">{{ __('Type identification') }}:</label>
                                <select class="form-control" id="type_identification" name="type_identification" placeholder="{{ __('Type a type identification') }}" value="{{ old('type_identification') }}">
                                    <option value="CC">{{ __('Citizenship card') }}</option>
                                    <option value="CE">{{ __('Foreigner card') }}</option>
                                </select>
                                <label for="number_identification">{{ __('Number identification') }}:</label>
                                <input type="text" class="form-control" id="number_identification" name="number_identification" placeholder="{{ __('Type a number identification') }}" value="{{ old('number_identification') }}">
                                <label for="name">{{ __('Name') }}:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Type a name') }}" value="{{ old('name') }}">
                                <label for="surname">{{ __('Surname') }}:</label>
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="{{ __('Type a surname') }}" value="{{ old('surname') }}">
                                <label for="email">{{ __('Email') }}:</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="{{ __('Type a email') }}" value="{{ old('email') }}">
                                <label for="phone">{{ __('Phone') }}:</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ __('Type a phone') }}" value="{{ old('phone') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button class="btn btn-lg btn-primary" type="submit">{{ __('Create Order') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
