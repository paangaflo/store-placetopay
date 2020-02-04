@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('app.title_list_product') }}</div>

                <div class="card-body">
                    <products></products>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
